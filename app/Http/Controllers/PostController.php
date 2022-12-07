<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Post;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
        /**

     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function index()

    {
        $data = Post::all();
        //dd($data);
        return Inertia::render('Post/Index', ['data' => $data]);

    }



    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function store(Request $request)

    {

        Validator::make($request->all(), [

            'titre' => ['required'],
            'contenu' => ['required'],

        ])->validate();

        $data=[
            'titre'=>$request->input("titre"),
            'contenu'=>$request->input("contenu"),
            'user_id'=>1,
        ];

        Post::create($data);

        return redirect()->back()

                    ->with('message', 'Post Created Successfully.');

    }



    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function update(Request $request)

    {

        Validator::make($request->all(), [

            'titre' => ['required'],

            'contenu' => ['required'],

        ])->validate();

        if ($request->has('id')) {
            Post::find($request->input('id'))->update($request->all());
            return redirect()->back()->with('message', 'Post Updated Successfully.');
        }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */

    public function destroy(Request $request)

    {

        if ($request->has('id')) {
            Post::find($request->input('id'))->delete();
            return redirect()->back();
        }

    }
}
