<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use App\Models\ArticleMedia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Illuminate\Support\Str;

class StatController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "art");
            Inertia::share('hmenu', "Blog");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Les variables
        $n = 5;


        $datas = Article::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Statistiques/Index', compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Les variables
        $n = 15;
        $m = "at";
        $p = "Blog";

        //Session::flash('message','Opération réussie');
        return inertia('Dashboard/Articles/Create', compact( 'm', 'p'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
        dd($request);
        $validated=$this->validateForm($request);

        $uid = Auth::user()->id;
        $etat=$request->input("publie")==true?1:0;
        $slug=Str::slug($request->input("title"));
        $findSlug=Article::where('slug',$slug)->first();
        if($findSlug){
            return back()->with('error', 'Cet article existe déjà.');
        }
        $data = [
            'title' => $request->input("title"),
            'slug' => $slug,
            'statut' => '-',
            'lead' => '-',
            'content' => $request->input("contenu"),
            'comment_statuts' => '-',
            'featured' => true,
            'categorie_id' => $request->input("categorie_id"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
        //dd($data);

        //$url = Storage::url($validated['image'].".".$extension);
        $Article=Article::create($data);
        if($request->hasFile("image")){
            $aid=$Article->id?$Article->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/article/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=[
                'url'=>$purl."".$image_name,
                'alt'=>$data['title'],
                'article_id'=>$aid
            ];
            $a=ArticleMedia::create($img_data);

        }

        return redirect()->to(route('article.index'))
            ->with('success', 'Post Created Successfully.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Article $data)
    {
        $n = 15;
        $m = "at";
        $p = "Blog";
        return inertia('Dashboard/Articles/Show', compact('data', 'm', 'p'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $id)
    {
        $n = 15;
        $m = "at";
        $p = "Blog";
        return inertia('Dashboard/Articles/Edit', compact('data', 'm', 'p'));
    }
    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateForm($request)
    {
        return Validator::make($request->all(), [

            'title' => ['required', 'min:5', 'max:250'],
            'contenu' => ['required', 'min:10', 'max:10000'],
            'categorie_id' => ['required', 'integer', 'exists:article_categories,id'],
            'image' => ['nullable','image','mimes:jpg,jpeg'],

        ])->validate();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validated=$this->validateForm($request);
        $uid = Auth::user()->id;
        $data = [
            'title' => $request->input("tite"),
            'slug' => Str::slug($request->input("title")),
            'statut' => '-',
            'lead' => '-',
            'content' => $request->input("contenu"),
            'comment_statuts' => '-',
            'featured' => true,
            'categorie_id' => $request->input("categorie_id"),
            'user_id' => $uid,
        ];

            /*$file = File::create([
                'name' => $validated['name'],
                'url' => $url,
            ]);*/

        Article::create($data);
        if ($request->has('id')) {
            Article::find($request->input('id'))->update($data);
            return redirect()->back()->with('message', 'Post Updated Successfully.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
