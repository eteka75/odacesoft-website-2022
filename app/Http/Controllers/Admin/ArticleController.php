<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use App\Models\ArticleCategorie;
use App\Models\ArticleMedia;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\Tag;


class ArticleController extends Controller
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
            $n = 6;
            $datas = Article::with('categories')->with('tags')->with('image')->with('commentaires')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
            return inertia('Dashboard/Articles/Index', compact('datas'));
        }

        /**
         * Display a create form of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {

            $cats=ArticleCategorie::OrderBy('nom','DESC')->orderBy('created_at')->get();
        // if(!$cats){abort(404);}
            $cats=$cats->toArray();
            //dd($cats);
            //Session::flash('message','Opération réussie');
            return inertia('Dashboard/Articles/Create', compact( 'cats'));
        }

        /**
         * Store a newly created resource in storage.
         *
         * @param  \Illuminate\Http\Request  $request
         * @return \Illuminate\Http\Response
         */

        public function store(Request $request)
        {
            //dd($request);
            $this->validateForm($request);

            $uid = $request->user()->id;
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
            $ins_tag=[];
            if( $request->input("tags")!=''){
                $tags=$request->input("tags");
                $tabTags=explode(',',$tags);
                if($tabTags){
                    foreach($tabTags as $tag){
                        $tslug=Str::slug($tag);
                        $dataTag=[
                            "nom"=>$tag,
                            "slug"=>$tslug,
                            "user_id"=>$uid,
                            "description"=>'',
                        ];
                        $ltags=Tag::where('nom',$tag)->first();
                        if(!$ltags){
                            $iTag=Tag::create($dataTag);
                            $ins_tag[]=$iTag->id;
                        }else{
                            $ins_tag[]=$ltags->id;
                        }

                    }
                }
            }
        //dd($ins_tag);


            //$url = Storage::url($validated['image'].".".$extension);
            $Article=Article::create($data);
            $Article->tags()->sync($ins_tag);
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
                ArticleMedia::create($img_data);

            }

            return redirect()->to(route('article.index'))
                ->with('success', 'Article crée avec succèss.');
        }



        /**
         * Display the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function show($id)
        {
            $data=Article::with('categories')->with('tags')->with('commentaires')->with('image')->where('id',$id)->first();

            if(!$data) {abort(404);}
            $data=$data->toArray();
            return inertia('Dashboard/Articles/Show', compact('data'));
        }

        /**
         * Show the form for editing the specified resource.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function edit($id)
        {
            $cats=ArticleCategorie::OrderBy('nom','DESC')->orderBy('created_at')->get();
            $article=Article::with('categories')->with('tags')->with('commentaires')->with('image')->where('id',$id)->first();
            if(!$article){abort(404);}

            $cats=$cats->toArray();
            $article=$article->toArray();
            return inertia('Dashboard/Articles/Edit', compact('article', 'cats'));
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
                'contenu' => ['required', 'min:10', 'max:1000000'],
                'tags' => ['required'],
                'categorie_id' => ['required', 'integer', 'exists:article_categories,id'],
                'image' => ['nullable','image','mimes:jpg,jpeg,png,webp'],

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
            //dd($request, $validated);
            $etat=$request->input("publie")==true?1:0;
            $uid = $request->user()->id;

            $Article=Article::where('id',$id)->first();
            if(!$Article){
                return back()->with('error', "Cet article n'existe pas ou a été supprimé.");
            }
            $this->validateForm($request);
            $data = [
                'title' => $request->input("title"),
                'statut' => '-',
                'lead' => '-',
                'content' => $request->input("contenu"),
                'comment_statuts' => '-',
                'featured' => true,
                'categorie_id' => $request->input("categorie_id"),
                'actif' => $etat,
                'user_id' => $uid,
            ];
            $ins_tag=[];
            if( $request->input("tags")!=''){
                $tags=$request->input("tags");
                $tabTags=explode(',',$tags);
                if($tabTags){
                    foreach($tabTags as $tag){
                        $tslug=Str::slug($tag);
                        $dataTag=[
                            "nom"=>$tag,
                            "slug"=>$tslug,
                            "description"=>'',
                        ];
                        $ltags=Tag::where('nom',$tag)->first();
                        if(!$ltags){
                            $iTag=Tag::create($dataTag);
                            $ins_tag[]=$iTag->id;
                        }else{
                            $ins_tag[]=$ltags->id;
                        }

                    }
                }
            }

            $Article->update($data);
            $Article->tags()->sync($ins_tag);
            if($request->supimg==1){
                $Article->image()->each(function($img) {
                    $img->delete(); // <-- raise another deleting event on Post to delete comments
                });
            }else{


                if($request->hasFile("image")){

                $img= $Article->image()->get();
                if($img){
                    $Article->image()->each(function($img) {
                    $img->delete(); // <-- raise another deleting event on Post to delete comments
                });
                }
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
                    ArticleMedia::create($img_data);
                }
            }

            return redirect()->to(route('article.index'))
                ->with('success', 'Article mise à jour avec succèss.');
        }

        /**
         * Remove the specified resource from storage.
         *
         * @param  int  $id
         * @return \Illuminate\Http\Response
         */
        public function destroy($id,Request $request)
        {
            $n = 6;
            $datas = Article::with('categories')->with('image')->with('commentaires')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
            if ($request->has('id')) {
                $a=Article::find($request->input('id'));
                if($a){
                    $tags =$a->tags_ids;
                    $ad = $a->tags()->detach($tags);
                    $ad = $a->image()->update(['article_id'=> null]);
                    $a->delete();
                    return redirect()->back()->with(compact('datas'))->with('message', 'Article supprimé avec succèss.');;
                }else{
                    return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
                }
            }
        }
}
