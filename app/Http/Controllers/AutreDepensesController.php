<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutresDepenses;
use App\Models\Admin;
use Illuminate\Support\Facades\DB;

class AutreDepensesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = AutresDepenses::latest()->paginate(5);
        return view('autresdepenses.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('autresdepenses.create');
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
        // dd($admin_id[0]->id);
        $request->validate([
            'dateDepenses' => 'required|date',
            'type' => 'required',
            'libelle' => 'required',
            'montant' => 'required|Integer',
        ]);
  
        $input_data = array(
            'admin_id' => $admin_id[0]->id,
            'dateDepenses' => $request->dateDepenses,
            'type' => $request->type,
            'libelle' => $request->libelle,
            'montant' => $request->montant,
        );
        AutresDepenses::create($input_data);
   
        return redirect()->route('autresdepenses.index')
                        ->with('success','La dépense a été créer avec succès!.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idDepenses)
    {
        $data = AutresDepenses::findOrFail($idDepenses);
        return view('autresdepenses.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idDepenses)
    {
        $data = AutresDepenses::findOrFail($idDepenses);
        return view('autresdepenses.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idDepenses)
    {
        $request->validate([
            'dateDepenses' => 'required|date',
            'type' => 'required',
            'libelle' => 'required',
            'montant' => 'required|Integer',
        ]);
        
        $input_data = array(
            'dateDepenses' => $request->dateDepenses,
            'type' => $request->type,
            'libelle' => $request->libelle,
            'montant' => $request->montant,
        );
        // $data->update($request->all());
        AutresDepenses::whereIddepenses($idDepenses)->update($input_data);
  
        return redirect()->route('autresdepenses.index')
                        ->with('success','Mise à jour de la dépense réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idDepenses)
    {
        $data = AutresDepenses::findOrFail($idDepenses);
        $data->delete();
  
        return redirect()->route('autresdepenses.index')
                        ->with('error','La dépense est supprimée avec succès !');
    }
}
