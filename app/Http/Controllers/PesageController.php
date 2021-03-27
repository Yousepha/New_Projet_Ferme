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
        $request->validate([
            'datePesee' => 'required|date',
            'poids' => 'required',
        ]);

        $input_data = array(
            'bovin_id' => $request->idBovin,
            'datePesee' => $request->datePesee,
            'poids' => $request->poids,
        );

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
        $request->validate([
            'datePesee' => 'required|date',
            'poids' => 'required',
        ]);
        
        $input_data = array(
            'bovin_id' => $request->idBovin,
            'datePesee' => $request->datePesee,
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
}
