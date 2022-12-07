<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Tag;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class TagController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "mtc");
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
        $datas = Tag::with('articles')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Tags/Index',compact('datas'));
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
       $this->validateForm($request);

        $data=[
            'nom'=>$request->input("titre"),
            'slug'=>Str::slug($request->input("titre")),
            'description'=>$request->input("contenu"),
            'user_id'=>$request->user()->id,
         ];
        $close=$request->input('fermer');
        $tagExiste=Tag::where('id',$request->input('id'))->first();
        if (!$tagExiste) {

            Tag::create($data);
            return redirect()->to(route('tags.index',"&p=".$close))

                    ->with('success', 'Mot clé ajouté avec succèss.');


        }else{
        return redirect()->back()->with('error', 'Cet mot clé existe déja.');
        }
        return redirect()->back()->with('error', "Une erreur est survenue lors de l'enregistrement");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function show(Tag $tag)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function edit(Tag $tag)
    {
        //
    }

    public function validateForm($request)
    {
       return Validator::make($request->all(), [

            'titre' => ['required',"min:3",'max:250'],
            'contenu' => ['max:2000'],
        ])->validate();
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tag $tag)
    {
        $this->validateForm($request);
        $item = new Tag;
        $table = $item->getTable();
        Validator::make($request->all(), [
            'id' => ['required',"exists:".$table.",id",'min:1'],
            ])->validate();

        $data=[
            'id'=>$request->input("id"),
            'nom'=>$request->input("titre"),
            'slug'=>Str::slug($request->input("titre")),
            'description'=>$request->input("contenu"),
            'user_id'=>$request->user()->id,
         ];
        $close=$request->input('fermer');//==true?'close':'';
        if ($request->has('id')) {

            Tag::find($request->input('id'))->update($data);
            return redirect()->to(route('tags.index',"&p=".$close))

                    ->with('success', 'Mise à jour effectuée avec succèss.');


        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tag  $tag
     * @return \Illuminate\Http\Response
     */
    public function destroy($id, Request $request)
    {

          if ($request->has('id')) {
              $a=Tag::find($request->input('id'));

              if($a){$a->delete();
                  return redirect()->back()->with('success', 'Mot clé supprimé avec succèss.');;
              }else{
                  return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
              }
          }
    }
}
