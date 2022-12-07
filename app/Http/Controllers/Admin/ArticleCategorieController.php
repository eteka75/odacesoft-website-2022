<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\ArticleCategorie;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ArticleCategorieController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "ac");
            Inertia::share('hmenu', "Blog");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n =8;
        $datas = ArticleCategorie::with('articles')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Articlecategories/Index',compact('datas'));
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
    public function validateForm($request)
    {
        Validator::make($request->all(), [

            'titre' => ['required',"min:3",'max:250'],

            'couleur' => ['required',"in:bg-primary,bg-info,bg-danger,bg-warning,bg-tertiary,bg-secondary,bg-info,bg-success"],
            'contenu' => ['max:2000'],
        ])->validate();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $this->validateForm($request);

       $data=[
           'nom'=>$request->input("titre"),
           'slug'=>Str::slug($request->input("titre")),
           'couleur'=>$request->input("couleur"),
           'description'=>$request->input("contenu"),
           'user_id'=>$request->user()->id,
           'img'=>'',
           'active'=>1,
        ];
        $article=Articlecategorie::where('nom',$request->input("titre"))->first();
        if($article){
            //echo 'kkkllkkllk';
            return redirect()->back()
            ->with('warning', 'Catégorie déjà enrégistrés.');
        }
        Articlecategorie::create($data);
        $close=$request->input('fermer');//==true?'close':'';
        //Inertia::share(['Fermer'=>$close]);
        return redirect()->to(route('categorie-article.index',"&p=".$close))

        ->with('success', 'Catégorie créee avec succèss.');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ArticleCategorie  $articleCategorie
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $n =8;
        $data = ArticleCategorie::with('articles')->with('user')->where('id',$id)->first()->toArray();
        //dd($data);
        return inertia('Dashboard/Articlecategories/Show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ArticleCategorie  $articleCategorie
     * @return \Illuminate\Http\Response
     */
    public function edit(ArticleCategorie $articleCategorie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ArticleCategorie  $articleCategorie
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ArticleCategorie $articleCategorie)
    {
        $this->validateForm($request);
        $item = new ArticleCategorie;
        $table = $item->getTable();
        Validator::make($request->all(), [

            'id' => ['required',"exists:".$table.",id",'min:1'],
            ])->validate();

        $data=[
            'id'=>$request->input("id"),
            'nom'=>$request->input("titre"),
            'slug'=>Str::slug($request->input("titre")),
            'couleur'=>$request->input("couleur"),
            'description'=>$request->input("contenu"),
            'user_id'=>$request->user()->id,
            'img'=>'',
            'active'=>1,
         ];
        $close=$request->input('fermer');//==true?'close':'';
        if ($request->has('id')) {
            ArticleCategorie::find($request->input('id'))->update($data);
            return redirect()->to(route('categorie-article.index',"&p=".$close))

                    ->with('success', 'Mise à jour effectuée avec succèss.');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ArticleCategorie  $articleCategorie
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
       // dd($request);
       $n =8;
      $datas = ArticleCategorie::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        if ($request->has('id')) {
            $a=ArticleCategorie::find($request->input('id'));
            if($a){$a->delete();
                return redirect()->back()->with(compact('datas'))->with('success', 'Catégorie supprimée avec succèss.');;
            }else{
                return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
            }
        }
    }
}
