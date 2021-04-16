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

        $bouteilles = DB::table('bouteilles')
        ->where('prix', '!=', 'NULL')
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
