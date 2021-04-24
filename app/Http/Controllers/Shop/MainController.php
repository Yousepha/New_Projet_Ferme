<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Bouteille;
use App\Models\Taureau;
use App\Models\VenteBovin;
use DB;

class MainController extends Controller
{
    /* Debut de code pour visiteur*/
    public function index(){

        $taureaux = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $vaches = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $genisses = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('genisses', 'genisses.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $veaux = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('veaus', 'veaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $velles = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $bouteilles = DB::table('vente_laits')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
        ->select('*')
        ->get();


        return view('shop.index',compact('taureaux','vaches','genisses','veaux','velles','bouteilles'));
    }

    public function produitVache(Request $request){        

        $vaches =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVache");
        
        return view("shop.produits.vache", compact('vaches'));
    }

    public function produitTaureau(Request $request){
        
        $taureaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idTaureau");

        return view("shop.produits.taureau", compact('taureaux'));
    }

    public function produitGenisse(Request $request){
        
        $genisses =DB::select("SELECT * from bovins where bovins.idBovin = $request->idGenisse");

        return view("shop.produits.genisse", compact('genisses'));
    }

    public function produitVeau(Request $request){
        
        $veaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVeau");

        return view("shop.produits.veau", compact('veaux'));
    }

    public function produitVelle(Request $request){
        
        $velles =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVelle");

        return view("shop.produits.velle", compact('velles'));
    }

    public function produitLait(Request $request){
        
        $bouteilles = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $request->idLait");

        return view("shop.produits.lait", compact('bouteilles'));
    }
    /* fin code visiteur */


    /* Debut de code pour Client*/
    public function indexClient(){

        $taureaux = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->limit(3)
        ->get();

        $vaches = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->select('*')
        ->limit(3)
        ->get();

        $genisses = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('genisses', 'genisses.idBovin','=','bovins.idBovin')
        ->select('*')
        ->limit(3)
        ->get();

        $veaux = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('veaus', 'veaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $velles = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->limit(3)
        ->get();

        $bouteilles = DB::table('bouteilles')
        ->where('prix', '!=', 'NULL')
        ->select('*')
        ->limit(3)
        ->get();


        return view('shop.clients.index',compact('taureaux','vaches','genisses','veaux','velles','bouteilles'));
    }

    public function produitVacheClient(Request $request){        

        $vaches =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVache");
        
        return view("shop.clients.produits.vache", compact('vaches'));
    }

    public function produitTaureauClient(Request $request){
        
        $taureaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idTaureau");

        return view("shop.clients.produits.taureau", compact('taureaux'));
    }

    public function produitGenisseClient(Request $request){
        
        $genisses =DB::select("SELECT * from bovins where bovins.idBovin = $request->idGenisse");

        return view("shop.clients.produits.genisse", compact('genisses'));
    }

    public function produitVeauClient(Request $request){
        
        $veaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVeau");

        return view("shop.clients.produits.veau", compact('veaux'));
    }

    public function produitVelleClient(Request $request){
        
        $velles =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVelle");

        return view("shop.clients.produits.velle", compact('velles'));
    }

    public function produitLaitClient(Request $request){
        
        $bouteilles = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $request->idLait");

        return view("shop.clients.produits.lait", compact('bouteilles'));
    }

    // fin de code pour client

    // public function viewByCatery(Request $request){

    //     return view("shop.categorie", compact('produits'));
    // }
}
