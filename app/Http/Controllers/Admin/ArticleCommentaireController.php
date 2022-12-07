<?php

namespace App\Http\Controllers\Admin;

use App\Models\ArticleCommentaire;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ArticleCategorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleCommentaireController extends Controller
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

        //dd($request->all());
        Validator::make($request->all(), [
            'user_id' => ['required','exists:users,id'],
            'article_id' => ['required','exists:articles,id'],
            'note' => ['integer','min:0','max:5'],
            'commentaire' => ['required','max:1000'],

            ])->validate();

            //dd($request);
        $data=[
            'message'=>$request->input("commentaire"),
            'note'=>$request->input("note"),
            'user_id'=>$request->input("user_id"),
            'article_id'=>$request->input("article_id"),
            'ip_info'=>$request->ip(),
        ];
        ArticleCommentaire::create($data);

        return redirect()->back()

                    ->with('success', 'Commentaire envoyé.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCommentaire  $articleCommentaire
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleCommentaire $articleCommentaire)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCommentaire  $articleCommentaire
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCommentaire $articleCommentaire)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleCommentaire  $articleCommentaire
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCommentaire $articleCommentaire)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCommentaire  $articleCommentaire
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleCommentaire $articleCommentaire)
    {
        //
    }
}
