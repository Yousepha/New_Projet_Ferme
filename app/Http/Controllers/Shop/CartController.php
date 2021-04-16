<?php

namespace App\Http\Controllers\Shop;

use Cart;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Facture;
use App\Models\Bovin;
use App\Models\VenteBovin;
use App\Models\Bouteille;
use App\Models\VenteLait;
use App\Models\Commande;
use DB;

class CartController extends Controller
{
    //Ajouter un produit au panier

    public function add(Request $request){

        $request->validate([
            'qty' => 'required|numeric|min:1|max:1'
        ]);

        $vaches =DB::select("SELECT * from bovins where bovins.idBovin = $request->idV");

        Cart::add(array(
            'id' => $vaches[0]->idBovin, 
            'name' => $vaches[0]->description,
            'price' => $vaches[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$vaches[0]->photo)
        ));

        return redirect(route('cart_index'));
    }

    public function update(Request $request, $idu){

        $lastOne = DB::table('bovins')->latest('idBovin')->first();
        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod <= $lastOne->idBovin){
                if($request->qty === 1){

                }else{
                    return back()
                    ->with('error','vous ne pouvez pas augmenter la quantité ('. $request->qty .') ');
                }
                
            }else{
                $bouteille = DB::select("SELECT * from bouteilles where idBouteille = ($prod - $lastOne->idBovin)");

                if($request->qty <= $bouteille[0]->nombreDispo){
                    $input_bouteille = array(
                        'nombreDispo' => $bouteille[0]->nombreDispo - $request->qty,
                    );
                }else{
                    return back()
                    ->with('error','La Quantité de bouteilles ('. $request->qty .') saisie est supérieur à celle dans le stock.
                    Stock Actuel = '.$bouteille[0]->nombreDispo.' bouteille(s)');
                }
                Bouteille::whereidbouteille(($prod - $lastOne->idBovin))->update($input_bouteille);
            }
        }

        Cart::update($idu, array(
            'quantity' => array(
                'relative' => false ,
                'value' => $request->qty
           ),
        ));
        
