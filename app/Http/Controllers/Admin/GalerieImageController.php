<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GalerieImage;
use Illuminate\Support\Str;
use Inertia\Inertia;

class GalerieImageController extends Controller
{

     /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "gimg");
            Inertia::share('hmenu', "Serv");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $n = 6;
        $n = 10;
        $datas = GalerieImage::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas);
        //$cats=Service::select('id','title')->where('actif',true)->get()->toArray();
        return inertia('Dashboard/GalerieImages/Index', compact('datas'));
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

        // dd($request->all());
         $uid = $request->user()->id;
         $etat=$request->input("active");
         $slug=Str::slug($request->input("nom"));
         $findSlug=GalerieImage::where('slug',$slug)->first();
         if($findSlug){
             return back()->with('error', 'Cet Activite existe déjà.');
         }
         $data = [
             'titre' => $request->input("nom"),
             'slug' => $slug,
             'lead' =>  $request->input("resume"),
             'description' => $request->input("contenu"),
             'view_count' => 0,
             'actif' => $etat,
             'user_id' => $uid,
         ];
         //dd($data);
         //$url = Storage::url($validated['image'].".".$extension);
         $Activite=GalerieImage::create($data);
         if($request->hasFile("image")){
             $aid=$Activite->id?$Activite->id:0;
             $file=$request->file("image");
             $fileExt = $file->getClientOriginalExtension();
             $image_name = substr($slug,0,10)."_".rand(123456,999999). "." .$fileExt;
             $purl='./storage/disk/galerie-images/';
             $destination_path = public_path($purl);
             $file->move($destination_path, $image_name);
             $img=$purl.$image_name;
             $Activite->update(['img'=>$img]);
         }
         return redirect()->to(route('galerie-image.index'))
             ->with('success', 'Dossier image ajouté avec succès.');
    }

    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateForm($request,$type="store")
    {
       
        if($type=='update'){
            return Validator::make($request->all(), [
                'active' => ['required','in:1,0'],
                'nom' => ['required', 'min:3', 'max:250'],
                'resume' => ['required', 'min:5', 'max:255'],
                'contenu' => ['required', 'min:10', 'max:100000'],
              //  'image' => 'nullable|mimes:jpeg,jpg,png,gif,webp|max:50000',
    
            ])->validate();
        }else{
        return Validator::make($request->all(), [
            'active' => ['required','in:1,0'],
            'nom' => ['required', 'min:3', 'max:250'],
            'resume' => ['required', 'min:5', 'max:255'],
            'contenu' => ['required', 'min:10', 'max:100000'],
            'image' => 'image|mimes:jpeg,jpg,png,gif,webp|max:50000',

        ])->validate();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\GalerieImage  $galeriePhoto
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=GalerieImage::where('id',$id)->first();
        if(!$data) {abort(404);}
        $ri=$data->Images()->latest()->get();
        $images=$ri->toArray();

        $id=$data->id;
        $data=$data->toArray();
        return inertia('Dashboard/GalerieImages/Show', compact('data','id','images'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\GalerieImage  $galeriePhoto
     * @return \Illuminate\Http\Response
     */
    public function edit(GalerieImage $galeriePhoto)
    {
        //
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
        //dd($request->all());
        $n=strlen($request->input('contenu'));
        $etat=$request->input("active");
        $uid = $request->user()->id;

        $Activite=GalerieImage::where('id',$id)->first();
        if(!$Activite){
            return back()->with('error', "Cette activite n'existe pas ou a été supprimée.");
        }
        $this->validateForm($request,'update');
        //dd($n);

        //$slug=Str::slug($request->input("nom"));
        $data = [
            'titre' => $request->input("nom"),
           // 'slug' => $slug,
            'lead' =>  $request->input("resume"),
            'description' => $request->input("contenu"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
       
        //dd($data);
        //$url = Storage::url($validated['image'].".".$extension);
        $Activite->update($data);
        if($request->hasFile("image")){
            $aid=$Activite->id?$Activite->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_".rand(123456,999999). "." .$fileExt;
            $purl='./storage/disk/galerie-images/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img=$purl.$image_name;
            $Activite->update(['img'=>$img]);
        }
        return redirect()->to(route('galerie-image.index'))
            ->with('success', 'Dossier mis à jour avec succès.');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\GalerieImage  $galeriePhoto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        if ($request->has('id')) {
            $a=GalerieImage::find($request->input('id'));
            if($a){
               $a->delete();
               return redirect()->back()->with('success', 'Dossier image supprimé avec succès.');;
            }else{
                return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
            }
        }
    }
}
