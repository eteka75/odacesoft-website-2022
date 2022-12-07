<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Email;
use Inertia\Inertia;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;

class EmailController extends Controller
{
    protected $user;
    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "eml");
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
        $datas = Email::orderBy('created_at', 'DESC')->paginate($n)->toArray();
        //dd($datas);
        return inertia('Dashboard/Emails/Index',compact('datas'));
    }

    /**
     * Display a create form of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return inertia('Dashboard/Emails/Create');
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


        $uid = $request->user()->id;
        $fermer=$request->input("active")==0?true:false;

        Inertia::share('fermer', $fermer);

        $data = [
            'objet' => $request->input("objet"),
            'expediteur' => $request->input("exp"),
            'destinataire' => $request->input("dest"),
            'cci' => $request->input("cci"),
            'avec_fichier' => false,
            'message' => $request->input("message"),
            'user_id' => $uid,
            'actif' => 1,
        ];
       // dd($fermer);
        $Article=Email::create($data);
        if($Article){

            if($fermer==1){
                return redirect()->back()->with('success','Email sauvegardé avec succèss.');
            }else{
            return redirect()->to(route('email.index'))->with('success','Email sauvegardé avec succèss.');
            }
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
        $data=Email::where('id',$id)->first();

        if(!$data) {abort(404);}
        $data=$data->toArray();
        return inertia('Dashboard/Emails/Show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data=Email::where('id',$id)->first();

        if(!$data) {abort(404);}
        $data=$data->toArray();
        $edit=true;
        return inertia('Dashboard/Emails/Create', compact('data','edit'));
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

            'objet' => ['required', 'min:5', 'max:250'],
            'dest' => ['required', 'min:5', 'max:250'],
            'cci' => [ 'max:250'],
            'message' => ['min:10', 'max:500000'],
            'active' => ['in:0,1']

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

        $Article=Email::where('id',$id)->first();
        if(!$Article){
            return back()->with('error', "Cet article n'existe pas ou a été supprimé.");
        }
        $this->validateForm($request);
        //dd($request->all());

        $fermer=$request->input("active")==true?1:0;

        $data = [
            'objet' => $request->input("objet"),
            'expediteur' => $request->input("exp"),
            'destinataire' => $request->input("dest"),
            'cci' => $request->input("cci"),
            'avec_fichier' => false,
            'message' => $request->input("message"),
            'actif' => 1,
        ];
       // dd($d);
        $Article=$Article->update($data);
        if($Article){

            if($fermer==1){
                return redirect()->back()->with('success','Email sauvegardé avec succèss.');
            }else{
            return redirect()->to(route('email.index'))->with('success', 'Email mise à jour avec succèss.');
            }
        }else{
            return redirect()->back()->with('success', 'Email mise à jour avec succèss.');
        }


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
             $a=Email::find($request->input('id'));
             if($a){

                $a->delete();
                return redirect()->back()->with('message', 'Email supprimé avec succèss.');;
             }else{
                 return redirect()->back() ->with('error', 'Une erreur est survenue lors de la suppression.');;
             }
         }
    }
}
