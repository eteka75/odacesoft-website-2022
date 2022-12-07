<?php
namespace App\Http\Controllers\Admin;

use App\Models\ArticleEvaluation;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ArticleCategorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class ArticleEvaluationController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleEvaluation  $articleEvaluation
     * @return \Illuminate\Http\Response
     */
    public function show(ArticleEvaluation $articleEvaluation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleEvaluation  $articleEvaluation
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleEvaluation $articleEvaluation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleEvaluation  $articleEvaluation
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleEvaluation $articleEvaluation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleEvaluation  $articleEvaluation
     * @return \Illuminate\Http\Response
     */
    public function destroy(ArticleEvaluation $articleEvaluation)
    {
        //
    }
}
