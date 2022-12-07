<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Slide;
use Inertia\Inertia;
use Illuminate\Support\Str;

class SlideController extends Controller
{
    
      /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "slide");
            Inertia::share('hmenu', "Web");
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Les variables
        $n = 8;
        $datas = Slide::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Slides/Index', compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

       // return inertia('Dashboard/Slides/Create');
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

        //dd($request->all());
        $uid = $request->user()->id;
        $etat=$request->input("active");
       // dd($etat);
        $slug=Str::slug($request->input("nom"));
        $slug=substr($slug,0,150).'-'.rand(12,999999999);
        $findSlug=Slide::where('slug',$slug)->first();
        if($findSlug){
            $findSlug=substr($findSlug,0,150).'-'.rand(12,999999999);
            //return back()->with('error', 'Ce Slide existe déjà.');
        }
        $data = [
            'titre' => $request->input("nom"),
            'slug' => $slug,
            'sous_titre' => $request->input("resume"),
            'detail' => $request->input("contenu"),
            'etat' => $etat,
            'user_id' => $uid
        ];
        //dd($data);
        //dd($request);
        //$url = Storage::url($validated['image'].".".$extension);
        $img=null;
        $url='storage/disk/slides/';
        if ($request->hasFile('image')) {
            if($file=$request['image'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_'.time().'_slide.' . $extension;

                $file->move($uploadPath, $fileName);
                $data['image'] = $url.$fileName;
                $img=" avec une image";
                //$requestData['format'] =strtoupper($extension);
            }
        }
        //dd($data);
        $slide=Slide::create($data);

        if($slide){
            $slide->update(['slug'=>$slide->slug.'-'.$slide->id]);
        }
        
        return redirect()->to(route('slide.index'))
            ->with('success', 'Slide crée avec succèss'.$img.'.');
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
       // dd($request->all());
        $n=strlen($request->input('contenu'));
        $etat=$request->input("active")==1?1:0;
        $uid = $request->user()->id;

        $slide=Slide::where('id',$id)->first();
        //dd($id);
        if(!$slide){
            return back()->with('error', "Ce Slide n'existe pas ou a été supprimée.");
        }
        $this->validateForm($request,"update");
        //dd($n);

        $data = [
            'titre' => $request->input("nom"),
            'sous_titre' => $request->input("resume"),
            'detail' => $request->input("contenu"),
            'etat' => $etat,
            'user_id' => $uid
        ];
       
        //dd($data);
        //$url = Storage::url($validated['image'].".".$extension);
        $slide->update($data);
        $slug=$slide->slug;
        if($request->hasFile("image")){
            $aid=$slide->id?$slide->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_slide_".time(). "." .$fileExt;
            $purl='./storage/disk/slides/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img=$purl.$image_name;
            $slide->update(['image'=>$img]);
        }
        return redirect()->to(route('slide.index'))
            ->with('success', 'Slide mise à jour avec succès.');
    }
    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateForm($request,$mode="store")
    {
        if($mode=="update"){
           //dd($request->active);
            return Validator::make($request->all(), [
                'active' => ['required'],
                'nom' => ['nullable',  'max:250'],
                'resume' => ['nullable', 'max:255'],
                'contenu' => ['nullable','max:100000'],
                //'image' => ['nullable','mimes:jpg,jpeg,png,webp'],
    
            ])->validate();
        }else{
            return Validator::make($request->all(), [

                'active' => ['required'],
                'nom' => ['nullable',  'max:250'],
                'resume' => ['nullable', 'max:255'],
                'contenu' => ['nullable','max:100000'],
                'image' => ['required','image','mimes:jpg,jpeg,png,webp'],
    
            ])->validate();
        }
       
    }

    public function destroy($id,Request $request)
    {
        if ($request->has('id')) {
             $a=Slide::find($request->input('id'));
             if($a){
                $a->delete();
                return redirect()->back()->with('message', 'Activite supprimée avec succès.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }

}
