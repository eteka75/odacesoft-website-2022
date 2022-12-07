<?php

use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\ArticleCategorieController;
use App\Http\Controllers\Admin\TagController;
use App\Http\Controllers\Admin\ArticleCommentaireController;
use App\Http\Controllers\Admin\StatController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ArticleMediaController;
use App\Http\Controllers\Admin\WebpageController;
use App\Http\Controllers\Admin\RessourcesController;
use App\Http\Controllers\Admin\EmailController;
use App\Http\Controllers\Admin\ActiviteController;
use App\Http\Controllers\Admin\SlideController;
use App\Http\Controllers\Admin\CommandeController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\CategorieServiceController;
use App\Http\Controllers\Admin\RealisationImageController;
use App\Http\Controllers\Admin\EvenementController;
use App\Http\Controllers\Admin\PartenaireController;
use App\Http\Controllers\Admin\MembreController;
use App\Http\Controllers\Admin\ContactMessageController;
use App\Http\Controllers\Admin\ProjetController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\RealisationController;
use App\Http\Controllers\Admin\AdherantController;
use App\Http\Controllers\Admin\ProgrammeController;
use App\Http\Controllers\Admin\ParametreSiteWebController;
use App\Http\Controllers\Admin\GalerieImageController;
use App\Http\Controllers\Admin\StagiaireController;
use App\Http\Controllers\Admin\GImageController;
use Illuminate\Support\Facades\Artisan;
use Inertia\Inertia;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
/*

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});*/
#dd(app());
Route::get('/clear', function () {
    Artisan::call('view:clear');
    //DemandePartenariatControllerArtisan::call('view:cache');
    Artisan::call('cache:clear');
    Artisan::call('route:clear');
    Artisan::call('config:clear');
    return 'All datas (View,Cache,Route,onfig) cleared';
});
Route::get('/clear1', function () {
    Artisan::call('view:cache');
    Artisan::call('route:cache');
    Artisan::call('config:cache');
    return 'All datas (View,Cache,Route,onfig) cached';
});
 //Clear route cache:
 Route::get('/cache-route', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cached ';
});
 Route::get('/cache-view', function() {
    $exitCode = Artisan::call('view:cache');
    return 'Views cached';
});
 Route::get('/cache-route', function() {
    $exitCode = Artisan::call('route:cache');
    return 'Routes cached';
});
 Route::get('/cache-config', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Routes cached';
});

//Clear config cache:
Route::get('/clear-config', function() {
    $exitCode = Artisan::call('config:cache');
    return 'Config cache cleared';
});

// Clear application cache:
Route::get('/clear-cache', function() {
    $exitCode = Artisan::call('cache:clear');
    return 'Application cache cleared';
});
// Clear application cache:
Route::get('/cache', function() {
    $exitCode = Artisan::call('config:cache');
    $exitCode = Artisan::call('view:cache');
    $exitCode = Artisan::call('route:cache');
    return 'Config cache';
});

// Clear view cache:
Route::get('/clear-view', function() {
    $exitCode = Artisan::call('view:clear');
    return 'Vievs cleared';
});