        return back()
        ->with('success','Produit modifié avec succès !');
    }

    public function destroy($idr){
        Cart::remove($idr);
        return back()
        ->with('error','Produit supprimé avec succès !');
    }


    public function addTaureau(Request $request){
        
        $request->validate([
            'qty' => 'required|integer|max:1'
        ]);

        $taureaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idT");

        Cart::add(array(
            'id' => $taureaux[0]->idBovin, 
            'name' => $taureaux[0]->description,
            'price' => $taureaux[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$taureaux[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addGenisse(Request $request){

        $genisses =DB::select("SELECT * from bovins where bovins.idBovin = $request->idG");

        Cart::add(array(
            'id' => $genisses[0]->idBovin, 
            'name' => $genisses[0]->description,
            'price' => $genisses[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$genisses[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addVeau(Request $request){

        $veaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVea");

        Cart::add(array(
            'id' => $veaux[0]->idBovin, 
            'name' => $veaux[0]->description,
            'price' => $veaux[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$veaux[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addVelle(Request $request){

        $velles =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVel");
        
        Cart::add(array(
            'id' => $velles[0]->idBovin, 
            'name' => $velles[0]->description,
            'price' => $velles[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$velles[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    public function addBouteille(Request $request){

        $bouteilles = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $request->idB");

        $lastOne = DB::table('bovins')->latest('idBovin')->first();

        Cart::add(array(
            'id' => $lastOne->idBovin + $bouteilles[0]->idBouteille, 
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

        $total_prix_panier = Cart::getTotal();
        return view('cart.index',compact('content', 'total_prix_panier'));
    }

    //Code Client
    public function addVacheClient(Request $request){

        $vaches =DB::select("SELECT * from bovins where bovins.idBovin = $request->idV");

        Cart::add(array(
            'id' => $vaches[0]->idBovin, 
            'name' => $vaches[0]->description,
            'price' => $vaches[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$vaches[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function addTaureauClient(Request $request){

        $taureaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idT");

        Cart::add(array(
            'id' => $taureaux[0]->idBovin, 
            'name' => $taureaux[0]->description,
            'price' => $taureaux[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$taureaux[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function addGenisseClient(Request $request){

        $genisses =DB::select("SELECT * from bovins where bovins.idBovin = $request->idG");

        Cart::add(array(
            'id' => $genisses[0]->idBovin, 
            'name' => $genisses[0]->description,
            'price' => $genisses[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$genisses[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function addVeauClient(Request $request){

        $veaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVea");

        Cart::add(array(
            'id' => $veaux[0]->idBovin, 
            'name' => $veaux[0]->description,
            'price' => $veaux[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$veaux[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function addVelleClient(Request $request){

        $velles =DB::select("SELECT * from bovins where bovins.idBovin = $request->idVel");
        
        Cart::add(array(
            'id' => $velles[0]->idBovin, 
            'name' => $velles[0]->description,
            'price' => $velles[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$velles[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function addBouteilleClient(Request $request){

        $bouteille = DB::select("SELECT * from bouteilles where idBouteille = $request->idB");
        $bout_dispo = $bouteille[0]->nombreDispo;
        
        $request->validate([
            'qty' => 'required|numeric|min:1|max:'.$bout_dispo.''
        ]);

        $bouteilles = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $request->idB");

        $lastOne = DB::table('bovins')->latest('idBovin')->first();

        Cart::add(array(
            'id' => $lastOne->idBovin + $bouteilles[0]->idBouteille,
            'name' => $bouteilles[0]->description,
            'price' => $bouteilles[0]->prix,
            'quantity' => $request->qty,
            'attributes' => array('photo'=>$bouteilles[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function indexClient(){

        $content =  Cart::getContent();
        
        $total_prix_panier = Cart::getTotal();
        return view('cart.clients.index',compact('content', 'total_prix_panier'));
    }

    public function indexCommande(Request $request){
        $date_actu = \Carbon\Carbon::now()->format('y.m.d');

        $id_user = auth()->user()->id;

        $input_com = array(
            'client_id' => $id_user,
            'dateCom' => $date_actu,
        );
        $com = Commande::create($input_com);

        $input_fact = array(
            'commande_id' => $com->idCom,
            'montant' => $request->montant,
            'moyenDePaiement' => $request->moyenDePaiement,
            'datePaiement' => $date_actu,
        );

        Facture::create($input_fact);
        $lastOne = DB::table('bovins')->latest('idBovin')->first();

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod <= $lastOne->idBovin){
                $input_vente_bovin = array(
                    'bovin_id' => $prod,
                    'commande_id' => $com->idCom,
                    'prixBovin' => $produit->price,
                );

                VenteBovin::create($input_vente_bovin);
                $input_bovin = array(
                    'situation' => "vendu",
                );
                Bovin::whereidbovin($prod)->update($input_bovin);
        
            }
            else{

                $input_vente_lait = array(
                    'bouteille_id' => $prod - $lastOne->idBovin,
                    'commande_id' => $com->idCom,
                    'prixTotale' => $produit->price * $produit->quantity,
                    'nbrBouteilleVendu' => $produit->quantity,
                );
                VenteLait::create($input_vente_lait);
                $bouteille = DB::select("SELECT * from bouteilles where idBouteille = ($prod - $lastOne->idBovin)");

                if($produit->quantity <= $bouteille[0]->nombreDispo){
                    $input_bouteille = array(
                        'nombreDispo' => $bouteille[0]->nombreDispo - $produit->quantity,
                    );
                }else{
                    return redirect()->route('cart_index_client')
                    ->with('error','La Quantité de bouteilles'. $produit->quantity .' saisie est supérieur à celle dans le stock.
                    Stock Actuel = '.$bouteille[0]->nombreDispo.' boutelle(s)');
                }
                Bouteille::whereidbouteille(($prod - $lastOne->idBovin))->update($input_bouteille);
            }
        }
        
        if(count($content) > 0){
            $total_prix_panier = $request->montant;
            $moyen_pay = $request->moyenDePaiement;
            $frais = $request->frais;
            Cart::clear();

            return view('shop.clients.commande_confirm',compact('content', 'total_prix_panier', 'moyen_pay', 'frais'));
        }
        else{
            return view('shop.clients.commande_vide');
        }

    }

}
