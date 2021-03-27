<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlimentationDuJour;
use DB;

class AlimentationDuJourController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AlimentationDuJour::latest()->paginate(3);
        return view('alimentationjour.index',compact('data'))->with('i',(request()->input('page',1)-1)*3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alimentationjour.create');
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

        $request->validate([
            'nomAlimentation' => 'required',
            'quantite' => 'required',
            'date' => 'required|date',
        ]);
            
        $input_data = array(
            'fermier_id' => $fermier_id[0]->id,
            'nomAlimentation' => $request->nomAlimentation,
            'quantite' => $request->quantite,
            'date' => $request->date,
        );

        AlimentationDuJour::create($input_data);
   
        return redirect()->route('alimentationjour.index')
                        ->with('success','L\'aliment a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idAlimentation)
    {
        $data = AlimentationDuJour::findOrFail($idAlimentation);
        return view('alimentationjour.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idAlimentation)
    {
        $data = AlimentationDuJour::findOrFail($idAlimentation);
        return view('alimentationjour.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idAlimentation)
    {
        $request->validate([
            'nomAlimentation' => 'required',
            'quantite' => 'required',
            'date' => 'required|date',
        ]);

        $input_data = array(
            'nomAlimentation' => $request->nomAlimentation,
            'quantite' => $request->quantite,
            'date' => $request->date,
        );

        AlimentationDuJour::whereidalimentation($idAlimentation)->update($input_data);
  
        return redirect()->route('alimentationjour.index')
                        ->with('success','Mise à jour de l\'aliment réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAlimentation)
    {
        $data = AlimentationDuJour::findOrFail($idAlimentation);
        $data->delete();
        
        return redirect()->route('alimentationjour.index')
                        ->with('error','L\'aliment est supprimée avec succès !');
    }
}
