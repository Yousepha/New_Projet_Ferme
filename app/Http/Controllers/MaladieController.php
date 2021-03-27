<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maladie;

class MaladieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Maladie::latest()->paginate(5);
        return view('maladies.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maladies.create');
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
            'nomMaladie' => 'required',
        ]);

        $input_data = array(
            'nomMaladie' => $request->nomMaladie
        );

        Maladie::create($input_data);
   
        return redirect()->route('maladies.index')
                        ->with('success','La maladie a été créée avec succès!.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idMaladie)
    {
        $data = Maladie::findOrFail($idMaladie);
        return view('maladies.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idMaladie)
    {
        $data = Maladie::findOrFail($idMaladie);
        return view('maladies.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idMaladie)
    {
        $request->validate([
            'nomMaladie' => 'required',
        ]);

        $input_data = array(
            'nomMaladie' => $request->nomMaladie
        );
  
        Maladie::whereIdmaladie($idMaladie)->update($input_data);
  
        return redirect()->route('maladies.index')
                        ->with('success','Mise à jour de la maladie réussie !');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idMaladie)
    {
        $data = Maladie::findOrFail($idMaladie);
        $data->delete();
  
        return redirect()->route('maladies.index')
                        ->with('error','La maladie est supprimée avec succès !');

    }
}
