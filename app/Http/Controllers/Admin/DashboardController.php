<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Commande;
use App\Models\ContactMessage;
use App\Models\DemandePartenariat;
use Inertia\Inertia;

class DashboardController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
            Inertia::share('menu', "tb");
            Inertia::share('hmenu', "Tb");
    }
    public function Admin(){
        return redirect('dashboard');
    }
    public function Index(){
        $nb_commandes=Commande::count();
        $nb_messages=ContactMessage::count();
        $nb_d_partenariats=DemandePartenariat::count();
        return inertia('Dashboard/Index',compact('nb_commandes','nb_messages','nb_d_partenariats'));
    }
}
