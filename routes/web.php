<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PersonnelController;
use App\Http\Controllers\VacheController;
use App\Http\Controllers\BovinsController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AutreDepensesController;
use App\Http\Controllers\VachesController;
use App\Http\Controllers\GenisseController;
use App\Http\Controllers\AlimentationDuJourController;
use App\Http\Controllers\MaladieController;
use App\Http\Controllers\TraiteController;
use App\Http\Controllers\TaureauController;
use App\Http\Controllers\VeauController;
use App\Http\Controllers\VelleController;
use App\Http\Controllers\AchatAlimentController;
use App\Http\Controllers\RaceController;
use App\Http\Controllers\PesageController;
use App\Http\Controllers\DiagnosticController;
use App\Http\Controllers\DiagnosticFermierController;
use App\Http\Controllers\AchatGenisseController;
use App\Http\Controllers\AchatVacheController;
use App\Http\Controllers\AchatTaureauController;
use App\Http\Controllers\AchatVeauController;
use App\Http\Controllers\AchatVelleController;
use App\Http\Controllers\AchatBovinController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\StockAlimentController;
use App\Http\Controllers\VenteBovinController;
use App\Http\Controllers\BouteilleController;
use App\Http\Controllers\StockLaitController;
use App\Http\Controllers\VenteLaitController;

// use App\Http\Controllers\AdminController;
// use App\Http\Controllers\Admin\LoginController;



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

// Route::get('/', function () {
//     return view('accueil');
// });
Route::get('/', [App\Http\Controllers\Shop\MainController::class, 'index'])->name('accueil');

Route::get('/shop/clients', [App\Http\Controllers\Shop\MainController::class, 'indexClient'])->name('accueil_client');

/* Voir un produit spécifique coté visiteur */
Route::get('/produitvache/{idVache}', [App\Http\Controllers\Shop\MainController::class, 'produitVache'])->name('voir_produit_vache');
Route::get('/produittaureau/{idTaureau}', [App\Http\Controllers\Shop\MainController::class, 'produitTaureau'])->name('voir_produit_taureau');
Route::get('/produitgenisse/{idGenisse}', [App\Http\Controllers\Shop\MainController::class, 'produitGenisse'])->name('voir_produit_genisse');
Route::get('/produitveau/{idVeau}', [App\Http\Controllers\Shop\MainController::class, 'produitVeau'])->name('voir_produit_veau');
Route::get('/produitvelle/{idVelle}', [App\Http\Controllers\Shop\MainController::class, 'produitVelle'])->name('voir_produit_velle');
Route::get('/produitlait/{idLait}', [App\Http\Controllers\Shop\MainController::class, 'produitLait'])->name('voir_produit_lait');

// Route::get('/categorie/{idCategorie}', [App\Http\Controllers\Shop\MainController::class, 'viewByCatery'])->name('categorie');

/* Partie panier Visiteur*/
Route::post('/panier/add/{idV}', [App\Http\Controllers\Shop\CartController::class, 'add'])->name('cart_add');
Route::post('/produittaureau/add/{idT}', [App\Http\Controllers\Shop\CartController::class, 'addTaureau'])->name('cart_add_T');
Route::post('/produitgenisse/add/{idG}', [App\Http\Controllers\Shop\CartController::class, 'addGenisse'])->name('cart_add_G');
Route::post('/produitveau/add/{idVea}', [App\Http\Controllers\Shop\CartController::class, 'addVeau'])->name('cart_add_Vea');
Route::post('/produitvelle/add/{idVel}', [App\Http\Controllers\Shop\CartController::class, 'addVelle'])->name('cart_add_Vel');
Route::post('/produitlait/add/{idB}', [App\Http\Controllers\Shop\CartController::class, 'addBouteille'])->name('cart_add_B');

/* supprimer dans le panier */
Route::get('/cart/remove/{idr}', [App\Http\Controllers\Shop\CartController::class, 'destroy']);

/* modifier dans le panier */
Route::post('/cart/update/{idu}', [App\Http\Controllers\Shop\CartController::class, 'update']);

