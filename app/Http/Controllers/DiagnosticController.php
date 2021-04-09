<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Maladie;
use App\Models\Diagnostic;
use DB;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('diagnostics')
        ->join('bovins', 'bovins.idBovin', '=', 'diagnostics.bovin_id')
        ->join('maladies', 'maladies.idMaladie','=','diagnostics.maladie_id')
        ->select('*')
        ->paginate(5);
        
        return view('diagnostics.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovins = Bovin::all();

        $maladies = Maladie::all();
        // afficher seulement les bovins sain
        return view('diagnostics.create',compact('bovins', 'maladies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'dateMaladie' => 'required|date',
            'dateGuerison' => 'nullable|date',
        ]);

        $input_data = array(
            'bovin_id' => $request->idBovin,
            'maladie_id' => $request->idMaladie,
            'dateMaladie' => $request->dateMaladie,
            'dateGuerison' => $request->dateGuerison,
        );

        Diagnostic::create($input_data);
        
        $etat_sante = array(
            'etatDeSante' => $request->etatDeSante,
        );

        Bovin::whereidbovin($request->idBovin)->update($etat_sante);
        
        return redirect()->route('diagnostics.index')
                        ->with('success','Le diagnostic a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idDiagnostic)
    {
        $arr['data'] = Diagnostic::findOrFail($idDiagnostic);
        
        $arr['bovins'] = DB::select("SELECT * from diagnostics, bovins
        where bovins.idBovin = diagnostics.bovin_id
        and diagnostics.idDiagnostic = $idDiagnostic");

        $arr['maladies'] = DB::select("SELECT * from diagnostics, maladies
        where maladies.idMaladie = diagnostics.maladie_id
        and diagnostics.idDiagnostic = $idDiagnostic");


        return view('diagnostics.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idDiagnostic)
    {
        $arr['data'] = Diagnostic::findOrFail($idDiagnostic);
        
        $arr['bovins'] = DB::select("SELECT * from diagnostics, bovins
        where bovins.idBovin = diagnostics.bovin_id
        and diagnostics.idDiagnostic = $idDiagnostic");

        $arr['maladies'] = DB::select("SELECT * from diagnostics, maladies
        where diagnostics.idDiagnostic = $idDiagnostic");


        return view('diagnostics.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDiagnostic)
    {
        $request->validate([
            'dateMaladie' => 'required|date',
            'dateGuerison' => 'nullable|date',
        ]);

        $input_data = array(
            'bovin_id' => $request->idBovin,
            'maladie_id' => $request->idMaladie,
            'dateMaladie' => $request->dateMaladie,
            'dateGuerison' => $request->dateGuerison,
        );
  
        Diagnostic::whereiddiagnostic($idDiagnostic)->update($input_data);

        $etat_sante = array(
            'etatDeSante' => $request->etatDeSante,
        );

        Bovin::whereidbovin($request->idBovin)->update($etat_sante);
  
        return redirect()->route('diagnostics.index')
                        ->with('success','Mise à jour du diagnostic réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDiagnostic)
    {
        $data = Diagnostic::findOrFail($idDiagnostic);
        $data->delete();
        
        return redirect()->route('diagnostics.index')
        ->with('error','Le diagnostic est supprimée avec succès !');
    }
}
