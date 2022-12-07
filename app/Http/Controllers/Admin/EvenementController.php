<?php

namespace App\Http\Controllers\Admin;

use App\Models\Evenement;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Inertia\Inertia;
use Illuminate\Support\Str;

class EvenementController extends Controller
{
   /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "event");
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
        $datas = Evenement::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        return inertia('Dashboard/Evenements/Index', compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return inertia('Dashboard/Evenements/Create');
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
        $etat=$request->input("actif");
        $slug=Str::slug($request->input("title"));
        $findSlug=Evenement::where('slug',$slug)->first();
        if($findSlug){
            return back()->with('error', 'Cet evenement  existe déjà.');
        }
        $data = [
            'title' => $request->input("title"),
            'slug' => $slug,
            'lieu' => $request->input("lieu"),
            'lead' =>  $request->input("description"),
            'content' => $request->input("contenu"),
            'date_event' =>date("Y-m-d",strtotime( $request->input("datedebut"))),
            'heure_event' => $request->input("heuredebut"),
            'nb_participants' => $request->input("participants"),
            'date_fin' => date("Y-m-d",strtotime($request->input("datedebut"))),
            'heure_fin' => $request->input("heuredebut"),
            'priorite' => $request->input("priorite"),
            'top' => $request->input("top"),
            'nb_participants' => $request->input("participants"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
       // dd($data);
        //$url = Storage::url($validated['image'].".".$extension);
        $Activite=Evenement::create($data);
        if($request->hasFile("image")){
            $aid=$Activite->id?$Activite->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/evenements/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img=$purl.$image_name;
            $Activite->update(['img'=>$img]);
        }
        return redirect()->to(route('evenement.index'))
            ->with('success', 'Evenement  crée avec succèss.');
    }



    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data=Evenement::where('id',$id)->first();

        if(!$data) {abort(404);}
        $data=$data->toArray();
        return inertia('Dashboard/Evenements/Show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {

         $activite=Evenement::where('id',$id)->first();
         if(!$activite){abort(404);}
         $activite=$activite->toArray();
         //dd($activite);
        // dd($request->input("id"));
        return inertia('Dashboard/Evenements/Edit', compact('activite'));
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

            'top' => ['required'],
            'actif' => ['required'],
            'title' => ['required', 'min:5', 'max:250'],
            'lieu' => [ 'max:250'],
            'datedebut' =>['date','regex:/\d{1,2}\/\d{1,2}\/\d{4}/'],
            'datefin' => ['date','regex:/\d{1,2}\/\d{1,2}\/\d{4}/'],
            'heuredebut' => ['date_format:H:i'],
            'heurefin' => ['date_format:H:i'],
            'participants' => ['required', 'integer', 'max:100000'],
            'description' => ['required', 'min:5', 'max:250'],
            'contenu' => ['required', 'min:10', 'max:100000'],
            'img' => ['image','mimes:jpg,jpeg,png,webp'],

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

            'top' => ['required'],
            'actif' => ['required'],
            'title' => ['required', 'min:5', 'max:250'],
            'participants' => ['required', 'integer', 'max:100000'],
            'lieu' => [ 'max:250'],
            'datedebut' =>['bail','date_format:"Y-m-d"'],
            'datefin' => ['bail','date_format:"Y-m-d"'],
            'heuredebut' => ['date_format:H:i'],
            'heurefin' => ['date_format:H:i'],
            'description' => ['required', 'min:5', 'max:250'],
            'contenu' => ['required', 'min:10', 'max:100000'],

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

        $Activite=Evenement::where('id',$id)->first();
        if(!$Activite){
            return back()->with('error', "Cette Evenement  n'existe pas ou a été supprimée.");
        }
        $this->validateFormUpdate($request);
        //dd($n);

        $slug=Str::slug($request->input("title"));
        $data = [
            'title' => $request->input("title"),
            'slug' => $slug,
            'lieu' => $request->input("lieu"),
            'lead' =>  $request->input("description"),
            'content' => $request->input("contenu"),
            'date_event' =>date("Y-m-d",strtotime( $request->input("datedebut"))),
            'heure_event' => $request->input("heuredebut"),
            'nb_participants' => $request->input("participants"),
            'date_fin' => date("Y-m-d",strtotime($request->input("datedebut"))),
            'heure_fin' => $request->input("heuredebut"),
            'priorite' => $request->input("priorite"),
            'top' => $request->input("top"),
            'nb_participants' => $request->input("participants"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
        //dd($data);
        //$url = Storage::url($validated['image'].".".$extension);
        $Activite->update($data);
        if($request->hasFile("image")){
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = substr($slug,0,10)."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/evenements/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img=$purl.$image_name;
            $Activite->update(['img'=>$img]);
        }
        return redirect()->to(route('evenement.index'))
            ->with('success', 'Evenement  mise à jour avec succèss.');

        return redirect()->to(route('evenement.index'))
            ->with('success', 'Evenement  mise à jour avec succèss.');
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
             $a=Evenement::find($request->input('id'));
             if($a){
                $a->delete();
                return redirect()->back()->with('message', 'Evenement  supprimé avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
