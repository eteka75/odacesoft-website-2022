<?php

namespace App\Http\Middleware;

use Illuminate\Http\Request;
use Inertia\Middleware;

class HandleInertiaRequests extends Middleware
{
    /**
     * The root template that's loaded on the first page visit.
     *
     * @see https://inertiajs.com/server-side-setup#root-template
     * @var string
     */
    protected $rootView = 'app';

    /**
     * Determines the current asset version.
     *
     * @see https://inertiajs.com/asset-versioning
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    public function version(Request $request)
    {
        return parent::version($request);
    }

    /**
     * Defines the props that are shared by default.
     *
     * @see https://inertiajs.com/shared-data
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function share(Request $request)
    {

        //dd($request->user()->articles_ids);
        return array_merge(parent::share($request), [
            'auth' => function () use ($request) {
                //dd($request->user());
                return [
                        'user' => $request->user() ? [
                        'id' => $request->user()->id,
                        'name' => $request->user()->name,
                        'name' => $request->user()->name,
                        'profile_photo_url' => $request->user()->profile_photo_url,
                        'email' => $request->user()->email,
                        'h_created_at' => $request->user()->h_created_at,
                        'nb_articles' => $request->user()->articles_count,
                        'articles_id' => $request->user()->articles_ids,
                        'owner' => $request->user()->owner,
                        'account' => [
                            //'id' => $request->user()->account->id,
                            //'name' => $request->user()->account->name,
                        ],
                    ] : null,
                ];
            },
            'flash' => function () use ($request) {
                return [
                    'message' => $request->session()->get('message'),
                    'success' => $request->session()->get('success'),
                    'error' => $request->session()->get('error'),
                    'danger' => $request->session()->get('danger'),
                    'warning' => $request->session()->get('warning'),
                    'notification' => $request->session()->get('notification'),
                ];
            },
        ]);
        /*return array_merge(parent::share($request), [
            //
        ]);*/
    }

}
