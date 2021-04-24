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
        ->limit(3)
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
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function adminHome()
    {
        $achat_bovin = DB::table("achat_bovins")->sum("montantBovin");
        $achat_aliment = DB::table("achat_aliments")->sum("montant");
        $autres_depense = DB::table("autres_depenses")->sum("montant");
        $som_depenses = $achat_bovin + $achat_aliment + $autres_depense;
    
        $vente_bovin = DB::table("vente_bovins")->sum("prixBovin");
        $vente_lait = DB::table("vente_laits")->sum("prixTotale");

        $som_ventes = $vente_bovin + $vente_lait;
        $revenu = ($som_ventes - $som_depenses);

        $users = DB::table("users")->where('profile', 'client')->count();
        
        $fermiers = DB::table("fermiers")->join('users', 'users.id', 'fermiers.user_id')->select('*')->paginate(3);
        $bovins = DB::table("bovins")->select('*')->paginate(3);

        // dd($revenu);

        return view('adminHome',compact('som_depenses', 'users', 'som_ventes', 'revenu', 'fermiers', 'bovins'))->with('i',(request()->input('page',1)-1)*3)->with('j',(request()->input('page',1)-1)*3);
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
