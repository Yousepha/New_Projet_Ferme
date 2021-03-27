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
        $data = DB::table('vente_bovins')
        ->join('bovins', 'bovins.idBovin', '=', 'vente_bovins.bovin_id')
        // ->join('commandes', 'commandes.idCom','=','vente_bovins.commande_id')
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
        $bovins = Bovin::all();

        $commandes = Commande::all();
        
        return view('ventebovins.create',compact('bovins', 'commandes'));    
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
            'dateVenteBovin' => 'required|date',
            'prixBovin' => 'required|integer',
            'description' => 'required|string',
            'photo'   =>  'required|image|max:2048',
            'bovin_id' => 'unique:vente_bovins'
        ]);

        $input_data = array(
            'bovin_id' => $request->bovin_id,
            'commande_id' => $request->idCom,
            'prixBovin' => $request->prixBovin,
            'dateVenteBovin' => $request->dateVenteBovin,
            'description' => $request->description,
        );
        

        VenteBovin::create($input_data);
        
        $photo = $request->file('photo');
        
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);

        $image_bovin = array(
            'photo'   =>   $new_name,
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
    public function show($idVenteBovin)
    {
        $arr['data'] = VenteBovin::findOrFail($idVenteBovin);
        
        $arr['bovins'] = DB::select("SELECT * from vente_bovins, bovins
        where bovins.idBovin = vente_bovins.bovin_id
        and vente_bovins.idVenteBovin = $idVenteBovin");

        // $arr['commandes'] = DB::select("SELECT * from vente_bovins, commandes
        // where commandes.idCom = vente_bovins.commande_id
        // and vente_bovins.idVenteBovin = $idVenteBovin");


        return view('ventebovins.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idVenteBovin)
    {
        $arr['data'] = VenteBovin::findOrFail($idVenteBovin);
        
        $arr['bovins'] = DB::select("SELECT * from vente_bovins, bovins
        where bovins.idBovin = vente_bovins.bovin_id
        and vente_bovins.idVenteBovin = $idVenteBovin");
        
        // $arr['commandes'] = DB::select("SELECT * from vente_bovins, commandes
        // where vente_bovins.idVenteBovin = $idVenteBovin");


        return view('ventebovins.edit')->with($arr);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idVenteBovin)
    {
        $request->validate([
            'dateVenteBovin' => 'required|date',
            'prixBovin' => 'required|integer',
            'description' => 'required|string',
        ]);

        $input_data = array(
            'bovin_id' => $request->bovin_id,
            'commande_id' => $request->idCom,
            'prixBovin' => $request->prixBovin,
            'dateVenteBovin' => $request->dateVenteBovin,
            'description' => $request->description,
        );

        VenteBovin::whereidventebovin($idVenteBovin)->update($input_data);        
        
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
        );

        Bovin::whereidbovin($request->bovin_id)->update($image_bovin);
        
        return redirect()->route('ventebovins.index')
                        ->with('success','Mise à jour de la vente de bovin réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idVenteBovin)
    {
        $bovins = DB::select("SELECT * from vente_bovins, bovins
        where bovins.idBovin = vente_bovins.bovin_id
        and vente_bovins.idVenteBovin = $idVenteBovin");

        $data = VenteBovin::findOrFail($idVenteBovin);
        // unlink(public_path('images').'/'.$bovins[0]->photo);

        $data->delete();
        
        return redirect()->route('ventebovins.index')
        ->with('error','La vente du bovin est supprimée avec succès !');
    }
}
