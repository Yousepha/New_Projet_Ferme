<?php

namespace App\Http\Controllers\Shop;

use Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;

class CartController extends Controller
{
    //Ajouter un produit au panier

    public function add(Request $request){

        // $request->validate([
        //     'bovin_id' => 'unique:vente_bovins'
        // ]);

        $vaches =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idV 
        and vente_bovins.bovin_id = $request->idV and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $vaches[0]->idBovin, // inique row ID
            'name' => $vaches[0]->nom,
            'price' => $vaches[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$vaches[0]->photo) //'size'=>$request->size, 
        ));

        return redirect(route('cart_index'));
    }
    public function addTaureau(Request $request){

        $taureaux =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idT 
        and vente_bovins.bovin_id = $request->idT and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $taureaux[0]->idBovin, // inique row ID
            'name' => $taureaux[0]->nom,
            'price' => $taureaux[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$taureaux[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addGenisse(Request $request){

        $genisses =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idG 
        and vente_bovins.bovin_id = $request->idG and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $genisses[0]->idBovin, // inique row ID
            'name' => $genisses[0]->nom,
            'price' => $genisses[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$genisses[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addVeau(Request $request){

        $veaux =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVea 
        and vente_bovins.bovin_id = $request->idVea and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $veaux[0]->idBovin, // inique row ID
            'name' => $veaux[0]->nom,
            'price' => $veaux[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$veaux[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addVelle(Request $request){

        $velles =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVel 
        and vente_bovins.bovin_id = $request->idVel and  bovins.idBovin = vente_bovins.bovin_id");
        
        Cart::add(array(
            'id' => $velles[0]->idBovin, // inique row ID
            'name' => $velles[0]->nom,
            'price' => $velles[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$velles[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addBouteille(Request $request){

        $bouteilles = DB::select("SELECT * from vente_laits, bouteilles where bouteilles.idBouteille = $request->idB 
        and vente_laits.bouteille_id = $request->idB and bouteilles.idBouteille = vente_laits.bouteille_id");

        $lastOne = DB::table('bovins')->latest('idBovin')->first();
        // dd($lastOne->idBovin);
        Cart::add(array(
            'id' => $lastOne->idBovin + $bouteilles[0]->idBouteille, // inique row ID
            'name' => $bouteilles[0]->description,
            'price' => $bouteilles[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$bouteilles[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    // le contenu du panier
    public function index(){

        $content =  Cart::getContent();
        // dd($content);

        $total_prix_panier = Cart::getTotal();
        return view('cart.index',compact('content', 'total_prix_panier'));
    }

    //Code Client
    public function addVacheClient(Request $request){

        $vaches =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idV 
        and vente_bovins.bovin_id = $request->idV and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $vaches[0]->idBovin, // inique row ID
            'name' => $vaches[0]->nom,
            'price' => $vaches[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$vaches[0]->photo) //'size'=>$request->size, 
        ));

        return redirect(route('cart_index'));
    }
    public function addTaureauClient(Request $request){

        $taureaux =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idT 
        and vente_bovins.bovin_id = $request->idT and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $taureaux[0]->idBovin, // inique row ID
            'name' => $taureaux[0]->nom,
            'price' => $taureaux[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$taureaux[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addGenisseClient(Request $request){

        $genisses =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idG 
        and vente_bovins.bovin_id = $request->idG and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $genisses[0]->idBovin, // inique row ID
            'name' => $genisses[0]->nom,
            'price' => $genisses[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$genisses[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addVeauClient(Request $request){

        $veaux =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVea 
        and vente_bovins.bovin_id = $request->idVea and  bovins.idBovin = vente_bovins.bovin_id");

        Cart::add(array(
            'id' => $veaux[0]->idBovin, // inique row ID
            'name' => $veaux[0]->nom,
            'price' => $veaux[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$veaux[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addVelleClient(Request $request){

        $velles =DB::select("SELECT * from vente_bovins, bovins where bovins.idBovin = $request->idVel 
        and vente_bovins.bovin_id = $request->idVel and  bovins.idBovin = vente_bovins.bovin_id");
        
        Cart::add(array(
            'id' => $velles[0]->idBovin, // inique row ID
            'name' => $velles[0]->nom,
            'price' => $velles[0]->prixBovin,
            'quantity' => 1,//$request->qty,
            'attributes' => array('photo'=>$velles[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addBouteilleClient(Request $request){

        $bouteilles = DB::select("SELECT * from vente_laits, bouteilles where bouteilles.idBouteille = $request->idB 
        and vente_laits.bouteille_id = $request->idB and bouteilles.idBouteille = vente_laits.bouteille_id");

        $lastOne = DB::table('bovins')->latest('idBovin')->first();
        // dd($lastOne->idBovin);
        Cart::add(array(
            'id' => $lastOne->idBovin + $bouteilles[0]->idBouteille, // inique row ID
            'name' => $bouteilles[0]->description,
            'price' => $bouteilles[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$bouteilles[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function indexClient(){

        $content =  Cart::getContent();
        // dd($content);

        $total_prix_panier = Cart::getTotal();
        return view('cart.clients.index',compact('content', 'total_prix_panier'));
    }
}
