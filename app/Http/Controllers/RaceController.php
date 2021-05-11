<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Race;

class RaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Race::latest()->paginate(5);
        return view('races.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('races.create');
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
            'nomRace' => 'required',
        ]);

        $input_data = array(
            'nomRace' => $request->nomRace
        );

        Race::create($input_data);
   
        return redirect()->route('races.index')
                        ->with('success','La race a été créée avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idRace)
    {
        $data = Race::findOrFail($idRace);
        return view('races.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idRace)
    {
        $data = Race::findOrFail($idRace);
        return view('races.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idRace)
    {
        $request->validate([
            'nomRace' => 'required',
        ]);

        $input_data = array(
            'nomRace' => $request->nomRace
        );
  
        Race::whereIdrace($idRace)->update($input_data);
  
        return redirect()->route('races.index')
                        ->with('success','Mise à jour de la race réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idRace)
    {
        $data = Race::findOrFail($idRace);
        $data->delete();
  
        return redirect()->route('races.index')
                        ->with('error','La race est supprimée avec succès !');
    }
}
