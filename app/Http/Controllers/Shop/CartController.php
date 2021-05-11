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

        $vaches =DB::select("SELECT * from bovins where bovins.idBovin = $request->idV");
        
        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idV){
            
                return redirect(route('cart_index'))
                ->with('error','La Vache a été déjà ajouté dans le panier !');
            
            }
        }
        
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
               
                
            }else{
                $bouteille = DB::select("SELECT * from bouteilles where idBouteille = ($prod - $lastOne->idBovin)");

                if($request->qty <= $bouteille[0]->nombreDispo){
                    
                }else{
                    return back()
                    ->with('error','Le nombre de bouteilles ('. $request->qty .') saisie est supérieur à celle dans le stock.
                    Stock Actuel = '.$bouteille[0]->nombreDispo.' bouteille(s)');
                }

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

        $taureaux =DB::select("SELECT * from bovins where bovins.idBovin = $request->idT");

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idT){
            
                return redirect(route('cart_index'))
                ->with('error','Le Taureau a été déjà ajouté dans le panier !');
            
            }
        }

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

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idG){
            
                return redirect(route('cart_index'))
                ->with('error','Le Génisse a été déjà ajouté dans le panier !');
            
            }
        }
        
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

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idVea){
            
                return redirect(route('cart_index'))
                ->with('error','Le Veau a été déjà ajouté dans le panier !');
            
            }
        }
        
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
        
        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idVel){
            
                return redirect(route('cart_index'))
                ->with('error','Le Velle a été déjà ajouté dans le panier !');
            
            }
        }
        
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

        $bouteille = DB::select("SELECT * from bouteilles where idBouteille = $request->idB");
        $bout_dispo = $bouteille[0]->nombreDispo;
        
        $request->validate([
            'quantite' => 'required|numeric|min:1|max:'.$bout_dispo.''
        ]);

        $bouteilles = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $request->idB");

        $lastOne = DB::table('bovins')->latest('idBovin')->first();

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;
            $bouteille = DB::select("SELECT * from bouteilles where idBouteille = ($prod - $lastOne->idBovin)");

            if(($produit->quantity + $request->quantite) <= $bouteille[0]->nombreDispo){
                
            }else{
                return redirect()->route('cart_index')
                ->with('error','Le nombre de bouteilles ('. ($produit->quantity + $request->quantite) .') dans le panier est supérieur à celle dans le stock.
                Stock Actuel = '.$bouteille[0]->nombreDispo.' bouteille(s)');
            }
        }

        Cart::add(array(
            'id' => $lastOne->idBovin + $bouteilles[0]->idBouteille, 
            'name' => $bouteilles[0]->description,
            'price' => $bouteilles[0]->prix,
            'quantity' => $request->quantite,
            'attributes' => array('photo'=>$bouteilles[0]->photo) 
        ));

        return redirect(route('cart_index'));
    }

    // le contenu du panier
    public function index(){

        $content =  Cart::getContent();
        $lastOne = DB::table('bovins')->latest('idBovin')->first();
        $lastBovin = $lastOne->idBovin;

        $total_prix_panier = Cart::getTotal();
        return view('cart.index',compact('content', 'total_prix_panier', 'lastBovin'));
    }

    //Code Client
    public function addVacheClient(Request $request){

        $vaches =DB::select("SELECT * from bovins where bovins.idBovin = $request->idV");

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idV){
            
                return redirect(route('cart_index_client'))
                ->with('error','La Vache a été déjà ajouté dans le panier !');
            
            }
        }

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

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idT){
            
                return redirect(route('cart_index_client'))
                ->with('error','Le Taureau a été déjà ajouté dans le panier !');
            
            }
        }

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
        
        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idG){
            
                return redirect(route('cart_index_client'))
                ->with('error','Le Génisse a été déjà ajouté dans le panier !');
            
            }
        }
        
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

        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idVea){
            
                return redirect(route('cart_index_client'))
                ->with('error','Le Veau a été déjà ajouté dans le panier !');
            
            }
        }

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
       
        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;

            if($prod == $request->idVel){
            
                return redirect(route('cart_index_client'))
                ->with('error','Le Velle a été déjà ajouté dans le panier !');
            
            }
        }
        
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
            'quantite' => 'required|numeric|min:1|max:'.$bout_dispo.''
        ]);

        $bouteilles = DB::select("SELECT * from bouteilles where bouteilles.idBouteille = $request->idB");

        $lastOne = DB::table('bovins')->latest('idBovin')->first();
        
        
        $content =  Cart::getContent();
        foreach($content as $produit){
            $prod = $produit->id;
            $bouteille = DB::select("SELECT * from bouteilles where idBouteille = ($prod - $lastOne->idBovin)");
            // dd($request->idB);
            if(($produit->quantity + $request->quantite) <= $bouteille[0]->nombreDispo){
                
            }else{
                return redirect()->route('cart_index_client')
                ->with('error','Le nombre de bouteilles ('. ($produit->quantity + $request->quantite) .') dans le panier est supérieur à celle dans le stock.
                Stock Actuel = '.$bouteille[0]->nombreDispo.' bouteille(s)');
            }
        }

        Cart::add(array(
            'id' => $lastOne->idBovin + $bouteilles[0]->idBouteille,
            'name' => $bouteilles[0]->description,
            'price' => $bouteilles[0]->prix,
            'quantity' => $request->quantite,
            'attributes' => array('photo'=>$bouteilles[0]->photo) 
        ));

        return redirect(route('cart_index_client'));
    }

    public function indexClient(){

        $content =  Cart::getContent();
        $lastOne = DB::table('bovins')->latest('idBovin')->first();
        $lastBovin = $lastOne->idBovin;

        $total_prix_panier = Cart::getTotal();
        return view('cart.clients.index',compact('content', 'total_prix_panier', 'lastBovin'));
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
                    'dateVenteBovin' => $date_actu,
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
            // $frais = $request->frais;
            Cart::clear();

            return view('shop.clients.commande_confirm',compact('content', 'total_prix_panier', 'moyen_pay'));
        }
        else{
            return view('shop.clients.commande_vide');
        }

    }

}
