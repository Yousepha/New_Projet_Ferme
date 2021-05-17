<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Maladie;
use App\Models\Diagnostic;
use DB;

class DiagnosticFermierController extends Controller
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
        ->where('etatDeSante','Malade')
        ->select('*')
        ->paginate(5);
        
        return view('diagnosticfermiers.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // afficher seulement les bovins sain ->where('etatDeSante','Sain')
        $bovins = Bovin::all();

        $maladies = Maladie::all();
        
        return view('diagnosticfermiers.create',compact('bovins', 'maladies'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
        
        $dateMaladie = $request->input('dateMaladie');
        // $dateGuerison = $request->input('dateGuerison');

        $request->validate([
            'dateMaladie' => 'required|date|before:'.$date_actu.'',
            'dateGuerison' => 'nullable|date|before:'.$date_actu.'|after:'.$dateMaladie.'',
        ]);

        $bovin_maladie = DB::table('diagnostics')
                        ->join('bovins', 'bovins.idBovin', '=', 'diagnostics.bovin_id')
                        ->join('maladies', 'maladies.idMaladie','=','diagnostics.maladie_id')
                        ->where('etatDeSante','Malade')
                        ->where('bovin_id',$request->idBovin)
                        ->where('maladie_id',$request->idMaladie)
                        ->where('bovins.idBovin',$request->idBovin)
                        ->where('maladies.idMaladie',$request->idMaladie)
                        ->where('dateMaladie', $request->dateMaladie)
                        // ->where('dateGuerison', NULL)
                        ->get();

        if(count($bovin_maladie) > 0){

            return redirect()->route('diagnosticfermiers.create')
            ->with('error','Le Bovin '.$bovin_maladie[0]->nom.' n\'est pas encore guéri de la maladie: '.$bovin_maladie[0]->nomMaladie);
        }else{
            $input_data = array(
                'bovin_id' => $request->idBovin,
                'maladie_id' => $request->idMaladie,
                'dateMaladie' => $request->dateMaladie,
                'dateGuerison' => $request->dateGuerison,
            );
        }

        

        Diagnostic::create($input_data);
        
        $etat_sante = array(
            'etatDeSante' => $request->etatDeSante,
        );

        Bovin::whereidbovin($request->idBovin)->update($etat_sante);
        
        return redirect()->route('diagnosticfermiers.index')
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


        return view('diagnosticfermiers.show')->with($arr);
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
        where maladies.idMaladie = diagnostics.maladie_id
        and diagnostics.idDiagnostic = $idDiagnostic");


        return view('diagnosticfermiers.edit')->with($arr);
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
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
        
        $dateMaladie = $request->input('dateMaladie');
        // $dateGuerison = $request->input('dateGuerison');

        $request->validate([
            'dateMaladie' => 'required|date|before:'.$date_actu.'',
            'dateGuerison' => 'nullable|date|before:'.$date_actu.'|after:'.$dateMaladie.'',
        ]);

        
        $bovin_maladie = DB::table('diagnostics')
                        ->join('bovins', 'bovins.idBovin', '=', 'diagnostics.bovin_id')
                        ->join('maladies', 'maladies.idMaladie','=','diagnostics.maladie_id')
                        ->where('etatDeSante','Malade')
                        ->where('bovin_id',$request->idBovin)
                        ->where('maladie_id',$request->idMaladie)
                        ->where('bovins.idBovin',$request->idBovin)
                        ->where('maladies.idMaladie',$request->idMaladie)
                        ->where('dateMaladie', $request->dateMaladie)
                        ->get();

        if(count($bovin_maladie) > 0){

            return redirect()->route('diagnosticfermiers.edit', $idDiagnostic)
            ->with('error','Le Bovin '.$bovin_maladie[0]->nom.' n\'est pas encore guéri de la maladie: '.$bovin_maladie[0]->nomMaladie);
        }else{
            $input_data = array(
                'bovin_id' => $request->idBovin,
                'maladie_id' => $request->idMaladie,
                'dateMaladie' => $request->dateMaladie,
                'dateGuerison' => $request->dateGuerison,
            );
        }
  
        Diagnostic::whereiddiagnostic($idDiagnostic)->update($input_data);

        $etat_sante = array(
            'etatDeSante' => $request->etatDeSante,
        );

        Bovin::whereidbovin($request->idBovin)->update($etat_sante);
  
        return redirect()->route('diagnosticfermiers.index')
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
        
        return redirect()->route('diagnosticfermiers.index')
        ->with('error','Le diagnostic est supprimée avec succès !');
    }
}
