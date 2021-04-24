<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StockLait;
use App\Models\Bouteille;
use DB;

class BouteilleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::table('bouteilles')
        ->join('stock_laits', 'stock_laits.idStock', '=', 'bouteilles.stock_id')
        ->select('*')
        ->paginate(5);

        $stock = DB::table('stock_laits')->get();
        
        return view('bouteilles.index',compact('data', 'stock'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {       
        $data = DB::table('bouteilles')
        ->join('stock_laits', 'stock_laits.idStock', '=', 'bouteilles.stock_id')
        ->select('*')
        ->paginate(5);

        $stock = DB::table('stock_laits')->get();
        if((count($stock) > 0) && ($stock[0]->quantiteDispo > 0)){
            return view('bouteilles.create');
        }
        else{
            return redirect()->route('bouteilles.index',compact('data', 'stock'))
            ->with('error', 'le stock de lait est vide! Veuillez enregistrer une traite pour continuer');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $stock_id = DB::select("SELECT idStock from stock_laits where stock_laits.idStock = 1");

        $request->validate([
            'capacite' => 'required|integer|unique:bouteilles',
            'nombreDispo' => 'required|integer',
            'prix' => 'required|integer',
            'description' => 'required|string',
            'photo'   =>  'required|image|max:2048',
        ]);

        $photo = $request->file('photo');
        $new_name = rand() . '.' . $photo->getClientOriginalExtension();
        $photo->move(public_path('images'), $new_name);
        // dd($new_name);

        $input_data = array(
            'stock_id' => $stock_id[0]->idStock,
            'capacite' => $request->capacite,
            'photo'   =>   $new_name,
            'description' => $request->description,
            'prix' => $request->prix,
            'nombreDispo' => $request->nombreDispo,
        );

        
        $stock_dispo = $request->capacite * $request->nombreDispo;
        
        /* code relatif au stock */
        $stock = DB::select("SELECT * from stock_laits where idStock = 1");
        /**Je Vérifie si la quantité dispo dans le stock est supérieur a la quantié dans les bouteilles*/
        if($stock[0]->quantiteDispo >= $stock_dispo ){
            
            $input_stock = array(
                'quantiteDispo' => $stock[0]->quantiteDispo - $stock_dispo,
            );
            
        }
        else{
            return redirect()->route('bouteilles.create')
            ->with('error','La Quantité '.$stock_dispo.' litres de lait saisie est supérieur à celle dans le stock.
            Stock Actuel = '.$stock[0]->quantiteDispo .'Litres');
        }
        
        Bouteille::create($input_data);
        StockLait::whereidstock(1)->update($input_stock);
        /* end code */
        
        return redirect()->route('bouteilles.index')
                        ->with('success','Le Bouteille a été ajouté avec succès!.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($idBouteille)
    {
        $arr['bouteilles'] = Bouteille::findOrFail($idBouteille);
        
        $arr['stock_laits'] = DB::select("SELECT * from bouteilles, stock_laits
        where stock_laits.idStock = bouteilles.stock_id
        and bouteilles.idBouteille = $idBouteille");

        return view('bouteilles.show')->with($arr);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($idBouteille)
    {
        $arr['data'] = Bouteille::findOrFail($idBouteille);
        
        // $arr['stock_laits'] = DB::select("SELECT * from bouteilles, stock_laits
        // where stock_laits.idStock = bouteilles.stock_id
        // and bouteilles.idBouteille = $idBouteille");

        return view('bouteilles.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idBouteille)
    {
        $bouteille = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $idBouteille");
        $capacite = $bouteille[0]->capacite;
        $nombreDispo = $bouteille[0]->nombreDispo;
        $stock_ancien = $capacite * $nombreDispo;

        $request->validate([
            'capacite' => 'required|integer',
            'nombreDispo' => 'required|integer',
            'prix' => 'required|integer',
            'description' => 'required|string',
        ]);

        $image_name = $request->hidden_image;
        $photo = $request->file('photo');

        if($photo != '')  // here is the if part when you dont want to update the image required
        {
            // unlink(public_path('images').'/'.$image_name);

            $request->validate([
                'photo'   =>  'image|max:2048'
            ]);
            
            $image_name = rand() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('images'), $image_name);
        }
        else  // this is the else part when you dont want to update the image not required
        {
            
        }
        
        /* code relatif au stock */
        
        // je récupère la quantité anciennement retirée ($stock_ancien) dans le stock pour l'ajouter avant de faire la modification
        $stock = DB::select("SELECT * from stock_laits, bouteilles where idStock = 1 and bouteilles.idBouteille = $idBouteille");
        $stock_dispo_a_ajouter = $stock[0]->quantiteDispo + $stock_ancien;
        
        if($stock_dispo_a_ajouter >= ($request->capacite * $request->nombreDispo) ){

            $input_stock = array(
                'quantiteDispo' => $stock_dispo_a_ajouter - ($request->capacite * $request->nombreDispo),
            );
            
        }
        else{
            return redirect()->route('bouteilles.edit', $idBouteille)
            ->with('error','La Quantité '.$request->capacite * $request->nombreDispo.' litres de lait saisie est supérieur à celle dans le stock.
            Stock Actuel = '.$stock_dispo_a_ajouter.'Litre(s)');
        }

        $input_data = array(
            'capacite' => $request->capacite,
            'nombreDispo' => $request->nombreDispo,
            'photo'   =>   $image_name,
            'description' => $request->description,
            'prix' => $request->prix,
        );

        StockLait::whereidstock(1)->update($input_stock);

        Bouteille::whereidbouteille($idBouteille)->update($input_data);

        return redirect()->route('bouteilles.index')
        ->with('success','Mise à jour de la Bouteille réussie !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($idBouteille)
    {
        $data = Bouteille::findOrFail($idBouteille);
        
        $bouteille = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $idBouteille");
        $capacite = $bouteille[0]->capacite;
        $nombreDispo = $bouteille[0]->nombreDispo;
        $stock_ancien = $capacite * $nombreDispo;
        
        /**ICI je récupère la quantité anciennement retirer dans le stock pour la remettre à sa place en l'ajoutant*/
        $stock = DB::select("SELECT * from stock_laits, bouteilles where idStock = 1 and bouteilles.idBouteille = $idBouteille");
        $stock_dispo_a_ajouter = $stock[0]->quantiteDispo + $stock_ancien;
        
        $input_stock = array(
            'quantiteDispo' => $stock_dispo_a_ajouter,
        );
        
        StockLait::whereidstock(1)->update($input_stock);

        $data->delete();

        return redirect()->route('bouteilles.index')
        ->with('error','La Bouteille est supprimée avec succès !');
    }
}
