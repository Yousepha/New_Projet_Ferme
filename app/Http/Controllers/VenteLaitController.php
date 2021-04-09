<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Bouteille;
use App\Models\VenteLait;
use App\Models\Commande;
use DB;

class VenteLaitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('vente_laits')
        ->join('bouteilles', 'bouteilles.idBouteille', '=', 'vente_laits.bouteille_id')
        // ->join('commandes', 'commandes.idCom','=','vente_laits.commande_id')
        ->select('*')
        ->paginate(5);
        
        return view('ventelaits.index',compact('data'));    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bouteilles = Bouteille::all();

        $commandes = Commande::all();
        
        return view('ventelaits.create',compact('bouteilles', 'commandes'));    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $prixUnitBouteille = DB::select("SELECT prix from bouteilles where idBouteille = $request->bouteille_id");
        // dd( );
        // $prixTotal = $prixUnitBouteille[0]->prix * $nbrDispo[0]->nombreDispo;
        $request->validate([
            'nombreDispo' => 'required|integer',
            'prix' => 'required|integer',
            'description' => 'required|string',
            'enLigne' => 'required|string',
            'capacite' => 'required',
            'photo'   =>  'required|image|max:2048',   
            'bouteille_id'   =>  'required|unique:vente_laits'   
        ]);
        
        $nbrDispo = DB::select("SELECT * from bouteilles where idBouteille = $request->bouteille_id");

        $photo = $request->file('photo');
        
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);

        if($request->nombreDispo <= $nbrDispo[0]->nombreDispo){
            
            $image_bouteille = array(
                'photo'   =>   $new_name,
                'description' => $request->description,
                'prix' => $request->prix,
                'nombreDispo' => $nbrDispo[0]->nombreDispo - $request->nombreDispo,
            );

        }
        else{
            return redirect()->route('ventelaits.create')
                ->with('error','Le nombre de bouteilles de lait '.$nbrDispo[0]->capacite .' litre(s) saisie est supérieur à celle dans le stock.
                 Stock Actuel = '.$nbrDispo[0]->nombreDispo .' Bouteille(s)');
        }

        $prixTotal = $request->prix * $request->nombreDispo;
        
        $input_data = array(
            'enLigne' => $request->enLigne,
            'prixTotale' =>  $prixTotal,
            // 'description' => $request->description,
            'bouteille_id' => $request->bouteille_id,
            'nbrBouteilleVendu' => $request->nombreDispo,
            'commande_id' => $request->idCom,
        );

        VenteLait::create($input_data);
              
        Bouteille::whereidbouteille($request->bouteille_id)->update($image_bouteille);
        
        return redirect()->route('ventelaits.index')
                        ->with('success','La vente de lait a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idVenteLait)
    {
        $arr['data'] = VenteLait::findOrFail($idVenteLait);
        
        $arr['bouteilles'] = DB::select("SELECT * from vente_laits, bouteilles
        where bouteilles.idBouteille = vente_laits.bouteille_id
        and vente_laits.idVenteLait = $idVenteLait");

        // $arr['commandes'] = DB::select("SELECT * from vente_laits, commandes
        // where commandes.idCom = vente_laits.commande_id
        // and vente_laits.idVenteLait = $idVenteLait");


        return view('ventelaits.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idVenteLait)
    {
        $arr['data'] = VenteLait::findOrFail($idVenteLait);
        
        $arr['bouteilles'] = DB::select("SELECT * from vente_laits, bouteilles
        where bouteilles.idBouteille = vente_laits.bouteille_id
        and vente_laits.idVenteLait = $idVenteLait");
        // dd($arr['bouteilles']);
        
        // $arr['commandes'] = DB::select("SELECT * from vente_laits, commandes
        // where vente_laits.idVenteLait = $idVenteLait");


        return view('ventelaits.edit')->with($arr);    
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idVenteLait)
    {
        // $prixUnitBouteille = DB::select("SELECT prix from bouteilles where idBouteille = $request->bouteille_id");
        // $prixTotal_ancien = DB::select("SELECT prixTotale from vente_laits, bouteilles where vente_laits.bouteille_id = bouteilles.idBouteille");
        // $prixTotal_ancien_maj = $prixTotal_ancien[0]->prixTotale;

        $nbr_vendu = DB::select("SELECT * from vente_laits where vente_laits.idVenteLait = $idVenteLait");

        $nbrDispo_ancien = $nbr_vendu[0]->nbrBouteilleVendu;
        // dd($nbrDispo_ancien);

        $request->validate([
            'nombreDispo' => 'required|integer',
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
        
        $nbrDispo = DB::select("SELECT * from bouteilles where idBouteille = $request->bouteille_id");
        
        $nbrBouteille_total = $nbrDispo[0]->nombreDispo + $nbrDispo_ancien;

        if($request->nombreDispo <= $nbrBouteille_total){
            
            $image_bouteille = array(
                'photo'   =>   $image_name,
                'description' => $request->description,
                'prix' => $request->prix,
                'nombreDispo' => $nbrBouteille_total - $request->nombreDispo,
            );
        }
        else{
            return redirect()->route('ventelaits.edit', $idVenteLait)
                ->with('error','Le nombre de bouteilles de lait '.$nbrDispo[0]->capacite .' litre(s) saisie est supérieur à celle dans le stock.
                 Stock Actuel = '. $nbrBouteille_total .' Bouteille(s)');
        }

        $prixTotal = $request->prix * $request->nombreDispo;
        
        $input_data = array(
            'enLigne' => $request->enLigne,
            'prixTotale' => $prixTotal,
            // 'description' => $request->description,
            'nbrBouteilleVendu' => $request->nombreDispo,
            'bouteille_id' => $request->bouteille_id,
            'commande_id' => $request->idCom,
        );

        VenteLait::whereidventelait($idVenteLait)->update($input_data);        

        Bouteille::whereidbouteille($request->bouteille_id)->update($image_bouteille);
        
        return redirect()->route('ventelaits.index')
                        ->with('success','Mise à jour de la vente de lait réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idVenteLait)
    {
        $bouteilles = DB::select("SELECT * from vente_laits, bouteilles
        where bouteilles.idBouteille = vente_laits.bouteille_id
        and vente_laits.idVenteLait = $idVenteLait");

        $data = VenteLait::findOrFail($idVenteLait);
        unlink(public_path('images').'/'.$bouteilles[0]->photo);

        
        $nbr_vendu = DB::select("SELECT * from vente_laits where vente_laits.idVenteLait = $idVenteLait");
        $nbrDispo_ancien = $nbr_vendu[0]->nbrBouteilleVendu;        
        $nbrBouteille_total = $bouteilles[0]->nombreDispo + $nbrDispo_ancien;

        $image_bouteille = array(
            'nombreDispo' => $nbrBouteille_total
        );

        Bouteille::whereidbouteille($bouteilles[0]->bouteille_id)->update($image_bouteille);
        $data->delete();
        
        return redirect()->route('ventelaits.index')
        ->with('error','La vente de lait est supprimée avec succès !');
    }
}
