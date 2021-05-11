<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class VoirToutController extends Controller
{
    public function indexGenisse(){

        $genisses = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('genisses', 'genisses.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        return view('shop.clients.voirTout.genisse',compact('genisses'));

    }

    public function indexLait(){

        $bouteilles = DB::table('bouteilles')
        ->where('prix', '!=', 'NULL')
        ->select('*')
        ->get();

        return view('shop.clients.voirTout.lait',compact('bouteilles'));
    }

    public function indexTaureau(){
        
        $taureaux = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('taureaus', 'taureaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        return view('shop.clients.voirTout.taureau',compact('taureaux'));
    }

    public function indexVache(){

        $vaches = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('vaches', 'vaches.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        return view('shop.clients.voirTout.vache',compact('vaches'));
    }

    public function indexVeau(){
        
        $veaux = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('veaus', 'veaus.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        return view('shop.clients.voirTout.veau',compact('veaux'));
    }

    public function indexVelle(){
        
        $velles = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->join('velles', 'velles.idBovin','=','bovins.idBovin')
        ->select('*')
        ->get();

        return view('shop.clients.voirTout.velle',compact('velles'));
    }
}
