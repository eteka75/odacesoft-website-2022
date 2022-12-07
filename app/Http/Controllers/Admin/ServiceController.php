<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Article;
use App\Models\ArticleCategorie;
use App\Models\ArticleMedia;
use App\Models\CategorieService;
use App\Models\Service;
use Inertia\Inertia;
use Illuminate\Support\Str;
use App\Models\Tag;

class ServiceController extends Controller
{
   
    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "so");
            Inertia::share('hmenu', "Serv");
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
        $datas = Service::with('categories')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Services/Index', compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $cats=CategorieService::OrderBy('title','DESC')->where('actif',true)->orderBy('created_at')->get();
       // if(!$cats){abort(404);}
        $cats=$cats->toArray();
        //dd($cats);
        //Session::flash('message','Opération réussie');
        return inertia('Dashboard/Services/Create', compact( 'cats'));
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
        $etat=$request->input("publie");
        $slug=Str::slug($request->input("title"));
        $findSlug=Article::where('slug',$slug)->first();
        if($findSlug){
            return back()->with('error', 'Ce service existe déjà.');
        }
        $data = [
            'title' => $request->input("title"),
            'slug' => $slug,
            'prix_min' => $request->input("prix_min"),
            'prix_max' => $request->input("prix_max"),
            'content' => $request->input("contenu"),
            'lead' => $request->input("resume"),
            'categorie_service_id' => $request->input("categorie_id"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
        //dd($request->all());
        //$url = Storage::url($validated['image'].".".$extension);
        $Article=Service::create($data);
        if($request->hasFile("image")){
            $aid=$Article->id?$Article->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/services/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img=$purl.$image_name;
            $Article->update(['img'=>$img]);

        }

        return redirect()->to(route('service.index'))
            ->with('success', 'Service cajouté avec succèss.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Service::with('categories')->where('id',$id)->first();

        if(!$data) {abort(404);}
        $data=$data->toArray();
        //dd($data);
        return inertia('Dashboard/Services/Show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $cats=CategorieService::OrderBy('title','DESC')->orderBy('created_at')->get();
         $service=Service::with('categories')->where('id',$id)->first();
         if(!$service){abort(404);}

         $cats=$cats->toArray();
         $service=$service->toArray();
        return inertia('Dashboard/Services/Edit', compact('service', 'cats'));
    }
    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateForm($request)
    {
        $item = new CategorieService();
        $table = $item->getTable();

        return Validator::make($request->all(), [

            'publie' => ['in:0,1'],
            'title' => ['required', 'min:5', 'max:250'],
            'prix_min' => ['max:100'],
            'prix_max' => ['max:100'],
            'resume' => ['required', 'min:5', 'max:250'],
            'contenu' => ['required', 'min:10', 'max:100000'],
            'categorie_id' => ['required',"exists:".$table.",id",'min:1'],
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
        $uid = $request->user()->id;

        $Article=Service::where('id',$id)->first();
        if(!$Article){
            return back()->with('error', "Cet service n'existe pas ou a été supprimé.");
        }
        $this->validateForm($request);
        
        $etat=$request->input("publie");
        $slug=Str::slug($request->input("title"));
        $findSlug=Article::where('slug',$slug)->first();
        if($findSlug){
            return back()->with('error', 'Ce service existe déjà.');
        }
        $data = [
            'title' => $request->input("title"),
            'slug' => $slug,
            'prix_min' => $request->input("prix_min"),
            'prix_max' => $request->input("prix_max"),
            'content' => $request->input("contenu"),
            'lead' => $request->input("resume"),
            'categorie_service_id' => $request->input("categorie_id"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
        //dd($request->all());
        //$url = Storage::url($validated['image'].".".$extension);
        $Article->update($data);
        if($request->hasFile("image")){
            $aid=$Article->id?$Article->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/services/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img=$purl.$image_name;
            $Article->update(['img'=>$img]);

        }


        return redirect()->to(route('service.index'))
            ->with('success', 'Service mis à jour avec succèss.');
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
             $a=Service::find($request->input('id'));
             if($a){
                $filename=$a->img;
                if (file_exists($filename)) {
                    @unlink($filename);
                   // dd('OK');
                }
                $a->delete();
                return redirect()->back()->with('message', 'Service supprimé avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
