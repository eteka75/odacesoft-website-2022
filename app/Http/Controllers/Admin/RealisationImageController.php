<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\RealisationImage;
use Str;

class RealisationImageController extends Controller
{
/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //$this->validateForm($request);
       //dd($request->all());
       //dd($request->input('image'));
        $validated = $request->validate([
            'image' => 'required',
            'id' => 'required|integer',
            'image.*' => 'required|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);
        //dd($validated);
        $uid = $request->user()->id;
        $etat=$request->input("actif");
       // $slug=Str::slug($request->input("title"));
        $nb_img=0;
        if($request->hasfile('image')) {
            foreach($request->file('image') as $file)
            {
                
                $name = $file->getClientOriginalName();
                //$url=public_path().'/storage/disk/realisations/'. $name;
                $burl='storage/disk/realisations/';
                $id=$request->input('id');                
                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999999999) . '_'.time().'_realisation.' . $extension;
                $url=$burl.$fileName;
                $data = [
                    'nom'=>$name, 'url'=>$url,'view_count'=>0,'realisation_id'=>$id,'etat'=>1,'user_id'=>$uid
                ]; 
                $nb_img++;
                $file->move($burl, $fileName);
                $Ri=RealisationImage::create($data);  
            }
            $tz=$nb_img>1?'s':'';
           return back()->with('success', $nb_img.' images sauvegardée'.$tz.' avec succcès !');
        }
        return back()->with('danger', 'Aucun fichier valide ');
             
        
        return redirect()->to(route('realisations.index'))
            ->with('success', 'Images crée avec succèss'.$img.'.');
    }
    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateForm($request,$image=false)
    {
        
        return Validator::make($request->all(), [
           // 'image' =>'required',
            'image.*' =>'required',
            'image.*' =>'image|mimes:jpeg,png,jpg,gif,svg|max:2048'

        ])->validate();
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function show(Startup $startup)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function edit(Startup $startup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Startup $startup)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Startup  $startup
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $id=$request->id;
        //$data->delete();
        $id=$request->input('id');
        $data=RealisationImage::findOrFail($id);
        $data->delete();
        //return back()->with('success', $nb_img.' images sauvegardée'.$tz.' avec succcès !');
        return back()->with('success', ' Image supprimée avec succcès !');
    }
}
