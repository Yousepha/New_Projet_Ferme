<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Type;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Type::latest()->paginate(5);
        return view('types.index',compact('data'))->with('i',(request()->input('page',1)-1)*5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('types.create');
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
            'nomType' => 'required|unique:types',
        ]);

        $input_data = array(
            'nomType' => $request->nomType
        );

        Type::create($input_data);
   
        return redirect()->route('types.index')
                        ->with('success','Le Type de dépenses a été créé avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idType)
    {
        $data = Type::findOrFail($idType);
        return view('types.show',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idType)
    {
        $data = Type::findOrFail($idType);
        return view('types.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idType)
    {
        $request->validate([
            'nomType' => 'required|unique:types',
        ]);

        $input_data = array(
            'nomType' => $request->nomType
        );
  
        Type::whereIdtype($idType)->update($input_data);
  
        return redirect()->route('types.index')
                        ->with('success','Mise à jour du Type de dépense réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idType)
    {
        $data = Type::findOrFail($idType);
        $data->delete();
  
        return redirect()->route('types.index')
                        ->with('error','Le Type de dépenses est supprimé avec succès !');
    }
}
