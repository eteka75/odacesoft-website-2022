<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Inertia\Inertia;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class UserController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "usr");
            Inertia::share('hmenu', "User");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n =8;
        $datas = User::with('articles')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($n, $datas);
        return inertia('Dashboard/Users/Index',compact('datas'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function show(Webpage $webpage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function edit(Webpage $webpage)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Webpage $webpage)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Webpage $webpage)
    {
        //
    }
}