// Clear view cache:
Route::get('/clear-route', function() {
    $exitCode = Artisan::call('route:clear');
    return 'Route cleared';
});
#A Propos de Odacesoft
Route::get('/',[PageController::class,'Accueil'])->name('accueil');
Route::get('/ai-for-future/appel-a-communication-2022',[PageController::class,'AiforForFuture2022'])->name('accueil');
Route::get('/test',[PageController::class,'Test'])->name('test');
#Route::get('/terms',[PageController::class,'Accueil'])->name('terms.show');
#Route::get('/policy',[PageController::class,'Accueil'])->name('policy.show');
Route::get('/join',[PageController::class,'Join'])->name('join');
Route::get('/nous-rejoindre',[PageController::class,'Join'])->name('nous-rejoindre');
Route::get('/nous-rejoindre/demande-de-stage',[PageController::class,'Stage'])->name('demande-stage');
Route::get('/stage/statut',[PageController::class,'StatutStage'])->name('stage.statut');
Route::post('/stage/statut',[PageController::class,'StatutCheck'])->name('stage.checkstatut');
Route::get('/nous-rejoindre/devenir-partenaire',[PageController::class,'DevenirPartenaire'])->name('devenir-partenaire');
Route::post('/nous-rejoindre/devenir-partenaire',[PageController::class,'SavePartenaire'])->name('save-partenaire');
Route::get('/nous-rejoindre/travailler-chez-nous',[PageController::class,'Travailler'])->name('travailler-chez-nous');
Route::get('/commander/service',[PageController::class,'CommanderService'])->name('commander.service');
Route::post('/commander/service',[PageController::class,'CommanderSend'])->name('commande.send');
Route::post('/nous-rejoindre/demande-de-stage',[PageController::class,'StageSend'])->name('stage.send');
Route::get('/partenaires',[PageController::class,'Partenaires'])->name('partenaires');
Route::get('/startups',[PageController::class,'Startups'])->name('startups');
Route::get('/soumetre-projet',[PageController::class,'SoumettreProjet'])->name('soumetre-projet');
Route::get('/programmes',[PageController::class,'Programmes'])->name('programmes');
Route::get('/projets',[PageController::class,'Programmes'])->name('projets');
//Route::get('/projets',[PageController::class,'Projets'])->name('projets');
Route::get('/emplois',[PageController::class,'Emplois'])->name('emplois');
Route::get('/emplois',[PageController::class,'Emplois'])->name('emplois');
Route::get('/startups',[PageController::class,'Startups'])->name('startups');
Route::get('/boutique',[PageController::class,'Boutique'])->name('boutique');
Route::get('/a-propos-de-{slug}',[PageController::class,'Aproposde'])->name('apropos-de');
#Nos activités
Route::get('/activites',[PageController::class,'Activites'])->name('activites');
Route::get('/activite/{slug}',[PageController::class,'Activite'])->name('activite');
#R&alisations
Route::get('/realisation/{slug}',[PageController::class,'GetRealisation'])->name('la-realisation');
Route::get('/realisations',[PageController::class,'GetAllRealisations'])->name('realisations');
#Services
Route::get('/service/categorie/{slug}',[PageController::class,'CatService'])->name('cat-service');
Route::get('/services',[PageController::class,'services'])->name('services');
Route::get('/services/pour-les-particuliers',[PageController::class,'S_Particuliers'])->name('s-particuliers');
Route::get('/services/pour-les-entreprises',[PageController::class,'S_Entreprises'])->name('s-entreprises');
Route::get('/services/autres-services',[PageController::class,'S_Autres'])->name('autres-services');
Route::get('/services/incubateur',[PageController::class,'Incubateur'])->name('incubateur');
Route::get('/services/incubateurs',[PageController::class,'Incubateur'])->name('incubateurs');
Route::get('/services/autres',[PageController::class,'S_Autres'])->name('s-autres');
Route::get('/service/{slug}',[PageController::class,'Showservice'])->name('cat-service.show');
#Galerie Photos Vidéos
    Route::get('/galerie-images',[PageController::class,'GalerieImage'])->name('galerie.images');
