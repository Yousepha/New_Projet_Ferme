<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AchatAliment;
use Illuminate\Support\Facades\DB;

class AchatAlimentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AchatAliment::latest()->paginate(5);
        return view('achataliments.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
     }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('achataliments.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $admin_id = DB::select("SELECT id from users where est_admin = 1");

        $request->validate([
            'dateAchatAliment' => 'required|date',
            'nomAliment' => 'required',
            'quantite' => 'required',
            'montant' => 'required|Integer',
        ]);
  
        $input_data = array(
            'admin_id' => $admin_id[0]->id,
            'dateAchatAliment' => $request->dateAchatAliment,
            'nomAliment' => $request->nomAliment,
            'quantite' => $request->quantite,
            'montant' => $request->montant,
        );

        AchatAliment::create($input_data);
   
        return redirect()->route('achataliments.index')
                        ->with('success','L\'achat aliment a été créer avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idAchatAliment)
    {
        $data = AchatAliment::findOrFail($idAchatAliment);
        return view('achataliments.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idAchatAliment)
    {
        $data = AchatAliment::findOrFail($idAchatAliment);
        return view('achataliments.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idAchatAliment)
    {
        $request->validate([
            'dateAchatAliment' => 'required|date',
            'nomAliment' => 'required',
            'quantite' => 'required',
            'montant' => 'required|Integer',
        ]);
        
        $input_data = array(
            'dateAchatAliment' => $request->dateAchatAliment,
            'nomAliment' => $request->nomAliment,
            'quantite' => $request->quantite,
            'montant' => $request->montant,
        );

        AchatAliment::whereIdachataliment($idAchatAliment)->update($input_data);
  
        return redirect()->route('achataliments.index')
                        ->with('success','Mise à jour de l\'achat Aliment réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idAchatAliment)
    {
        $data = AchatAliment::findOrFail($idAchatAliment);
        $data->delete();
  
        return redirect()->route('achataliments.index')
                        ->with('error','L\'achat Aliment est supprimée avec succès !');
    }
}
