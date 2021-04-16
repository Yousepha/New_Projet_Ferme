<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bovin;
use App\Models\VenteBovin;
use App\Models\Commande;
use DB;

class VenteBovinController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('bovins')
        ->where('bovins.situation','en vente')
        ->select('*')
        ->paginate(5);
        
        return view('ventebovins.index',compact('data'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bovins = Bovin::all()->where('situation','pas en vente');
        
        return view('ventebovins.create',compact('bovins'));    
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
            'prix' => 'required|integer',
            'description' => 'required|string',
            'photo'   =>  'required|image|max:2048',
            'bovin_id' => 'unique:vente_bovins',
        ]);
        
        $photo = $request->file('photo');
        
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);

        $image_bovin = array(
            'photo'   =>   $new_name,
            'description' => $request->description,
            'prix' => $request->prix,
            'situation' => "en vente",
        );

        Bovin::whereidbovin($request->bovin_id)->update($image_bovin);
        
        return redirect()->route('ventebovins.index')
                        ->with('success','La vente du bovin a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBovin)
    {
        $arr['data'] = Bovin::findOrFail($idBovin);

        return view('ventebovins.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id-
     * @return \Illuminate\Http\Response
     */
    public function edit($idBovin)
    {
        $data = Bovin::findOrFail($idBovin);
// dd($data->nom);
        return view('ventebovins.edit', compact('data'));    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBovin)
    {
        $request->validate([
            'prix' => 'required|integer',
            'description' => 'required|string',
        ]);       
        
        $image_name = $request->hidden_image;
        $photo = $request->file('photo');

        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'photo'   =>  'image|max:2048'
            ]);
            
            $image_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $image_name);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            
        }
        
        $image_bovin = array(
            'photo'   =>   $image_name,
            'description' => $request->description,
            'prix' => $request->prix,
        );

        Bovin::whereidbovin($idBovin)->update($image_bovin);
        
        return redirect()->route('ventebovins.index')
                        ->with('success','Mise à jour de la vente de bovin réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBovin)
    {
        $hors_ligne = array(
            'situation' => "pas en vente",
        );
        Bovin::whereidbovin($idBovin)->update($hors_ligne);
        
        return redirect()->route('ventebovins.index')
        ->with('error','La vente du bovin est supprimée avec succès !');
    }
}
