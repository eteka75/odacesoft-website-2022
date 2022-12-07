<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Programme;
use App\Models\Webpage;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class ProgrammeController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "prog");
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
        $datas = Programme::orderBy('actif', 'DESC')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas);
        return inertia('Dashboard/Programmes/Index',compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$cats=Programme::OrderBy('nom','DESC')->orderBy('created_at')->get();
       // if(!$cats){abort(404);}
        //$cats=$cats->toArray();
        //dd($cats);
        //Session::flash('message','Opération réussie');
        //return inertia('Dashboard/Ressources/Create', compact( 'cats'));
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
        $req=$this->validateForm($request);

        $fermer=$request->input("fermer");
        $uid = $request->user()->id;
        $fermer=$request->input("fermer")==0?true:false;
        //dd($fermer);

        $etat=$request->input("active");
        $slug=Str::slug($request->input("titre"));
        $findSlug=Programme::where('slug',$slug)->first();

        Inertia::share('close', $fermer);
        if($findSlug){
            //return 0;
            return back()->with(['error'=>'Ce programme existe déjà.']);
        }

        $data = [
            'title' => $request->input("titre"),
            'slug' => $slug,
            'statut' => '-',
            'resume' => $request->input("resume"),
            'description' => $request->input("contenu"),
            //'type' =>  $request->input("type"),
            'actif' => $etat,
            'user_id' => $uid,
        ];


        $Article=Programme::create($data);
        if($request->hasFile("image") && $Article){
            $aid=$Article->id?$Article->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/programmes/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['img'=>$img_data]);

        }
        if($Article){
            return redirect()->to(route('programme.index'))->with(['close'=>true,'success'=>'Programme sauvegardé avec succèss.']);
        }else{
            return redirect()->back()
            ->with(['close'=>false,'error'=>"Erreur de'enregistrement"]);
        }
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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

            'fermer' => ['required'],
            'titre' => ['required', 'min:5', 'max:250'],
            'resume' => ['required', 'min:10', 'max:250'],
            'contenu' => ['min:10', 'max:100000'],
            'active' => ['in:0,1'],
            //'type' => ['required',  'in:PDF,TEXTE,WORD,EXCEL,PPT,AUTRE'],
            //'fichier' => ['required',  'mimes:jpeg,png,jpg,zip,pdf,ppt,rar,pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp'],

        ])->validate();
    }
    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateFormUpdate($request)
    {
        return Validator::make($request->all(), [

            'fermer' => ['required'],
            'titre' => ['required', 'min:5', 'max:250'],
            'active' => ['required','in:0,1'],
            'resume' => ['required', 'min:10', 'max:250'],
            'contenu' => ['min:10', 'max:100000'],
            //'type' => ['required',  'in:PDF,TEXTE,WORD,EXCEL,PPT,AUTRE'],
            //'fichier' => ['sometimes','mimes:jpeg,png,jpg,zip,pdf,ppt,rar,pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg','max:10000'],
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


        $Article=Programme::where('id',$id)->first();
        if(!$Article){
            return back()->with('error', "Cet article n'existe pas ou a été supprimé.");
        }
        $this->validateFormUpdate($request);
        $etat=$request->input("active");
        //dd($request->all());

        $slug=Str::slug($request->input("titre"));

        $data = [
            'title' => $request->input("titre"),
            'slug' => $slug,
            'statut' => '-',
            'resume' => $request->input("resume"),
            'description' => $request->input("contenu"),
            'actif' => $etat,
        ];

        $Article->update($data);
        if($request->hasFile("image") && $Article){

            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/programmes/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['img'=>$img_data]);

        }

        return redirect()->to(route('programme.index'))
            ->with('success', 'Programme mis à jour avec succèss.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
         if ($request->has('id')) {
             $a=Programme::find($request->input('id'));
             if($a){
                 $filename=asset($a->fichier);
                if (file_exists($filename)) {
                    unlink($filename);
                }

                $a->delete();
                return redirect()->back()->with('message', 'Programme supprimé avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
