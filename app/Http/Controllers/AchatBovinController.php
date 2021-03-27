<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AchatBovin;
use App\Models\Bovin;
use App\Helpers\Helper;
use Illuminate\Support\Facades\DB;

class AchatBovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {        
        $data = DB::table('achat_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'achat_bovins.bovin_id')
        ->join('admins', 'admins.user_id', '=', 'achat_bovins.admin_id')
        ->join('races', 'races.idRace', '=', 'bovins.race_id')
        ->where('bovins.etat', '=', 'Vivant')
        ->select('*')
        ->paginate(5);
        return view('achatbovins.index', compact('data'));
    }
     // public function index()
    // {
    //     $data = AchatBovin::latest()->paginate(5);
    //     return view('achatbovins.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);

    // }

    /**
     * Show the form for creating a new resource.
     *
      * @return \Illuminate\Http\Response
      */
    // public function create()
    // {
    //     return view('achatbovins.create');
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     $admin_id = DB::select("SELECT id from users where est_admin = 1");
    //     $bovin_id = DB::select("SELECT id from bovins where est_admin = 1");

    //     $request->validate([
    //         'dateAchatBovin' => 'required|date',
    //         'montantBovin' => 'required',
    //     ]);
  
    //     $input_data = array(
    //         // 'bovin_id' => ,
    //         'admin_id' => $admin_id[0]->id,
    //         'dateDepenses' => $request->dateDepenses,
    //         'type' => $request->type,
    //         'libelle' => $request->libelle,
    //         'montant' => $request->montant,
    //     );
    //     AchatBovin::create($input_data);
   
    //     return redirect()->route('achatbovins.index')
    //                     ->with('success','La dépense a été créer avec succès!.');

    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     $data = AchatBovin::findOrFail($idDepenses);
    //     return view('achatbovins.show',compact('data'));
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     $data = AchatBovin::findOrFail($idDepenses);
    //     return view('achatbovins.edit',compact('data'));
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     $request->validate([
    //         'dateDepenses' => 'required|date',
    //         'type' => 'required',
    //         'libelle' => 'required',
    //         'montant' => 'required|Integer',
    //     ]);
    //     $input_data = array(
    //         'dateDepenses' => $request->dateDepenses,
    //         'type' => $request->type,
    //         'libelle' => $request->libelle,
    //         'montant' => $request->montant,
    //     );
    //     // $data->update($request->all());
    //     AchatBovin::whereIddepenses($idDepenses)->update($input_data);
  
    //     return redirect()->route('achatbovins.index')
    //                     ->with('success','Mise à jour de la dépense réussie !');
    //     }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     $data = AchatBovin::findOrFail($idDepenses);
    //     $data->delete();
  
    //     return redirect()->route('achatbovins.index')
    //                     ->with('success','La dépense est supprimée avec succès !');
    // }
}
