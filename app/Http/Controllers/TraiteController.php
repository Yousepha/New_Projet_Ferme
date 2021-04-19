<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TraiteDuJour;
use App\Models\ProductionLait;
use App\Models\Bovin;
use App\Models\Vache;
use App\Models\StockLait;
use DB;

class TraiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');

        $data = DB::table('traite_du_jours')
        ->join('production_laits', 'production_laits.idProductionLait', '=', 'traite_du_jours.productionLait_id')
        ->join('vaches', 'vaches.idBovin','=','production_laits.bovin_id')
        ->where('dateTraite', $date_actu)
        ->join('bovins', 'bovins.idBovin', '=', 'vaches.idBovin')
        ->select('*')
        ->paginate(5);

        $traiteMatin = DB::table("traite_du_jours")->get()->sum("traiteMatin");
        $traiteSoir = DB::table("traite_du_jours")->get()->sum("traiteSoir");
        $stockTotale = $traiteMatin + $traiteSoir;
        $stock = DB::table('stock_laits')->get();
        
        return view('traites.index',compact('data', 'stock', 'stockTotale'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovins = DB::table('vaches')
        ->join('bovins', 'bovins.idBovin', '=', 'vaches.idBovin')
        ->join('periodes', 'periodes.idPeriode','=','vaches.periode_id')
        ->where('periodes.nomPeriode', 'lactation')
        ->get();

        return view('traites.create',compact('bovins'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fermier_id = DB::select("SELECT id from users where est_fermier = 1");

        $production = array(
            'bovin_id' => $request->idBovin
        );
        
        /**Enregistrment dans la table Production pour une vache en lactation spécifique */
        $prod = ProductionLait::create($production);

        $request->validate([
            'traiteMatin' => 'required',
            'traiteSoir' => 'required',
        ]);

        /**Recupération de la date actuelle !*/
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
     
        $input_data = array(
            'fermier_id' => $fermier_id[0]->id,
            'traiteMatin' => $request->traiteMatin,
            'traiteSoir' => $request->traiteSoir,
            'dateTraite' => $date_actu,
            'productionLait_id' => $prod->idProductionLait,
        );

        $traite = TraiteDuJour::create($input_data);
        
        /**Premier enregistrment d'une traite et création du stock de lait ce qui veut dire 
         * que le stock n'existe pas avant l'enregistrement d'une traite*/

        if($traite->idTraiteDuJour == 1){
            StockLait::create();
        }
        
        /*code du stock */
        $stock = DB::select("SELECT * from stock_laits where idStock = 1");

        $input_stock = array(
            'quantiteDispo' => $stock[0]->quantiteDispo + $request->traiteMatin + $request->traiteSoir,
            'quantiteTotale' => $stock[0]->quantiteDispo + $request->traiteMatin + $request->traiteSoir,
        );


        StockLait::whereidstock(1)->update($input_stock);
        /*end code du stock */

        return redirect()->route('traites.index')
                        ->with('success','La traite a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idTraiteDuJour)
    {
        $arr['data'] = TraiteDuJour::findOrFail($idTraiteDuJour);
        
        $arr['vaches'] = DB::select("SELECT * from production_laits, traite_du_jours, vaches, bovins
        where production_laits.idProductionLait = traite_du_jours.productionLait_id
        and vaches.idBovin = production_laits.bovin_id
        and vaches.idBovin = bovins.idBovin
        and traite_du_jours.idTraiteDuJour = $idTraiteDuJour");

        return view('traites.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idTraiteDuJour)
    {
        $arr['data'] = TraiteDuJour::findOrFail($idTraiteDuJour);
        
        $arr['vaches'] = DB::select("SELECT * from production_laits, traite_du_jours, vaches, bovins
        where production_laits.idProductionLait = traite_du_jours.productionLait_id
        and vaches.idBovin = bovins.idBovin
        and traite_du_jours.idTraiteDuJour = $idTraiteDuJour");

        return view('traites.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idTraiteDuJour)
    {
        $production = array(
            'bovin_id' => $request->idBovin
        );

        $arr = DB::select("SELECT idProductionLait from production_laits, traite_du_jours where production_laits.idProductionLait = traite_du_jours.productionLait_id and traite_du_jours.idTraiteDuJour = $idTraiteDuJour");
        
        $traite = DB::select("SELECT * from traite_du_jours where traite_du_jours.idTraiteDuJour = $idTraiteDuJour");
        
        $traite_matin_actu = $traite[0]->traiteMatin;
        $traite_soir_actu = $traite[0]->traiteSoir;

        ProductionLait::whereidproductionlait($arr[0]->idProductionLait)->update($production);

        $request->validate([
            'traiteMatin' => 'required',
            'traiteSoir' => 'required',
        ]);
        
        $input_data = array(
            'traiteMatin' => $request->traiteMatin,
            'traiteSoir' => $request->traiteSoir,
            'productionLait_id' =>$arr[0]->idProductionLait,
        );
  
        TraiteDuJour::whereidtraitedujour($idTraiteDuJour)->update($input_data);
        
        /* code du stock */
        $stock = DB::select("SELECT quantiteDispo from stock_laits where idStock = 1");
        $stock_lait = $stock[0]->quantiteDispo - ($traite_matin_actu + $traite_soir_actu);
        
        // dd($traite_matin_actu);
        
        $input_stock = array(
            'quantiteDispo' => $stock_lait + $request->traiteMatin + $request->traiteSoir,
        );

        StockLait::whereidstock(1)->update($input_stock);
        /* end code du stock */
  
        return redirect()->route('traites.index')
                        ->with('success','Mise à jour de la traite réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idTraiteDuJour)
    {
        $arr = DB::select("SELECT idProductionLait from production_laits, traite_du_jours 
        where production_laits.idProductionLait = traite_du_jours.productionLait_id 
        and traite_du_jours.idTraiteDuJour = $idTraiteDuJour");
        
        // dd($arr);
        $product = DB::table("production_laits")->where("idProductionLait", $arr[0]->idProductionLait);
        
        $traite = DB::select("SELECT * from traite_du_jours 
        where traite_du_jours.idTraiteDuJour = $idTraiteDuJour");
        $traite_matin_actu = $traite[0]->traiteMatin;
        $traite_soir_actu = $traite[0]->traiteSoir;
        
        /*code du stock */
        $stock = DB::select("SELECT quantiteDispo from stock_laits where idStock = 1");
        $stock_lait = $stock[0]->quantiteDispo - ($traite_matin_actu + $traite_soir_actu);

        $input_stock = array(
            'quantiteDispo' => $stock_lait,
        );

        StockLait::whereidstock(1)->update($input_stock);
        /*end code*/

        $data = TraiteDuJour::findOrFail($idTraiteDuJour);
        $data->delete();
        
        $product->delete();
        
        return redirect()->route('traites.index')
        ->with('error','La traite est supprimée avec succès !');
    }
}
