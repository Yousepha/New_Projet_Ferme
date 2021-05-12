<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TraiteDuJour;
use App\Models\AlimentationDuJour;
use DB;

class InfosController extends Controller
{
    public function indexProductLait(){
        
        $data = DB::table('bovins')
        ->join('vaches', 'vaches.idBovin', '=', 'bovins.idBovin')
        ->join('production_laits', 'production_laits.bovin_id', '=', 'vaches.idBovin')
        ->join('traite_du_jours', 'traite_du_jours.productionLait_id', '=', 'production_laits.idProductionLait')
        ->join('fermiers', 'fermiers.user_id', '=', 'traite_du_jours.fermier_id')
        ->join('users', 'users.id', '=', 'fermiers.user_id')
        ->select('*','users.nom as nomfermier', 'bovins.nom as nomvache')
        ->paginate(5);
        

        $traiteMatin = DB::table("traite_du_jours")->get()->sum("traiteMatin");
        $traiteSoir = DB::table("traite_du_jours")->get()->sum("traiteSoir");
        $stockTotale = $traiteMatin + $traiteSoir;
        $stock = DB::table('stock_laits')->get();
        
        return view('production_lait.index',compact('data', 'stock', 'stockTotale'));
    }
        
    public function show($idTraiteDuJour)
    {
        $arr['data'] = TraiteDuJour::findOrFail($idTraiteDuJour);
        
        $arr['vaches'] = DB::select("SELECT * from production_laits, traite_du_jours, vaches, bovins
        where production_laits.idProductionLait = traite_du_jours.productionLait_id
        and vaches.idBovin = production_laits.bovin_id
        and vaches.idBovin = bovins.idBovin
        and traite_du_jours.idTraiteDuJour = $idTraiteDuJour");

        return view('production_lait.show')->with($arr);
    }

    public function indexAlimentation(){
        
        $data = DB::table('alimentation_du_jours')
        ->join('fermiers', 'fermiers.user_id', '=', 'alimentation_du_jours.fermier_id')
        ->join('users', 'users.id', '=', 'fermiers.user_id')
        ->select('*')
        ->paginate(5);

        // dd($data);
        return view('production_aliment.index',compact('data'));
    }

    public function alimentShow($idAlimentation)
    {        
        $data = AlimentationDuJour::findOrFail($idAlimentation);

        return view('production_aliment.show',compact('data'));
    }

    public function search(Request $request){
        
        $request->validate([
            'fromDate'=>'required',
            'toDate'=>'required'
        ]);

        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $data = DB::table('bovins')
                    ->join('vaches', 'vaches.idBovin', '=', 'bovins.idBovin')
                    ->join('production_laits', 'production_laits.bovin_id', '=', 'vaches.idBovin')
                    ->join('traite_du_jours', 'traite_du_jours.productionLait_id', '=', 'production_laits.idProductionLait')
                    ->join('fermiers', 'fermiers.user_id', '=', 'traite_du_jours.fermier_id')
                    ->join('users', 'users.id', '=', 'fermiers.user_id')
                    ->select('*','users.nom as nomfermier', 'bovins.nom as nomvache')
                    ->where('dateTraite','>=', $fromDate)
                    ->where('dateTraite','<=', $toDate)
                    ->paginate(5);
                // dd($data);
        $traiteMatin = DB::table("traite_du_jours")->get()->sum("traiteMatin");
        $traiteSoir = DB::table("traite_du_jours")->get()->sum("traiteSoir");
        $stockTotale = $traiteMatin + $traiteSoir;
        $stock = DB::table('stock_laits')->get();

        return view('production_lait.index', compact('data', 'stock', 'stockTotale'));
    }

    public function search_aliment(Request $request){
        
        $request->validate([
            'fromDate'=>'required',
            'toDate'=>'required'
        ]);

        $fromDate = $request->input('fromDate');
        $toDate = $request->input('toDate');

        $data = DB::table('alimentation_du_jours')
                    ->join('fermiers', 'fermiers.user_id', '=', 'alimentation_du_jours.fermier_id')
                    ->join('users', 'users.id', '=', 'fermiers.user_id')
                    ->where('date','>=', $fromDate)
                    ->where('date','<=', $toDate)
                    ->paginate(5);
                // dd($data);

        return view('production_aliment.index', compact('data'));
    }

}
