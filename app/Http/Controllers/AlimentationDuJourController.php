<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AlimentationDuJour;
use App\Models\AchatAliment;
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
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
     
        $data = DB::table('achat_aliments')
        ->join('alimentation_du_jours', 'alimentation_du_jours.nomAlimentation', '=', 'achat_aliments.nomaliment')
        ->where('date', $date_actu)
        ->select('*')
        ->paginate(5);

        return view('alimentationjour.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $achat_aliment = DB::table('achat_aliments')
        ->select('*')
        ->get();

        return view('alimentationjour.create', compact('achat_aliment'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $id_fermier = auth()->user()->id;
        // $fermier_id = DB::select("SELECT id from users where users.id = $id_fermier");

        $request->validate([
            'nomAlimentation' => 'required',
            'quantite' => 'required',
            // 'date' => 'required|date',
        ]);
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');
            
        $nom_aliment = DB::select("SELECT * from achat_aliments where achat_aliments.nomAliment = '$request->nomAlimentation'");

        // dd($request->nomAlimentation);
        if($request->quantite <= $nom_aliment[0]->quantite){
            $input_qte_aliment = array(
                'quantite' => $nom_aliment[0]->quantite - $request->quantite,
                // 'quantite_consommee' => $nom_aliment[0]->quantite_consommee + $request->quantite,
            );
        }
        else{
            return redirect()->route('alimentationjour.create')
            ->with('error','La Quantité de l\'aliment '. $nom_aliment[0]->nomAliment .' saisie est supérieur à celle dans le stock.
            Stock Actuel = '.$nom_aliment[0]->quantite.' kg');
        }

        $input_data = array(
            'fermier_id' => $id_fermier,
            'nomAlimentation' => $request->nomAlimentation,
            'quantite' => $request->quantite,
            'date' => $date_actu,
        );
        

        AlimentationDuJour::create($input_data);
        AchatAliment::wherenomaliment($request->nomAlimentation)->update($input_qte_aliment);
   
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
        $achat_aliment = DB::select("SELECT * from achat_aliments, alimentation_du_jours where achat_aliments.nomAliment = alimentation_du_jours.nomAlimentation
        and alimentation_du_jours.idAlimentation = $idAlimentation");

        return view('alimentationjour.edit',compact('data','achat_aliment'));
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
        $nom_aliment = DB::select("SELECT * from achat_aliments, alimentation_du_jours where achat_aliments.nomAliment = alimentation_du_jours.nomAlimentation
        and alimentation_du_jours.idAlimentation = $idAlimentation
        ");
        $nom_aliment_jour = DB::select("SELECT * from alimentation_du_jours, achat_aliments where alimentation_du_jours.idAlimentation = $idAlimentation
        and alimentation_du_jours.nomAlimentation = achat_aliments.nomAliment");
        $qte_avant = $nom_aliment_jour[0]->quantite + $nom_aliment[0]->quantite;
        // $qte_avant_cons = $nom_aliment[0]->quantite_consommee - $nom_aliment_jour[0]->quantite;

        $request->validate([
            'nomAlimentation' => 'required',
            'quantite' => 'required',
        ]);

        if($request->quantite <= $qte_avant){
            $input_qte_aliment = array(
                'quantite' => $qte_avant - $request->quantite,
                // 'quantite_consommee' => $qte_avant_cons + $request->quantite,
            );
        }
        else{
            return redirect()->route('alimentationjour.edit', $idAlimentation)
            ->with('error','La Quantité de l\'aliment '. $nom_aliment[0]->nomAliment .' saisie est supérieur à celle dans le stock.
            Stock Actuel = '.$qte_avant.' kg');
        }

        $input_data = array(
            'nomAlimentation' => $request->nomAlimentation,
            'quantite' => $request->quantite,
        );

        AlimentationDuJour::whereidalimentation($idAlimentation)->update($input_data);
        AchatAliment::wherenomaliment($request->nomAlimentation)->update($input_qte_aliment);
  
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
        
        $nom_aliment = DB::select("SELECT * from achat_aliments, alimentation_du_jours where achat_aliments.nomAliment = alimentation_du_jours.nomAlimentation
        and alimentation_du_jours.idAlimentation = $idAlimentation
        ");
        $nom_aliment_jour = DB::select("SELECT * from alimentation_du_jours, achat_aliments where alimentation_du_jours.idAlimentation = $idAlimentation
        and alimentation_du_jours.nomAlimentation = achat_aliments.nomAliment");
        $qte_avant = $nom_aliment_jour[0]->quantite + $nom_aliment[0]->quantite;
        // $qte_avant_cons = $nom_aliment[0]->quantite_consommee - $nom_aliment[0]->quantite;
        // dd($nom_aliment[0]->quantite);
        $input_qte_aliment = array(
            'quantite' => $qte_avant,
            // 'quantite_consommee' => $qte_avant_cons,
        );

        AchatAliment::wherenomaliment($nom_aliment_jour[0]->nomAlimentation)->update($input_qte_aliment);

        $data->delete();

        return redirect()->route('alimentationjour.index')
                        ->with('error','L\'aliment est supprimé avec succès !');
    }
}
