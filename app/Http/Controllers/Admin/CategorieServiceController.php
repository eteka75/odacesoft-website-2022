<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CategorieService;
use App\Models\Partenaire;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class CategorieServiceController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "ctserv");
            Inertia::share('hmenu', "Serv");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n =8;
        $datas = CategorieService::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas);
        return inertia('Dashboard/CategorieServices/Index',compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$cats=Partenaire::OrderBy('nom','DESC')->orderBy('created_at')->get();
       // if(!$cats){abort(404);}
        //$cats=$cats->toArray();
        //dd($cats);
        //Session::flash('message','Opération réussie');
        //return inertia('Dashboard/Partenaires/Create', compact( 'cats'));
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
        //dd($request->all());
        $req=$this->validateForm($request);

        $fermer=$request->input("fermer");
        $uid = $request->user()->id;
        $fermer=$request->input("fermer")==0?true:false;

        $etat=$request->input("active");//==true?1:0;
        $slug=Str::slug($request->input("nom"));

        $findSlug=Partenaire::where('slug',$slug)->first();

        Inertia::share('close', $fermer);
        if($findSlug){
            return back()->with(['error'=>'Ce partenaire existe déjà.']);
        }

        $data = [
            'title' => $request->input("nom"),
            'slug' => $slug,
            'lead' => $request->input("resume"),
            'content' => $request->input("contenu"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
       
        $Article=CategorieService::create($data);

        if($request->hasFile("image") && $Article){
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = $slug."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/categorie-services/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['img'=>$img_data]);
            //dd($Article);
        }

        if($Article){
            return redirect()->to(route('categorie-service.index'))->with(['close'=>$fermer,'success'=>'Catégorie de service ajouté avec succèss.']);
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
        $data=Partenaire::with('categories')->with('tags')->with('commentaires')->with('image')->where('id',$id)->first();

        if(!$data) {abort(404);}
        $data=$data->toArray();
        return inertia('Dashboard/Partenaires/Show', compact('data'));
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

            'fermer' => ['required',],
            'active' => ['in:0,1'],
            'nom' => ['required', 'min:3', 'max:250'],
            'resume' => ['required','max:250'],
            'contenu' => ['min:10', 'max:100000'],
            'image' => ['image'],            
           // 'image' => [ 'image','required_without:resume'],

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

            'fermer' => ['required',],
            'active' => ['in:0,1'],
            'nom' => ['required', 'min:3', 'max:250'],
            'resume' => ['required','max:250'],
            'contenu' => ['min:10', 'max:100000'],
           // 'image' => ['nullable','image','mimes:jpg,jpeg,png,webp'],


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
        $etat=$request->input("active")==true?1:0;
        $uid = $request->user()->id;

        $Article=CategorieService::where('id',$id)->first();
        if(!$Article){
            return back()->with('error', "Cet partenaire n'existe pas ou a été supprimé.");
        }
        $this->validateFormUpdate($request);

        $slug=Str::slug($request->input("nom"));

        $uid = $request->user()->id;
       $etat=$request->input("active");
       $slug=Str::slug($request->input("nom"));
       $data = [
        'title' => $request->input("nom"),
        'slug' => $slug,
        'lead' => $request->input("resume"),
        'content' => $request->input("contenu"),
        'actif' => $etat,
        'user_id' => $uid,
    ];
   //dd($data);
    $Article->update($data);

        if($request->hasFile("image") && $Article){
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_img_".rand(123456,999999). "." .$fileExt;
            $purl='/storage/disk/categorie-services/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['img'=>$img_data]);
            //dd($Article);
        }
        return redirect()->to(route('categorie-service.index'))
            ->with('success', 'Catégorie de service mise à jour avec succèss.');
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
             $a=CategorieService::find($request->input('id'));
             if($a){
                 $filename=$a->img;
                if (file_exists($filename)) {
                    @unlink($filename);
                   // dd('OK');
                }
                //dd( $filename);

                $a->delete();
                return redirect()->back()->with('message', 'Partenaire supprimée avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
