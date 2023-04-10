<?php

namespace App\Http\Controllers;

use App\Models\ArticleCommentaire;
use App\Models\DemandePartenariat;
use App\Models\ArticleCategorie;
use App\Models\CategorieService;
use App\Models\ContactMessage;
#use App\Models\ArticlesViews;
use App\Models\GalerieImage;
use App\Models\Realisation;
use App\Models\Partenaire;
use App\Models\Stagiaire;
use App\Models\Ressource;
#use App\Models\Formation;
use App\Models\Programme;
use App\Models\Evenement;
use App\Models\Activite;
use App\Models\Commande;
use App\Models\Service;
use App\Models\Webpage;
use App\Models\Article;
use App\Models\Membre;
use Inertia\Inertia;
use App\Models\Post;
use App\Models\Pays;
use App\Models\Slide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class PageController extends Controller
{
    public function Accueil(){
        $nb_article=8;
        $cat_services=CategorieService::where('actif',true)->get()->toArray();
        $services=Service::where('actif',true)->get()->toArray();
        $partenaires=Partenaire::where('actif',true)->get()->toArray();
        $articles= Article::latest()->with('categories')->with('image')->with('user')->orderBy('created_at','DESC')->paginate($nb_article)->toArray();

        $pageMVV=Webpage::where('slug','notre-vision')->orWhere('slug','notre-mission')->orWhere('slug','nos-valeurs')->get()->toArray();
        $realisations=Realisation::latest()->where('actif',true)->take(4)->inRandomOrder()->get()->toArray();
        $gimages=GalerieImage::latest()->where('actif',true)->take(4)->get()->toArray();
        $activites=Activite::latest()->where('actif',true)->where('img','!=','')->take(6)->get()->toArray();//->where('actif',true)
        //$pays=Pays::select('id','nom_fr_fr')->orderBy("nom_fr_fr")->get()->toArray();//->where('actif',true)
        $slides=Slide::orderBy("id",'DESC')->where('etat',true)->limit(8)->get()->toArray();//->where('actif',true)
        //dd($slides);
       // $sms="Votre commande envoyée avec succès.<br><b>CODE DE LA COMMANDE : gghhgghghgh</b><br> <small>Merci pour la confiance ! </small>";
       // return redirect()->to('/')->with(['notification'=>$sms]);
        //dd($activites);
        //::flash('notification',$sms);
        //dd('HOME');
        return Inertia::render('Web/Index',compact('cat_services','partenaires','pageMVV','realisations','activites','services','articles','slides','gimages'));
    }
    public function Activites(){
        $n=12;
        $datas=Activite::latest()->where('actif',true)->orderBy('img')->Simplepaginate($n)->toArray();
        //dd($datas);
        return Inertia::render('Web/Activites',compact('datas'));
    }
    public function Test(){
        return Inertia::render('Web/Test');
    }
    public function Activite ($slug)
    {
    $activites=Activite::where('actif',true)->inRandomOrder()->take(10)->get()->toArray();
    $activite=Activite::where('actif',true)->where('slug',$slug)->first();
    $viewed = Session::get('nb_act', []);
    //dd($activite);
    if( intval($activite->view_count)<=0){ $activite->update(['view_count'=>1]);}
       if (!in_array($activite['id'], $viewed)) {
           $activite->increment('view_count',1);
           Session::push('nb_act', $activite->id);
        }

    $activite=$activite->toArray();
    return Inertia::render('Web/Activite',compact("activite",'activites'));
   }
    public function Aproposde($slug){
        $page=Webpage::where('slug',$slug)->first()->toArray();
        return Inertia::render('Web/Apropos-de',compact('page'));
    }
   /* funfion page */
   public function Partenaires(Request $request)
   {
       $n=16;
       $datas= $partenaires=Partenaire::where('actif',true)->paginate($n)->toArray();
       //dd($n,$datas);
     return Inertia::render('Web/Partenaires',compact('datas'));
   }
   public function GetRealisation($slug)
   {
       $data=Realisation::where('slug',$slug)->first();
       $images=[];
       $nb_images=30;
       if($data){
          $images= $data->Images()->latest()->Simplepaginate($nb_images);
          $images=$images->toArray();

       }
      

       $datas=Realisation::where('slug','!=',$slug)->inRandomOrder()->take(4)->get()->toArray();
       
       $viewed = Session::get('nb_r', []);
       //dd($data['id']);
       if( $data && intval($data->view_count)<=0){
           $data->update(['view_count'=>0]);
        }
       if (!in_array($data['id'], $viewed)) {
           $data->increment('view_count',1);
           Session::push('nb_r', $data['id']);
        }
    $data= $data->toArray();
    $menu="Réalisations";


     return Inertia::render('Web/Get-realisation',compact('data','datas','images','menu'));
   }
   public function GetGalerieImage($slug)
   {
       $data=GalerieImage::where('slug',$slug)->first();
       $images=[];
       $nb_images=30;
       if($data){
          $images= $data->Images()->latest()->Simplepaginate($nb_images);
          $images=$images->toArray();

       }
      
      

       $datas=GalerieImage::where('slug','!=',$slug)->inRandomOrder()->take(4)->get()->toArray();
       
       $viewed = Session::get('view_img', []);
       //dd($data['id']);
       if( $data && intval($data->view_count)<=0){
           $data->update(['view_count'=>0]);
        }
       if (!in_array($data['id'], $viewed)) {
          Session::push('view_img', $data['id']);
           $data->increment('view_count',1);
        }
    $data= $data->toArray();
    //$menu="Réalisations";


     return Inertia::render('Web/Get-galerie-image',compact('data','datas','images'));
   }
   public function Showservice($slug)
   {
       $data=Service::where('slug',$slug)->where('actif',true)->first();
       $datas=Service::where('slug','!=',$slug)->where('actif',true)->inRandomOrder()->take(9)->get()->toArray();
       $categories=CategorieService::where('actif',true)->where('slug','!=',$slug)->take(12)->get()->toArray();
       $viewed = Session::get('nb_r', []);
       //dd($data['id']);
       if( intval($data->view_count)<=0){ $data->update(['view_count'=>0]);}
       if (!in_array($data['id'], $viewed)) {
           $data->increment('view_count',1);
           Session::push('nb_r', $data['id']);
        }
    $data= $data->toArray();
     return Inertia::render('Web/GetService',compact('data','datas','categories'));
   }
   public function GetAllRealisations()
   {
    $datas=Realisation::latest()->with('user')->Simplepaginate(12)->toArray();
      /// dd($datas);
     return Inertia::render('Web/Realisations',compact('datas'));
   }
   public function GalerieImage()
   {
    $datas=GalerieImage::latest()->with('user')->Simplepaginate(12)->toArray();
      // dd($datas);
     return Inertia::render('Web/GalerieImages',compact('datas'));
   }
   public function CatService($slug)
   {
    $cat_service=CategorieService::where('slug',$slug)->first();//->toArray();
    $services=$cat_service->services;
    $serv=$cat_service->services;
    $services=null;
    if($serv){
        $services=$serv->toArray();
    }
    //dd($services);
    $cat_service=$cat_service->toArray();
    $autres_services=CategorieService::where('slug','!=',$slug)->take(4)->get()->toArray();
    //dd($cat_service);
     return Inertia::render('Web/CatServices',compact('cat_service','autres_services','services'));
   }
   public function Services(Request $request)
   {
       $n=12;
    $services=Service::where('actif',true)->with('categorie')->paginate($n)->toArray();
    $categories=CategorieService::where('actif',true)->get()->toArray();
    //dd($services);
    return Inertia::render('Web/Services',compact('services','categories'));
   }
   public function CommanderService(Request $request)
   {
       $pays=Pays::select('id','nom_fr_fr','nom_en_gb')->get()->toArray();
       $services=Service::get()->toArray();
       //dd($services);
     return Inertia::render('Web/Commander-service',compact('pays','services'));
   }
   protected function validateCommande($request){
       return Validator::make($request->all(), [

            'quantite' => ['integer','min:1','max:999'],
            'nom_auteur' => ['required','max:200'],
            'pays' => ['required','exists:pays,id'],
            'nom_commande' => ['required', 'min:5', 'max:250'],
            'tel' => ['nullable', 'min:8', 'regex:%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i','max:50'],
            'email' => ['min:4','email:rfc,dns', 'max:300'],
            'type' => ['required','exists:services,id'],
            'prix_min' =>['nullable', '', 'max:20'],
            'prix_max' =>['nullable', '', 'max:20'],
            'description' => ['required', 'min:5', 'max:2000'],
            'fichier' => ['nullable','file','mimes:pdf,docs,docx,doc,jpg,jpeg,png,webp,zip,rar'],
        ])->validate();

   }
   protected function validateStage($request){
       return Validator::make($request->all(), [

            'nom' => ['required','min:2','max:250'],
            'prenom' => ['required','min:2','max:200'],
            'lieu' => ['required','min:2','max:200'],
            'sexe' => ['required','in:F,M'],
            'domaine' => ['required', 'in:SECRETARIAT,DESIGN-COMMUNICATION,DEVELOPPEMENT-WEB,DEVELOPPEMENT-MOBILE'],
            'tel' => ['required', 'min:8', 'regex:%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i','max:50'],
            'email' => ['required','email:rfc', 'max:300'],
            'duree' =>['required', '', 'in:2,3,4,5,6'],
            'references' => ['required', 'min:5', 'max:2000'],
            'raisons' => ['required', 'min:5', 'max:2000'],
            'competences' => ['required', 'min:5', 'max:2000'],
            'fichier_cv' => ['required','file','mimes:pdf,docs,docx,doc,jpg,jpeg,png,zip,rar'],
            'fichier_motivation' => ['required','file','mimes:pdf,docs,docx,doc,jpg,jpeg,png,zip,rar'],
        ])->validate();

   }
   public function CommanderSend(Request $request)
   {
        //sleep(15);
        $req=$this->validateCommande($request);
        $uid = $request->user()?$request->user()->id:0;
        $code=$this->getStagiaireID(6);
        //dd($request->all());
        $data = [
            'auteur' => $request->input("nom_auteur"),
            'pays_id' => $request->input("pays"),
            'tel' => $request->input("tel"),
            'email' => $request->input("email"),
            'service_id' => $request->input("type"),
            'etat' => '1',
            'titre' => $request->input("nom_commande"),
            'prix_min' => $request->input("prix_min"),
            'quantite' => $request->input("quantite"),
            'prix_max' => $request->input("prix_max"),
            'content' => $request->input("description"),
            'code_commande' => $code,
            'type_content ' => 'TEXT',
            'user_id' => $uid,
            'actif' => true,
            //'delais' => $request->input("delais"),
            //'fichier' => $request->input("fichier"),
        ];
        //dd($data);
       /* protected $fillable = [
            'titre','prix_min','prix_max','delais','code_commande','type_content','content','etat','service_id','user_id','actif','email','tel','pays_id','auteur','fichier
        ];*/
        $Article=Commande::create($data);
        if($request->hasFile("fichier") && $Article){
            $aid=$Article->id?$Article->id:0;
            $file=$request->file("fichier");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "Commande_".$code."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/commandes/fichier/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['fichier'=>$img_data]);

        }
     $sms="Votre commande envoyée avec succès.<br><b>CODE DE LA COMMANDE : ".$code."</b><br> <small>Merci pour la confiance ! </small>";
     return redirect()->to('/')->with(['notification'=>$sms]);
   }

   public function validatePartenaire(Request $request){
        return Validator::make($request->all(), [

          'nom' => ['required','min:2','max:250'],
          'structure' => ['required','min:2','max:200'],
          'lieu' => ['required','min:2','max:200'],
          'details_accord' => ['required','min:2','max:2000'],
          'tel' => ['nullable', 'min:8', 'regex:%^(?:(?:\(?(?:00|\+)([1-4]\d\d|[1-9]\d?)\)?)?[\-\.\ \\\/]?)?((?:\(?\d{1,}\)?[\-\.\ \\\/]?){0,})(?:[\-\.\ \\\/]?(?:#|ext\.?|extension|x)[\-\.\ \\\/]?(\d+))?$%i','max:50'],
           'secteur' => ['required','min:2','max:200'],
          'email' => ['required','email:rfc', 'max:300'],
          'fichier_partenariat' => ['nullable','file','mimes:pdf,docs,docx,doc,xlsx'],
      ])->validate();
   }
   public function StatutCheck(Request $request){
      
    $requestData= Validator::make($request->all(), [
          'code' => ['required','min:4','max:8','exists:stagiaires,code'],
      ])->validate();
      
      $code=$request->input('code');
      $stagiaire=Stagiaire::where('code',$code)->first();
      if($stagiaire!=""){
        $sms="Demande de stage envoyée";
       return redirect()->back()->with(['success'=>$sms]);
        dd('s');
      }else{
        $sms="Aucune demande de stage ne correspond à votre code";
        $request->session()->flash('warning', $sms);
      }
      //dd($stagiaire);

   }
   public function SavePartenaire(Request $request)
   {
        //sleep(15);
        $req=$this->validatePartenaire($request);
        
        $uid = $request->user()?$request->user()->id:0;
        $code=strtoupper($this->generateRandomString(4));
       // 'fichier_partenariat'
        $data = [
            'nom' => $request->input("nom"),
            'structure' => $request->input("structure"),
            'lieu' => $request->input("lieu"),
            'email' => $request->input("email"),
            'tel' => $request->input("tel"),
            'details_accord' => $request->input("details_accord"),
            'secteur' => $request->input("secteur"),
            'code' => $code,
            'user_id' => $uid,
            'etat' => '1',
            //'delais' => $request->input("delais"),
            //'fichier' => $request->input("fichier"),
        ];
        //dd($data);
       /* protected $fillable = [
            'titre','prix_min','prix_max','delais','code_commande','type_content','content','etat','service_id','user_id','actif','email','tel','pays_id','auteur','fichier
        ];*/
        $Article=DemandePartenariat::create($data);
        if($request->hasFile("fichier_partenariat") && $Article){
            
          $aid=$Article->id?$Article->id:0;
            $file=$request->file("fichier_partenariat");
            $fileExt = $file->getClientOriginalExtension();
            $image_name = "Partenaire_".$code."_".rand(123456,999999). "." .$fileExt;
            $purl='storage/disk/partenariats/';
            $destination_path = public_path($purl);
            $file->move($destination_path, $image_name);
            $img_data=$purl."".$image_name;
            $Article->update(['fichier_partenariat'=>$img_data]);

        }
     $sms="Votre demande de partenariat a été envoyée avec succès.<br><b>CODE DE LA DEMANDE : ".$code."</b><br> <small>Merci pour la confiance ! </small>";
     return redirect()->to('/')->with(['notification'=>$sms]);
   }
   public function StageSend(Request $request)
   {
        //sleep(15);
        $req=$this->validateStage($request);
        
        $uid = $request->user()?$request->user()->id:0;
        $code=strtoupper($this->generateRandomString(6));
        $data = [
            'code' => $code,
            'nom' => $request->input("nom"),
            'prenom' => $request->input("prenom"),
            'lieu' => $request->input("lieu"),
            'sexe' => $request->input("sexe"),
            'email' => $request->input("email"),
            'tel' => $request->input("tel"),
            'domaine' => $request->input("domaine"),
            'duree_stage' => $request->input("duree"),
            'references_stage' => $request->input("references"),
            'raisons_stage' => $request->input("raisons"),
            'competences_stage' => $request->input("competences"),
            'user_id' => $uid,
            //'delais' => $request->input("delais"),
            //'fichier' => $request->input("fichier"),
        ];
        //dd($data);
       /* protected $fillable = [
            'titre','prix_min','prix_max','delais','code_commande','type_content','content','etat','service_id','user_id','actif','email','tel','pays_id','auteur','fichier
        ];*/
        if($request->hasFile("fichier_cv")){
          // $aid=$Article->id?$Article->id:0;
           $file=$request->file("fichier_cv");
           $fileExt = $file->getClientOriginalExtension();
           $image_name = "CV_".$code."_".time(). "." .$fileExt;
           $purl='storage/disk/stagiaires/cv/';
           $destination_path = public_path($purl);
           $file->move($destination_path, $image_name);
           $img_data=$purl."".$image_name;
           $data['cv']=$img_data;
       }
       
       if($request->hasFile("fichier_motivation")){
          // $aid=$Article->id?$Article->id:0;
           $file=$request->file("fichier_motivation");
           $fileExt = $file->getClientOriginalExtension();
           $image_name = "CV_".$code."_".time(). "." .$fileExt;
           $purl='storage/disk/stagiaires/lettres_motivation/';
           $destination_path = public_path($purl);
           $file->move($destination_path, $image_name);
           $img_data=$purl."".$image_name;
           $data['lettre_motivation']=$img_data;
       }
       $Stagiaire=Stagiaire::create($data);
       $sms="Votre demande de stage a été envoyée avec succès.<br><b>Votre code de vérification est : ".$code."</b><br> <small>Merci pour la confiance ! </small>";
      
       return redirect()->to('/')->with(['success'=>$sms]);
   }


    protected  function generateRandomString($length = 10) {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }
   public function getStagiaireID($nb=8){
        do{
          $v=strtoupper($this->generateRandomString($nb));
        }while($ts=Stagiaire::where('code',$n)->count()>0);
              
      return $v;
   }
   public function StatutStage(Request $request)
   {
     return Inertia::render('Web/Stage-statut');
   }
   public function S_Particuliers(Request $request)
   {
     return Inertia::render('Web/Services-particuliers');
   }
   public function Emplois(Request $request)
   {
     return Inertia::render('Web/Emplois');
   }
   public function S_Entreprises(Request $request)
   {
     return Inertia::render('Web/Services-entreprises');
   }
   public function S_Autres(Request $request)
   {
     return Inertia::render('Web/Autres-services');
   }
   public function Incubateur(Request $request)
   {
     return Inertia::render('Web/Autres-services');
   }
   public function Projets(Request $request)
   {
     return Inertia::render('Web/Projets');
   }
   public function Formations(Request $request)
   {
       $n=8;
       $data=null;
      // $data=Formation::where('etat',true)->paginate($n)->toArray();

        return Inertia::render('Web/Formations',compact('data'));
   }
   public function SoumettreProjet (Request $request)
   {
     return Inertia::render('Web/Formation');
   }
   public function Join (Request $request)
   {
     return Inertia::render('Web/Join');
   }
   public function Stage(Request $request)
   {
     return Inertia::render('Web/Stage');
   }
   public function DevenirPartenaire(Request $request)
   {
     return Inertia::render('Web/DevenirPartenaire');
   }
   public function Formation(Request $request)
   {
     return Inertia::render('Web/Formation');
   }
   public function AiforForFuture2022()
   {
     return Inertia::render('Web/Events/AiForFuture2022');
   }
   public function Contact(Request $request)
   {
     $data=['nom'=>"Wilfried"];
     $titre="Page contact";
    // dd($titre);
     return Inertia::render('Web/Contact',compact('data','titre'));
   }
   public function SaveContact(Request $request)
   {
    Validator::make($request->all(), [
        'nom' => ['required',"min:3",'max:150'],
        'objet' => ['required',"in:PRISE-DE-CONTACT,RENSEIGNEMENT,COMMANDE,PARTENAIRIAT,SOUTIENT"],
        'email' => ['required','email:rfc','max:185',],
        'message' => ['required','max:2000','min:10'],
        'tel' => ['max:30'],
        'notification' => ['required','in:0,1'],
    ])->validate();

    $c=strtoupper(Str::random(10));
    $data=[
        'nom'=>$request->input("nom"),
        'email'=>$request->input("email"),
        'tel'=>$request->input("tel"),
        'objet'=>$request->input("objet"),
        'message'=>$request->input("message"),
        'abonne'=>$request->input("notification"),
        'code'=>$c,
        'user_id'=>$request->user()?$request->user()->id:0,
        'actif'=>1
     ];
     //dd($data);
     $c=ContactMessage::create($data);
     if($c){
        $code=$c->code;
         $msg=[
             'message'=>"Votre message a été envoyé avec success",
             'code'=>$code,
            ];
        //return Inertia::render('Web/ContactSucess',compact('data','msg'));
        return redirect()->to(route('contact.success',['code'=>$code]))->with(['data'=>$data,'msg'=>$msg]);
     }

     return  redirect()->back();
   }
   public function SuccessContact()
   {
    return Inertia::render('Web/ContactSucess');
   }

   public function getArticleCat($n=10){
       return ArticleCategorie::where('active',true)->orderBy('nom')->take($n);
   }
   public function getAllCat($n=12){
       return ArticleCategorie::where('active',true)->with('articles')->orderBy('nom')->paginate($n)->toArray();
   }
   public function Blog(Request $request)
   {
     $n=12;
     $datas=Article::latest()->with('categories')->with('image')->with('user')->orderBy('created_at','DESC')->paginate($n)->toArray();
     $categories = ArticleCategorie::with('articles')->take(8)->get()->toArray();
     $article = Article::latest()->with('image')->with('tags')->with('categories');//

     if($article->first()){$article=$article->first()->toArray();}else{$article=null;}
    $cat=[];
     //dd($datas['data']);
     /*$tab=$datas['data'];
    foreach($tab as $s){
       print_r($s['image']);
       echo "<br>";
    }
    dd($datas);*/
     return Inertia::render('Web/Blog/Index',compact('datas','article','categories','cat'));
   }
   public function Team(Request $request)
   {
    $datas=Membre::where('actif',true)->orderBy('ordre','ASC')->simplepaginate(24)->toArray();
    //dd($datas);
    $activites=Activite::latest()->where('actif',true)->orderBy('img')->take(10)->get()->toArray();//->where('actif',true)
    //dd($activites);
     return Inertia::render('Web/Team',compact('datas','activites'));
   }
   public function MembreTeam($id)
   {
    $data=Membre::where('actif',true)->where('id',$id)->first()->toArray();

     return Inertia::render('Web/MembreTeam',compact('data',));
   }
   public function Events(Request $request)
   {

    $datas=Evenement::where('actif',true)->simplepaginate(12)->toArray();
    //dd($datas);
     return Inertia::render('Web/Events',compact('datas'));
   }
   public function Help(Request $request)
   {
     return Inertia::render('Web/Help');
   }
   public function Faq(Request $request)
   {
     return Inertia::render('Web/Faq');
   }
   public function MesCommandes(Request $request)
   {
     return Inertia::render('Web/Mescommandes');
   }
   public function Ressources(Request $request)
   {
       $n=12;
    $datas=Ressource::where('actif',true)->paginate($n)->toArray();
     return Inertia::render('Web/Ressources',compact('datas'));
   }
   public function GetRessource($slug)
   {

    $n=12;
    $data=Ressource::where('actif',true)->where('slug',$slug)->first()->toArray();
    $datas=Ressource::where('actif',true)->where('slug',"!=",$slug)->inRandomOrder()->take($n)->toArray();
    //dd($datas);
     return Inertia::render('Web/GetRessource',compact('data','datas'));
   }
   public function Apropos(Request $request)
   {
     return Inertia::render('Web/Apropos');
   }
   public function Programmes(Request $request)
   {
       //$data=Programme::
        $n=4;
        $datas=Programme::where('actif',true)->Simplepaginate($n)->toArray();
        return Inertia::render('Web/Programmes',compact('datas'));
   }
   public function GetProgramme($slug)
   {
        $data=Programme::where('actif',true)->where('slug',$slug)->first()->toArray();
        $datas = Programme::where('actif',true)->inRandomOrder()->where('slug','!=',$slug)->take(8)->get()->toArray();
        //dd($datas);
        return Inertia::render('Web/GetProgramme',compact('data','datas'));
   }
   public function Startups(Request $request)
   {
     return Inertia::render('Web/Startups');
   }
   public function Boutique(Request $request)
   {

     return Inertia::render('Web/Boutique/Index');
   }
   public function CatShow ($url)
   {
       $nb=16;
       $n=8;
   // $categories = ArticleCategorie::where('active',true)->with('articles')->take($n)->get()->toArray();
   $cat = ArticleCategorie::where('active',true)->where('slug',$url)->first();//->toArray();
   $datas =null;
   if($cat){
        $categories = ArticleCategorie::where('id','!=',$cat->id)->with('articles')->take(8)->get()->toArray();
        $datas = Article::latest()->where('actif',true)->with('image')->with('categories')->where('categorie_id',$cat->id)->paginate($nb)->toArray();
    }else{
        $categories = ArticleCategorie::where('slug','!=',$url)->with('articles')->take(8)->get()->toArray();
        abort(404);
    }
    $cat=($cat)?$cat->toArray():null;

    //dd($datas);
    //dd($url);
     return Inertia::render('Web/Blog/CatShow',compact('datas','categories','cat','url'));
   }
   public function CatsShow (Request $request)
   {
        //$categories = $this->getArticleCat();
        $categories = ArticleCategorie::where('active',true)->orderBy('nom')->take(8)->get()->toArray();
        $datas = $this->getAllCat(16);
        return Inertia::render('Web/Blog/CatsShow',compact('datas','categories'));
   }
   public function Post(Request $request)
   {
     $p=new Post(["titre"=>"jj","contenu"=>'jzdjzd']);
    // dd($p);
     return Inertia::render('Post/Show');
   }

   public function SavePost(Request $request)
   {
     return Inertia::render('Web/Apropos');
   }
   public function ArticleShow($slug,Request $request)
   {
       $article = Article::with('image')->with('tags')->with('categories')->with('user')->where('slug',$slug)->first();//->toArray();
       $nextArticle = $article->where('id','>',$article->id)->first();
       ///dd($nextArticle);
       $cat=[];
       if($article){
           $cat=$article->categories->toArray();
       }
       //dd($cat);
       $next=null;
       if($nextArticle){
        $next=$nextArticle->toArray();
       }
       if($article){
           $categories = ArticleCategorie::where('id','>=',$article->id)->take(8)->get()->toArray();
       }else{
           $categories = ArticleCategorie::take(8)->get()->toArray();
       }
       if(!$article){
           abort(404);
        }
       //Incrémentation du nombre de vues
       $viewed = Session::get('nb_art_vues', []);
       if (!in_array($article->id, $viewed)) {
           //ArticlesViews::createViewLog($article,$request);
           $article->increment('view_count',1);
           Session::push('nb_art_vues', $article->id);
        }
        $commentaires = ArticleCommentaire::where('article_id',$article->id)->latest()->with('user')->get()->toArray();
        $article=$article->toArray();

        //dd($commentaires);
       //dd($article);
     return Inertia::render('Web/Blog/ShowArticle',compact('article','next','categories','commentaires','cat'));
   }
}