Route::get('/panier_index', [App\Http\Controllers\Shop\CartController::class, 'index'])->name('cart_index');

/* Voir un produit spécifique coté client */
Route::get('/produitva/{idVache}', [App\Http\Controllers\Shop\MainController::class, 'produitVacheClient'])->name('voir_produit_vache_client');
Route::get('/produittau/{idTaureau}', [App\Http\Controllers\Shop\MainController::class, 'produitTaureauClient'])->name('voir_produit_taureau_client');
Route::get('/produitgen/{idGenisse}', [App\Http\Controllers\Shop\MainController::class, 'produitGenisseClient'])->name('voir_produit_genisse_client');
Route::get('/produitvea/{idVeau}', [App\Http\Controllers\Shop\MainController::class, 'produitVeauClient'])->name('voir_produit_veau_client');
Route::get('/produitvel/{idVelle}', [App\Http\Controllers\Shop\MainController::class, 'produitVelleClient'])->name('voir_produit_velle_client');
Route::get('/produitla/{idLait}', [App\Http\Controllers\Shop\MainController::class, 'produitLaitClient'])->name('voir_produit_lait_client');

/* Partie panier Client*/
Route::post('/panier_client/add/{idV}', [App\Http\Controllers\Shop\CartController::class, 'addVacheClient'])->name('cart_add_V_client');
Route::post('/produittaureau_client/add/{idT}', [App\Http\Controllers\Shop\CartController::class, 'addTaureauClient'])->name('cart_add_T_client');
Route::post('/produitgenisse_client/add/{idG}', [App\Http\Controllers\Shop\CartController::class, 'addGenisseClient'])->name('cart_add_G_client');
Route::post('/produitveau_client/add/{idVea}', [App\Http\Controllers\Shop\CartController::class, 'addVeauClient'])->name('cart_add_Vea_client');
Route::post('/produitvelle_client/add/{idVel}', [App\Http\Controllers\Shop\CartController::class, 'addVelleClient'])->name('cart_add_Vel_client');
Route::post('/produitlait_client/add/{idB}', [App\Http\Controllers\Shop\CartController::class, 'addBouteilleClient'])->name('cart_add_B_client');

Route::get('/panier_index_client', [App\Http\Controllers\Shop\CartController::class, 'indexClient'])->name('cart_index_client');

Route::get('/commande_client', [App\Http\Controllers\Shop\CartController::class, 'indexCommande'])->name('ma_commande');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'indexClient'])->name('home');

// route pour la recherche des bovins
Route::get('/find',[SearchController::class, 'find'])->name('web.find');

// route pour la recherche des achats de bovins
Route::get('/find_achat',[SearchController::class, 'find_achat'])->name('web.find_achat');

// route pour la recherche des achats de bovins
Route::get('/find_vache',[SearchController::class, 'search1'])->name('web.search1');

// route pour la liste des bovins
Route::get('/bovins',[BovinsController::class, 'index'])->name('bovins');

// route pour la liste des achats des bovins
Route::get('/achatbovins',[AchatBovinController::class, 'index'])->name('achatbovins');

// route pour les personnels
Route::resource('employee', EmployeeController::class);

// route pour les clients
Route::resource('clients', ClientController::class);

// route pour les autres dépenses
Route::resource('autresdepenses', AutreDepensesController::class);

// route pour les vaches 
Route::resource('vache', VachesController::class);

// route de l'alimentation du jour
Route::resource('alimentationjour', AlimentationDuJourController::class);

// route pour les maladies
Route::resource('maladies', MaladieController::class);

// route pour les génisses
Route::resource('genisses', GenisseController::class);

// route pour les traites
Route::resource('traites', TraiteController::class);

// route pour les vaches
Route::resource('vaches', VachesController::class);

// route pour les taureaux
Route::resource('taureaux', TaureauController::class);

// route pour les veaux
Route::resource('veaux', VeauController::class);

// route pour les velles
Route::resource('velles', VelleController::class);

// route pour les achat_aliments
Route::resource('achataliments', AchatAlimentController::class);

