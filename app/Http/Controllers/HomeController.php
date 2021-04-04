<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('shop.clients.index');
    }

    public function indexClient(){

        $taureaux = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->where('vente_bovins.enLigne', 'en ligne')
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $vaches = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->where('vente_bovins.enLigne', 'en ligne')
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $genisses = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->where('vente_bovins.enLigne', 'en ligne')
        ->join('genisses', 'genisses.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $veaux = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->where('vente_bovins.enLigne', 'en ligne')
        ->join('veaus', 'veaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $velles = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->where('vente_bovins.enLigne', 'en ligne')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $bouteilles = DB::table('vente_laits')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
        // ->join('commandes', 'commandes.idCom','=','vente_laits.commande_id')
        ->where('vente_laits.enLigne', 'en ligne')
        ->select('*')
        ->get();


        return view('shop.clients.index',compact('taureaux','vaches','genisses','veaux','velles','bouteilles'));
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        return view('adminHome');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function fermierHome()
    {
        return view('fermierHome');
    }
}
