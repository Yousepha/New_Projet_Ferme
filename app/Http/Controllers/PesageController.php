<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\Pesage;
use DB;

class PesageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('pesages')
        ->join('bovins', 'bovins.idBovin', '=', 'pesages.bovin_id')
        ->select('*')
        ->paginate(5);
        
        return view('pesages.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovins = Bovin::all();
        return view('pesages.create',compact('bovins'));
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
     
        $request->validate([
            // 'datePesee' => 'required|date',
            'poids' => 'required',
        ]);

        $input_data = array(
            'bovin_id' => $request->idBovin,
            'datePesee' => $date_actu,
            'poids' => $request->poids,
        );

        $pesage = DB::table('pesages')
                ->join('bovins', 'bovins.idBovin', '=', 'pesages.bovin_id')
                ->where('datePesee', $date_actu)
                ->where('bovins.idBovin', $request->idBovin)
                ->get();

        if(count($pesage) > 0){

            return redirect()->route('pesages.create')
            ->with('error','La Bovin '.$pesage[0]->nom.' a été déjà pesée ');
        }else{

        }

        Pesage::create($input_data);
        
        return redirect()->route('pesages.index')
                        ->with('success','La pesée a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idPesage)
    {
        $arr['data'] = Pesage::findOrFail($idPesage);
        
        $arr['bovins'] = DB::select("SELECT * from bovins, pesages
        where bovins.idBovin = pesages.bovin_id
        and pesages.idPesage = $idPesage");

        return view('pesages.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idPesage)
    {
        $arr['data'] = Pesage::findOrFail($idPesage);
        
        $arr['bovins'] = DB::select("SELECT * from pesages, bovins
        where bovins.idBovin = pesages.bovin_id
        and pesages.idPesage = $idPesage");

        return view('pesages.edit')->with($arr);
    } 

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idPesage)
    {
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');

        $request->validate([
            // 'datePesee' => 'required|date',
            'poids' => 'required',
        ]);
        
        $input_data = array(
            'bovin_id' => $request->idBovin,
            'datePesee' => $date_actu,
            'poids' => $request->poids,
        );

        Pesage::whereidpesage($idPesage)->update($input_data);
  
        return redirect()->route('pesages.index')
                        ->with('success','Mise à jour de la pesée réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idPesage)
    {
        $data = Pesage::findOrFail($idPesage);
        $data->delete();
                
        return redirect()->route('pesages.index')
            ->with('error','La pesée est supprimée avec succès !');
    }

    public function search(Request $request){
        $request->validate([
            'search_text'=>'required|min:2'
        ]);        

        $search_text = $request->input('search_text');
        $query_select = $request->input('query_select');

        $data = DB::table('pesages')
        ->join('bovins', 'bovins.idBovin', '=', 'pesages.bovin_id')
        ->where($query_select, 'LIKE', '%'. $search_text. '%')
        ->paginate(3);
        
        return view('pesages.index', compact('data'));
    }
}
