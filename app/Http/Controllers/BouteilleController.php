<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockLait;
use App\Models\Bouteille;
use DB;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('bouteilles')
        ->join('stock_laits', 'stock_laits.idStock', '=', 'bouteilles.stock_id')
        ->select('*')
        ->paginate(5);
        
        return view('bouteilles.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {        
        $stoklait = StockLait::all();
        return view('bouteilles.create',compact('stoklait'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_id = DB::select("SELECT idStock from stock_laits, bouteilles where stock_laits.idStock = bouteilles.stock_id");

        $request->validate([
            'capacite' => 'required|integer',
        ]);

        $input_data = array(
            'stock_id' => $stock_id[0]->idStock,
            'capacite' => $request->capacite,
        );

        Bouteille::create($input_data);
        
        // $etat_stock = array(
        //     'quantiteVendue' => $request->capacite,
        // );

        // StockLait::whereidstock($request->idStock)->update($etat_stock);
        
        return redirect()->route('bouteilles.index')
                        ->with('success','Le Bouteille a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBouteille)
    {
        $arr['data'] = Bouteille::findOrFail($idBouteille);
        
        $arr['stock_laits'] = DB::select("SELECT * from bouteilles, stock_laits
        where stock_laits.idStock = bouteilles.stock_id
        and bouteilles.idBouteille = $idBouteille");

        return view('bouteilles.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idBouteille)
    {
        $arr['data'] = Bouteille::findOrFail($idBouteille);
        
        $arr['stock_laits'] = DB::select("SELECT * from bouteilles, stock_laits
        where stock_laits.idStock = bouteilles.stock_id
        and bouteilles.idBouteille = $idBouteille");

        return view('bouteilles.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBouteille)
    {
        $request->validate([
            'capacite' => 'required|integer',
        ]);

        $input_data = array(
            // 'stock_id' => $request->idStock,
            'capacite' => $request->capacite,
        );
  
        Bouteille::whereidbouteille($idBouteille)->update($input_data);

        return redirect()->route('bouteilles.index')
                        ->with('success','Mise à jour de la Bouteille réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBouteille)
    {
        $data = Bouteille::findOrFail($idBouteille);
        $data->delete();
        
        return redirect()->route('bouteilles.index')
        ->with('error','La Bouteille est supprimée avec succès !');
    }
}
