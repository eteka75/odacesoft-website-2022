<?php


namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Ressource;
use App\Models\Commande;
use Inertia\Inertia;
use Illuminate\Support\Str;

class CommandeController extends Controller
{

    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "cmd");
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
        $datas = Commande::with('user')->with('service')->with('pays')->orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas);
        return inertia('Dashboard/Commandes/Index',compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        //$cats=Ressource::OrderBy('nom','DESC')->orderBy('created_at')->get();
       // if(!$cats){abort(404);}
        //$cats=$cats->toArray();
        //dd($cats);
        //Session::flash('message','Opération réussie');
        //return inertia('Dashboard/Membres/Create', compact( 'cats'));
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
        $req=$this->validateForm($request);
        //dd($request->all());


        $fermer=$request->input("fermer");
        $uid = $request->user()->id;
        $fermer=$request->input("fermer");
        //dd($fermer);

        $etat=$request->input("active");
        Inertia::share('close', $fermer);

        $data = [
            'nom' => $request->input("nom"),
            'prenom' => $request->input("prenom"),
            'poste' => $request->input("poste"),
            'sexe' => $request->input("sexe"),
            'datenaissance' =>date("Y-m-d",strtotime( $request->input("datenaissance"))),
            'lieunaissance' => $request->input("lieunaissance"),
            'bio' => $request->input("contenu"),
            'date_integration' => $request->input("date_integration"),
            'website' => $request->input("siteweb"),
            'facebook' => $request->input("facebook"),
            'twitter' => $request->input("twitter"),
            'linkedin' => $request->input("linkedin"),
            'other_link' => $request->input("instagram"),
            'linkedin' => $request->input("autre"),
            'cover' => '-',
            'resume' => $request->input("resume"),
            'actif' => $etat,
            'user_id' => $uid,
        ];
        //dd($data);
        /*protected $fillable = [
            'nom', 'prenom', 'poste', 'sexe', 'datenaissance','lieunaissance','niveau_etude','bio','date_integration',
            'lead', 'website','facebook','twitter','instagram','linkedin','other_link','photo','cover','fichier','user_id','actif'
        ];*/

        $Article=Membre::create($data);
        if($request->hasFile("image") && $Article){
            $aid=$Article->id?$Article->id:0;
            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/membres/photos';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['photo'=>$img_data]);

        }
        if($request->hasFile("fichier")  && $Article){
            $file=$request->file("fichier");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "ressource_odacesoft_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/membres/fichiers';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['fichier'=>$img_data]);

        }
        if($Article){
            return redirect()->to(route('membre.index'))->with(['close'=>true,'success'=>'Membre sauvegardé avec succèss.']);
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

            'active' => ['required'],
            'fermer' => ['required'],
            'resume' => ['required', 'min:5', 'max:250'],
            'contenu' => ['min:10', 'max:100000'],
            'active' => ['in:0,1'],
            'nom' =>['required', 'min:5', 'max:250'],
            'prenom' =>['required', 'min:5', 'max:250'],
            'poste' =>['required', 'min:5', 'max:250'],
            'niveau_etude' =>['required', 'min:5', 'max:50'],
            'sexe' => ['required', 'in:M,F'],
            'datenaissance' => ['date','regex:/\d{1,2}\/\d{1,2}\/\d{4}/'],
            'lieunaissance' => ['required', 'min:2', 'max:250'],
            //'bio' =>['required', 'min:5', 'max:250'],
            //'date_integration' =>['required', 'min:5', 'max:250'],
            'siteweb' => ['url', 'nullable', 'max:250'],
            'facebook' => ['url', 'nullable','max:250'],
            'twitter' =>  ['url','nullable', 'max:250'],
            'linkedin'=> ['url','nullable', 'max:250'],
            'linkedin' =>  ['url','nullable', 'max:250'],
            'autre' => ['url', 'nullable','max:250'],
            'image' => ['required','image','mimes:jpg,jpeg,png,webp'],
            'fichier' => ['nullable','file','mimes:pdf,docs,docx,doc'],
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
           // 'active' => ['in:0,1'],
            'resume' => ['required', 'min:10', 'max:250'],
            'contenu' => ['min:10', 'max:100000'],
            //'type' => ['required',  'in:PDF,TEXTE,WORD,EXCEL,PPT,AUTRE'],
            //'fichier' => ['sometimes','mimes:jpeg,png,jpg,zip,pdf,ppt,rar,pptx, xlx, xlsx,docx,doc,gif,webm,mp4,mpeg','max:10000'],
            'img' => ['nullable','image','mimes:jpg,jpeg,png,webp'],

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

        $Article=Ressource::where('id',$id)->first();
        if(!$Article){
            return back()->with('error', "Cet article n'existe pas ou a été supprimé.");
        }
        $this->validateFormUpdate($request);
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
        $tbExt=[
            'PDF'=>['pdf'],
            'IMG'=>['jpeg','png','jpg','gif'],
            'PPT'=>['ppt','pptx'],
            'ZIP'=>['zip','rar'],
            'EXCEL'=>['xlx','xlsx'],
            'WORD'=>['doc','docs'],
            'VIDEO'=>['webm','mp4','mpeg'],
           ];

        if($request->hasFile("image") && $Article){

            $file=$request->file("image");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "img_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/article/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['img'=>$img_data]);

        }
        if($request->hasFile("fichier")  && $Article){

            $file=$request->file("fichier");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "ressource_odacesoft_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/Membres/files';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);

            $type="AUTRE";
            $fileExt=strtolower($fileExt);
            //Détection du type de fichier
            foreach ($tbExt as $k=>$TABext){
                $verif=in_array($fileExt,$TABext);
                if($verif){$type=$k;}
            }
            //dd($type);
            $img_data=$purl."".$image_name;
            $Article->update(['fichier'=>$img_data,'type'=>$type]);

        }
        return redirect()->to(route('ressource.index'))
            ->with('success', 'Ressource mise à jour avec succèss.');
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
             $a=Ressource::find($request->input('id'));
             if($a){
                 $filename=asset($a->fichier);
                if (file_exists($filename)) {
                    unlink($filename);
                }

                $a->delete();
                return redirect()->back()->with('message', 'Ressource supprimée avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
