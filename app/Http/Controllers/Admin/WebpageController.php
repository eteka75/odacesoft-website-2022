<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Webpage;
use Inertia\Inertia;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;


class WebpageController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "page");
            Inertia::share('hmenu', "Web");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n =8;
        $data=null;
        $datas = Webpage::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas['data']);
        return inertia('Dashboard/Webpages/Index',compact('datas','data'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Dashboard/Webpages/Create');
    }

    public function validateForm($request)
    {
       return Validator::make($request->all(), [

            'title' => ['required',"min:3",'max:250'],
            'contenu' => ['required','max:40000'],
            'resume' => ['required','max:255'],
            'active' => ['required','in:0,1'],
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

        //'title', 'slug', 'content','user_id','actif'
        //dd($data);
        //dd($request->all());
        $actif=$request->input("active")?true:false;
        $slug=Str::slug($request->input("title"));
        $data=[
            'title'=>$request->input("title"),
            'slug'=>$slug,
            'resume'=>$request->input("resume"),
            'content'=>$request->input("contenu"),
            'user_id'=>$request->user()->id,
            'actif'=>$actif
         ];
        //dd($data);
        $close=$request->input('fermer');
        $Existe=Webpage::where('slug',$slug)->first();
        if (!$Existe) {
            //dd($data);
            $w=Webpage::create($data);
            //dd($w);
            return redirect()->to(route('page.index',"&p=".$close))

                    ->with('success', 'Page ajoutée avec succèss.');


        }else{
        return redirect()->back()->with('error', 'Cette page existe déja.');
        }
        return redirect()->back()->with('error', "Une erreur est survenue lors de l'enregistrement");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $data=Webpage::where('id',$id)->first()->toArray();
        //dd($data);
        return inertia('Dashboard/Webpages/Show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $edit=1;
        $data=Webpage::where('id',$id)->first()->toArray();
        //dd($data);
        return inertia('Dashboard/Webpages/Create',compact('data','edit'));
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
        $this->validateForm($request);
        $item = new Webpage();
        $table = $item->getTable();
        Validator::make($request->all(), [
            'id' => ['required',"exists:".$table.",id",'min:1'],
            ])->validate();

        //sleep(4);

        $actif=$request->input("active")?true:false;
        $slug=Str::slug($request->input("title"));
        $data=[
            'title'=>$request->input("title"),
            'resume'=>$request->input("resume"),
            'slug'=>$slug,
            'content'=>$request->input("contenu"),
            'user_id'=>$request->user()->id,
            'actif'=>$actif
            ];
        $close=$request->input('fermer');//==true?'close':'';
        if ($request->has('id')) {

            Webpage::find($request->input('id'))->update($data);
            return redirect()->to(route('page.index',"&p=".$close))

                    ->with('success', 'Mise à jour effectuée avec succèss.');


        }else{
            return redirect()->back()->with('error','Une errreur est survenue au cours de la mise à jour');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Webpage  $webpage
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $a=Webpage::find($request->input('id'));

            if($a){$a->delete();
                return redirect()->back()->with('success', 'Page supprimée avec succèss.');;
            }else{
                return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
            }
        }

    }
}
