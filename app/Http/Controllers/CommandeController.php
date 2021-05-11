<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CommandeController extends Controller
{
    public function index(){
        
        $data_bovin = DB::table('users')
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->join('commandes', 'commandes.client_id', '=', 'clients.user_id')
        ->join('vente_bovins', 'vente_bovins.commande_id', '=', 'commandes.idCom')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->select('*','users.nom as nomclient')
        ->distinct()
        ->paginate(5);

        $nb_com = DB::table('commandes')
        ->join('vente_bovins', 'vente_bovins.commande_id', '=', 'commandes.idCom')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        ->get()->count("*");

        $montantTotale = DB::table("vente_bovins")->get()->sum("prixBovin");

        return view('commandes.index',compact('data_bovin', 'nb_com', 'montantTotale'));
    }

    public function show($idCom)
    {
        $data_bovin = DB::select("SELECT *, users.nom as nomclient from users, clients, commandes, vente_bovins, bovins
        where users.id = clients.user_id and clients.user_id = commandes.client_id
        and vente_bovins.commande_id = commandes.idCom and vente_bovins.bovin_id = bovins.idBovin
        and commandes.idCom = $idCom");
                
        return view('commandes.show',compact('data_bovin'));
    }

    public function lait_index(){

        $data_lait = DB::table('users')
        ->join('clients', 'clients.user_id', '=', 'users.id')
        ->join('commandes', 'commandes.client_id', '=', 'clients.user_id')
        ->join('vente_laits', 'vente_laits.commande_id', '=', 'commandes.idCom')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
        ->select('*')
        ->distinct()
        ->paginate(5);

        $nb_com = DB::table('commandes')
        ->join('vente_laits', 'vente_laits.commande_id', '=', 'commandes.idCom')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
        ->get()->count("*");

        $montantTotale = DB::table("vente_laits")->get()->sum("prixTotale");

        return view('commandes.lait_index',compact('data_lait', 'nb_com', 'montantTotale'));
    }

    public function lait_show($idLait)
    {
        $data_lait = DB::select("SELECT * from users, clients, commandes, vente_laits, bouteilles
        where users.id = clients.user_id and clients.user_id = commandes.client_id
        and vente_laits.commande_id = commandes.idCom and vente_laits.bouteille_id = bouteilles.idBouteille
        and commandes.idCom = $idLait");
                
        return view('commandes.lait_show',compact('data_lait'));
    }
}
