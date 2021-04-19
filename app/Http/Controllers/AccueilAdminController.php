<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AccueilAdminController extends Controller
{
    public function index(){
        $achat_bovin = DB::table("achat_bovins")->sum("montantBovin");
        $achat_aliment = DB::table("achat_aliments")->sum("montant");
        $autres_depense = DB::table("autres_depenses")->sum("montant");
        dd($achat_bovin);
        $som_depenses = $achat_bovin + $achat_aliment + $autres_depense;
        return view('adminHome',compact('som_depenses'));

    }
}
