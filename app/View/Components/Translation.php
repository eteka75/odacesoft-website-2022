<?php

namespace App\View\Components;

use Illuminate\View\Component;
use  Illuminate\Support\Facades\File;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\App; 
class Translation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $translations=[];
        $local= App::getLocale();
        //dd($local);
        $phpTranslations=[];
        $jsonTranslations=[];

        if(File::exists(resource_path('lang/'.$local))){
           $phpTranslations= collect(File::allFiles(resource_path('lang/'.$local)))
            ->filter(function($file){
                //dd($file);
               return $file->getExtension()=='php';
            })
            ->flatMap(function($file){
                return Arr::dot(File::getRequire($file->getRealPath()));
            })->toArray();
        };
        //dd($phpTranslations);
        if(File::exists(resource_path("lang/$local.json"))){
            $jsonTranslations=collect(json_decode(File::get(resource_path("lang/$local.json"))))->toArray();
        }
        //dd(collect($jsonTranslations)->toArray());
        $translations=array_merge($phpTranslations,$jsonTranslations);
        return view('components.translation',compact('translations'));
    }
}
