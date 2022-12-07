<?php

namespace App\Providers;

use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\File; // <-- added
use Illuminate\Support\ServiceProvider;
use Inertia\Inertia; // <-- added
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
//use URL;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //\URL::forceScheme('https');
        Carbon::setlocale('fr');
        Validator::extend('phone_number', function($attribute, $value, $parameters)
        {
            return substr($value, 0, 2) == '01';
        });
        /*
        Inertia::share([
            'errors' => function () {
                return Session::get('errors') ? Session::get('errors')->getBag('default')->getMessages(): (object) [];
            },
        ]);

        Inertia::share('flash', function () {
            return [
                'message' => Session::get('message'),
                'success' => Session::get('success'),
                'error' => Session::get('error'),
            ];

        });
        //dd('');
        if(File::exists($mixManifestFile = public_path('mix-manifest.json'))) {
            Inertia::version(function () use ($mixManifestFile) {
                return md5_file($mixManifestFile);
            });
        }
        Inertia::version(self::getInertiaVersionFromCache());
    }

    public static function getInertiaVersionCacheKey() {
        return 'inertia-version';
    }

    public static function getInertiaVersionFromCache() {
        return Cache::get(self::getInertiaVersionCacheKey());*/
    }
}
