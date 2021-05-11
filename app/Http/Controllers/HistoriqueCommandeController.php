<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\VenteBovin;
use App\Models\Bouteille;
use App\Models\VenteLait;
use App\Models\Commande;
use DB;

class HistoriqueCommandeController extends Controller
{
    public function index(){
        $id_user = auth()->user()->id;

        $taureaux = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('clients', 'clients.user_id', '=', 'commandes.client_id')
        ->where('clients.user_id',$id_user)
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        $vaches = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->join('clients', 'clients.user_id', '=', 'commandes.client_id')
        ->where('clients.user_id',$id_user)
        ->select('*')
        ->get();

        $genisses = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('genisses', 'genisses.idBovin','=','bovins.idBovin')
        ->join('clients', 'clients.user_id', '=', 'commandes.client_id')
        ->where('clients.user_id',$id_user)
        ->select('*')
        ->get();

        $veaux = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('veaus', 'veaus.idBovin','=','bovins.idBovin')
        ->join('clients', 'clients.user_id', '=', 'commandes.client_id')
        ->where('clients.user_id',$id_user)
        ->select('*')
        ->get();

        $velles = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->join('clients', 'clients.user_id', '=', 'commandes.client_id')
        ->where('clients.user_id',$id_user)
        ->select('*')
        ->get();

        $bouteilles = DB::table('bouteilles')
        ->join('vente_laits', 'vente_laits.bouteille_id', '=', 'bouteilles.idBouteille')
        ->join('commandes', 'commandes.idCom','=','vente_laits.commande_id')
        ->join('clients', 'clients.user_id', '=', 'commandes.client_id')
        ->where('clients.user_id',$id_user)
        ->select('*')
        ->get();
        // dd($bouteilles);

        return view('shop.clients.historique',compact('taureaux','vaches','genisses','veaux','velles','bouteilles'));
    }
}
