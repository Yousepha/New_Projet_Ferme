<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TraiteDuJour;
use App\Models\ProductionLait;
use App\Models\Bovin;
use App\Models\Vache;
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
        $data = DB::table('traite_du_jours')
        ->join('production_laits', 'production_laits.idProductionLait', '=', 'traite_du_jours.productionLait_id')
        ->join('vaches', 'vaches.idBovin','=','production_laits.bovin_id')
        ->join('bovins', 'bovins.idBovin', '=', 'vaches.idBovin')
        ->select('*')
        ->paginate(5);
        
        return view('traites.index',compact('data'));
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

        $prod = ProductionLait::create($production);

        $request->validate([
            'traiteMatin' => 'required',
            'traiteSoir' => 'required',
            'dateTraite' => 'required|date',
        ]);

        $input_data = array(
            'fermier_id' => $fermier_id[0]->id,
            'traiteMatin' => $request->traiteMatin,
            'traiteSoir' => $request->traiteSoir,
            'dateTraite' => $request->dateTraite,
            'productionLait_id' => $prod->idProductionLait,
        );

        TraiteDuJour::create($input_data);
        
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
        
        ProductionLait::whereidproductionlait($arr[0]->idProductionLait)->update($production);

        $request->validate([
            'traiteMatin' => 'required',
            'traiteSoir' => 'required',
            'dateTraite' => 'required|date'
        ]);
        
        $input_data = array(
            'traiteMatin' => $request->traiteMatin,
            'traiteSoir' => $request->traiteSoir,
            'dateTraite' => $request->dateTraite,
            // 'productionLait_id' =>$arr[0]->idProductionLait,
        );
  
        TraiteDuJour::whereidtraitedujour($idTraiteDuJour)->update($input_data);
  
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
        $arr = DB::select("SELECT idProductionLait from production_laits, traite_du_jours where production_laits.idProductionLait = traite_du_jours.productionLait_id and traite_du_jours.idTraiteDuJour = $idTraiteDuJour");
        
        // dd($arr);
        $product = DB::table("production_laits")->where("idProductionLait", $arr[0]->idProductionLait);
        
        $data = TraiteDuJour::findOrFail($idTraiteDuJour);
        $data->delete();
        
        $product->delete();
        
        return redirect()->route('traites.index')
        ->with('error','La traite est supprimée avec succès !');
    }
}