Route::get('/galerie-image/{slug}',[PageController::class,'GetGalerieImage'])->name('galerie.image');
Route::get('/galerie/videos',[PageController::class,'GalerieVideo'])->name('galerie.videos');
#Route::get('/projets',[PageController::class,'Projets'])->name('projets');
#Nous contacter
Route::get('/contact',[PageController::class,'Contact'])->name('contact');
Route::post('/contact',[PageController::class,'SaveContact'])->name('contacter');
Route::get('/contact/success',[PageController::class,'SuccessContact'])->name('contact.success');
#Le Blog
Route::get('/blog',[PageController::class,'Blog'])->name('blog');
Route::get('/blog/categories/',[PageController::class,'CatsShow'])->name('blog.cats.show');
Route::get('/blog/{url}',[PageController::class,'ArticleShow'])->name('blog.article.show');
Route::get('/blog/tag/{url}',[PageController::class,'TagShow'])->name('blog.tag.show');
Route::get('/blog/categorie/{url}',[PageController::class,'CatShow'])->name('blog.cat.show');
Route::get('/blog/tags',[PageController::class,'TagsShow'])->name('blog.tags.show');
Route::get('/join/{group}',[PageController::class,'Join'])->name('join');

Route::get('/team',[PageController::class,'Team'])->name('team');
Route::get('/team/membre-{id}',[PageController::class,'MembreTeam'])->name('membre-team');
Route::get('/evenements',[PageController::class,'Events'])->name('events');
Route::get('/formations',[PageController::class,'Formations'])->name('formations');
Route::get('/a-propos',[PageController::class,'Apropos'])->name('apropos');
Route::get('/help',[PageController::class,'Help'])->name('help');
Route::get('/faq',[PageController::class,'Faq'])->name('faq');
Route::get('/ressources',[PageController::class,'Ressources'])->name('ressources');
Route::get('/ressource/{slug}',[PageController::class,'GetRessource'])->name('get-ressource');
Route::get('/programme/{slug}',[PageController::class,'GetProgramme'])->name('get-programme');
Route::get('/projet/{slug}',[PageController::class,'GetProgramme'])->name('get-projet');
Route::get('/mes-commandes',[PageController::class,'MesCommandes'])->name('mescommandes');
Route::resource('posts', PostController::class);

Route::get('/admin',[DashboardController::class,'Admin'])->name('admin');
Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');

//Route::get('/',[PageController::class,'MesCommandes'])->name('mescommandes');
Route::middleware(['auth:sanctum', 'verified'])->prefix('dashboard')->group(function () {
    Route::get('/', [DashboardController::class,'Index'])->name('dashboard');
    Route::resource('/article', ArticleController::class);
    Route::resource('/categorie-article', ArticleCategorieController::class);
    Route::resource('/tags', TagController::class);
    //Route::resource('/team', TeamController::class);
    Route::resource('/commentaire', ArticleCommentaireController::class);
    Route::resource('/media', ArticleMediaController::class);
    Route::resource('/statistique', StatController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/page', WebpageController::class);
    Route::resource('/ressource', RessourcesController::class);
    Route::resource('/email', EmailController::class);
    Route::resource('/programme', ProgrammeController::class);

    Route::resource('/activite', ActiviteController::class);
    //Route::resource('/statistique', StatistiqueController::class);
    Route::resource('/evenement', EvenementController::class);
    Route::resource('/commande', CommandeController::class);
    Route::resource('/service', ServiceController::class);
    Route::resource('/categorie-service', CategorieServiceController::class);
    Route::resource('/message', ContactMessageController::class);
    Route::resource('/membre', MembreController::class);
    Route::resource('/adherant', AdherantController::class);
    Route::resource('/partenaire', PartenaireController::class);
    Route::resource('/demande-partenariat', DemandePartenariatController::class);
    Route::resource('/projet', ProjetController::class);
    Route::resource('/realisation', RealisationController::class);
    Route::resource('/realisation-image', RealisationImageController::class);
    Route::resource('/faq', FaqController::class);
    Route::resource('/parametres', ParametreSiteWebController::class);
    Route::resource('/stagiaire', StagiaireController::class);
    Route::resource('/slide', SlideController::class);
    Route::resource('/galerie-image', GalerieImageController::class);
    Route::resource('/gimage', GImageController::class);
    //Route::ressources('/page', DashboardController::class)->name('page');
    //Route::ressources('/news', DashboardController::class)->name('news');
});