// route pour les achat_aliments
Route::resource('races', RaceController::class);

// route pour les pesages
Route::resource('pesages', PesageController::class);

// route pour les diagnostics
Route::resource('diagnostics', DiagnosticController::class);

// route pour le diagnostic des fermiers
Route::resource('diagnosticfermiers', DiagnosticFermierController::class);

// route pour l'Achat de Genisse
Route::resource('achatgenisses', AchatGenisseController::class);

// route pour l'Achat de Vache
Route::resource('achatvaches', AchatVacheController::class);

// route pour l'Achat de Taureau
Route::resource('achattaureaux', AchatTaureauController::class);

// route pour l'Achat de Veau
Route::resource('achatveaux', AchatVeauController::class);

// route pour l'Achat de Velle
Route::resource('achatvelles', AchatVelleController::class);

// route pour le stock d'Aliment
Route::resource('stocks', StockAlimentController::class);

// route pour les ventes de bovins 
Route::resource('ventebovins', VenteBovinController::class);

// route pour les ventes de Laits 
Route::resource('ventelaits', VenteLaitController::class);

// route pour les bouteilles de laits 
Route::resource('bouteilles', BouteilleController::class);

// route pour les Stocks de laits 
Route::resource('stocklaits', StockLaitController::class);

Route::view('/liste_produits','/liste_produits')->name('liste_produits');

// Route::view('/achatBovin', 'dashboard_admin/AchatsEtDepenses/achatBovin')->name('achatBovin');
Route::view('/achatAliment', 'dashboard_admin/AchatsEtDepenses/achatAliment')->name('achatAliment');
Route::view('/service', 'dashboard_admin/AchatsEtDepenses/service')->name('service');

/* Pour les admins 

Route::group(['prefix' => 'admin'],function(){

    Route::get('', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
    Route::post('', 'App\Http\Controllers\Admin\LoginController@login');
    Route::get('/home', 'App\Http\Controllers\AdminController@index');

});
*/

// Route::view('alimentation','espace_fermier.alimentation')->name('alimentation');
// Route::view('traite','espace_fermier.traite')->name('traite');
// Route::view('pesage','espace_fermier.pesage')->name('pesage');


Route::view('profile','profil_utilisateur')->name('profile');

/* Pour les fermiers 
Route::group(['prefix' => 'fermier'], function(){
    
    Route::get('', 'App\Http\Controllers\Fermier\LoginController@showLoginForm')->name('fermier.login');
    Route::post('', 'App\Http\Controllers\Fermier\LoginController@login');
    Route::get('/home', 'App\Http\Controllers\FermierController@index');

});
*/
Route::get('admin/home', [App\Http\Controllers\HomeController::class, 'adminHome'])->name('admin.home')->middleware('est_admin');
Route::get('fermier/home', [App\Http\Controllers\HomeController::class, 'fermierHome'])->name('fermier.home')->middleware('est_fermier');


/** Aly Ka Service */

//Bovin
Route::view('taureau','pagesBovin.taureau');
Route::view('vache','pagesBovin.vache');
Route::view('veau','pagesBovin.veau');
Route::view('velle','pagesBovin.velle');
Route::view('genisse','pagesBovin.genisse');

//shop
Route::view('achat','shop.achat')->name('achat');
Route::view('panier','shop.panier')->name('panier');

//visiteur
Route::view('panier_visiteur','visiteur.panier_visiteur')->name('panierVisiteur');
Route::view('achat_visiteur','visiteur.achat_visiteur')->name('achatVisiteur');


//client
Route::view('commander','client.commander')->name('commander');
Route::view('promotion','client.promotion')->name('promotion');
Route::view('compte','client.compte')->name('compte');
Route::view('historique','client.historique')->name('historique');

Route::view('dashboardClient1','client/.dashboardClient1')->name('dashboardClient1');
Route::view('dashboardClient2','client/.dashboardClient2')->name('dashboardClient2');

// ajout produit de l'admin
Route::view('/ajout_produit','ajout_produit')->name('ajoutProduit');
Route::view('/commande','commande')->name('commande');



