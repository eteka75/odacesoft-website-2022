<?php


namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Partenaire;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class PartenaireController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "prt");
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
        $datas = Partenaire::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas);
        return inertia('Dashboard/Partenaires/Index',compact('datas'));
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
            'nom' => $request->input("nom"),
            'slug' => $slug,
            'resume' => $request->input("resume"),
            'description' => $request->input("contenu"),
            'url' => $request->input("url"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
        //dd($data);
        $Article=Partenaire::create($data);
        if($request->hasFile("image") && $Article){

            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,30)."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/partenaires/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['url_logo'=>$img_data]);
            //dd($Article);

        }
        if($Article){
            return redirect()->to(route('partenaire.index'))->with(['close'=>$fermer,'success'=>'Partenaire sauvegardé avec succès.']);
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
            'url' => ['nullable', 'url', 'max:250'],
            'resume' => ['required','max:250'],
            'contenu' => ['min:10', 'max:100000'],
            'image' => ['required','image','mimes:jpg,jpeg,png,webp'],

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
            'url' => ['nullable', 'url', 'max:250'],
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
        $etat=$request->input("active")==1?1:0;
        $uid = $request->user()->id;

        $Article=Partenaire::where('id',$id)->first();
        if(!$Article){
            return back()->with('error', "Cet partenaire n'existe pas ou a été supprimé.");
        }
        $this->validateFormUpdate($request);

        $slug=Str::slug($request->input("nom"));
        /*$fermer=$request->input("fermer");
        $findSlug=Partenaire::where('slug',$slug)->andWhere('id',$id)->first();
        Inertia::share('close', $fermer);
        if($findSlug){
            return back()->with(['error'=>'Cet partenaire existe déjà.']);
        }*/

        $data = [
            'nom' => $request->input("nom"),
            'slug' => $slug,
            'resume' => $request->input("resume"),
            'description' => $request->input("contenu"),            
            'url' => $request->input("url"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
       $Article->update($data);
        //dd($data);

        if($request->hasFile("image")){

            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = $slug."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/partenaires/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['url_logo'=>$img_data]);
            //dd($Article);

        }
        return redirect()->to(route('partenaire.index'))
            ->with('success', 'Partenaire mis à jour avec succès.');
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
             $a=Partenaire::find($request->input('id'));
             if($a){
                 $filename=($a->fichier);
                if (file_exists($filename)) {
                    unlink($filename);
                }

                $a->delete();
                return redirect()->back()->with('message', 'Partenaire supprimée avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
