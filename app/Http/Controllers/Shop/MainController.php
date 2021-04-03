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
    // public function index(){
    //     return view("exemple");
    // }
    public function index(){

        $taureaux = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        // ->where('vente_bovins.enLigne', 'en ligne') attribut de mis en ligne
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $vaches = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $genisses = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('genisses', 'genisses.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $veaux = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('veaus', 'veaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $velles = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $bouteilles = DB::table('vente_laits')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
        // ->join('commandes', 'commandes.idCom','=','vente_laits.commande_id')
        ->select('*')
        ->get();


        return view('shop.index',compact('taureaux','vaches','genisses','veaux','velles','bouteilles'));
    }

    public function produitVache(Request $request){        

        $vaches =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVache 
        and vente_bovins.bovin_id = $request->idVache and  bovins.idBovin = vente_bovins.bovin_id");
        
        return view("shop.produits.vache", compact('vaches'));
    }

    public function produitTaureau(Request $request){
        
        $taureaux =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idTaureau 
        and vente_bovins.bovin_id = $request->idTaureau and  bovins.idBovin = vente_bovins.bovin_id");

        return view("shop.produits.taureau", compact('taureaux'));
    }

    public function produitGenisse(Request $request){
        
        $genisses =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idGenisse 
        and vente_bovins.bovin_id = $request->idGenisse and  bovins.idBovin = vente_bovins.bovin_id");

        return view("shop.produits.genisse", compact('genisses'));
    }

    public function produitVeau(Request $request){
        
        $veaux =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVeau 
        and vente_bovins.bovin_id = $request->idVeau and  bovins.idBovin = vente_bovins.bovin_id");

        return view("shop.produits.veau", compact('veaux'));
    }

    public function produitVelle(Request $request){
        
        $velles =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVelle 
        and vente_bovins.bovin_id = $request->idVelle and  bovins.idBovin = vente_bovins.bovin_id");

        return view("shop.produits.velle", compact('velles'));
    }

    public function produitLait(Request $request){
        
        $bouteilles = DB::select("SELECT * from vente_laits, bouteilles where bouteilles.idBouteille = $request->idLait 
        and vente_laits.bouteille_id = $request->idLait and bouteilles.idBouteille = vente_laits.bouteille_id");

        return view("shop.produits.lait", compact('bouteilles'));
    }

    public function viewByCatery(Request $request){

        return view("shop.categorie", compact('produits'));
    }
}
