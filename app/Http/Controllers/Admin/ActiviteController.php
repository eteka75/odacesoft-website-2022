<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Activite;
use Inertia\Inertia;
use Illuminate\Support\Str;

class ActiviteController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "act");
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
        $n = 6;
        $datas = Activite::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Activites/Index', compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return inertia('Dashboard/Activites/Create');
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
        $etat=$request->input("actif");
        $slug=Str::slug($request->input("title"));
        $findSlug=Activite::where('slug',$slug)->first();
        if($findSlug){
            return back()->with('error', 'Cet Activite existe déjà.');
        }
        $data = [
            'title' => $request->input("title"),
            'slug' => $slug,
            'statut' => '-',
            'temps' => $request->input("temps"),
            'lead' =>  $request->input("description"),
            'content' => $request->input("contenu"),
            'actif' => $etat,
            'user_id' => $uid
        ];
        //dd($data);
        //dd($request);
        //$url = Storage::url($validated['image'].".".$extension);
        $img=null;
        $url='storage/disk/activites/';
        if ($request->hasFile('image')) {
            if($file=$request['image'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_'.time().'_page.' . $extension;

                $file->move($uploadPath, $fileName);
                $data['img'] = $url.$fileName;
                $img=" avec une image";
                //$requestData['format'] =strtoupper($extension);
            }
        }
        //dd($data);
        $Activite=Activite::create($data);
        
        return redirect()->to(route('activite.index'))
            ->with('success', 'Activité crée avec succèss'.$img.'.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Activite::where('id',$id)->first();

        if(!$data) {abort(404);}
        $data=$data->toArray();
        return inertia('Dashboard/Activites/Show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

         $activite=Activite::where('id',$id)->first();
         if(!$activite){abort(404);}
         $activite=$activite->toArray();
        // dd($request->input("id"));
        return inertia('Dashboard/Activites/Edit', compact('activite'));
    }
    /**
     * Validate form the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function ValidateForm($request,$image=false)
    {
        
        return Validator::make($request->all(), [

            'actif' => ['required'],
            'title' => ['required', 'min:5', 'max:250'],
            'description' => ['required', 'min:5', 'max:250'],
            'description' => ['required', 'min:5', 'max:250'],
            'contenu' => ['required', 'min:10', 'max:8000000'],
            'image' => ['nullable','image','mimes:jpg,jpeg,png,webp|max:2048'],

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
        //dd($request->all());
        $n=strlen($request->input('contenu'));
        $etat=$request->input("actif");
        $uid = $request->user()->id;

        $Activite=Activite::where('id',$id)->first();
        if(!$Activite){
            return back()->with('error', "Cette activité n'existe pas ou a été supprimée.");
        }
        $this->validateForm($request,true);
        //dd($n);
        $slug=Str::slug($request->input("title"));
        $data = [
            'title' => $request->input("title"),
            //'slug' => $slug,
            'statut' => '-',
            'temps' => $request->input("temps"),
            'lead' =>  $request->input("description"),
            'content' => $request->input("contenu"),
            'actif' => $etat,
            'user_id' => $uid
        ];
        //dd($data);
        //$url = Storage::url($validated['image'].".".$extension);
        $url='storage/disk/activites/';
        if ($request->hasFile('image')) {
            if($file=$request['image'] ){
                $uploadPath = ($url);

                $extension = $file->getClientOriginalExtension();
                $fileName = rand(11111, 99999) . '_activite.' . $extension;

                $file->move($uploadPath, $fileName);
                $data['img'] = $url.$fileName;
                //$requestData['format'] =strtoupper($extension);
            }
        }

        
        $Activite->update($data);
       
        return redirect()->to(route('activite.index'))
            ->with('success', 'Activité mise à jour avec succèss.');
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
             $a=Activite::find($request->input('id'));
             if($a){
                $a->delete();
                return redirect()->back()->with('message', 'Activité supprimée avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
