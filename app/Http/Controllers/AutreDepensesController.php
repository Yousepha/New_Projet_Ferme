<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AutresDepenses;
use App\Models\Admin;
use App\Models\Type;
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
        $types = Type::all();
        return view('autresdepenses.create',compact('types'));
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
        
        $admin_id = auth()->user()->id;

        $request->validate([
            'dateDepenses' => 'required|date|before:'.$date_actu.'',
            'type' => 'required',
            'libelle' => 'required',
            'montant' => 'required|Integer',
        ]);
  
        $input_data = array(
            'admin_id' => $admin_id,
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
        // $types = Type::all();
        
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
        $types = Type::all();

        $data = AutresDepenses::findOrFail($idDepenses);
        return view('autresdepenses.edit',compact('data', 'types'));
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
            // 'type' => 'required',
            'libelle' => 'required',
            'montant' => 'required|Integer',
        ]);
        
        $input_data = array(
            'dateDepenses' => $request->dateDepenses,
            // 'type' => $request->type,
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

    public function search(Request $request){
        $request->validate([
            'search_text'=>'required|min:2'
        ]);        

        $id_admin = auth()->user()->id;
        
        $search_text = $request->input('search_text');
        $query_select = $request->input('query_select');

        $data = DB::table('autres_depenses')
                ->join('admins', 'admins.user_id', '=', 'autres_depenses.admin_id')
                ->where('admins.user_id', $id_admin)    
                ->where($query_select, 'LIKE', '%'. $search_text. '%')->paginate(5);
        
        return view('autresdepenses.index', compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }
}
