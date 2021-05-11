<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockLait;

class StockLaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = StockLait::latest()->paginate(5);
        return view('stocklaits.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('stocklaits.create');
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

        StockLait::create($input_data);
   
        return redirect()->route('stocklaits.index')
                        ->with('success','La race a été créée avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idStock)
    {
        $data = StockLait::findOrFail($idStock);
        return view('stocklaits.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idStock)
    {
        $data = StockLait::findOrFail($idStock);
        return view('stocklaits.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nomRace' => 'required',
        ]);

        $input_data = array(
            'nomRace' => $request->nomRace
        );
  
        StockLait::whereidstock($idStock)->update($input_data);
  
        return redirect()->route('stocklaits.index')
                        ->with('success','Mise à jour du stock de lait réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idStock)
    {
        $data = StockLait::findOrFail($idStock);
        $data->delete();
  
        return redirect()->route('stocklaits.index')
                        ->with('error','Le stock de lait est supprimée avec succès !');
    }
}
