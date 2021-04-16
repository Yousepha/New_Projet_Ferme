<?php

namespace App\Http\Controllers;

use Cart;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Facture;
use DB;

class AdresseLivraisonController extends Controller
{
    public function index(){
        $content =  Cart::getContent();

        if(count($content) > 0){
            $total_prix_panier = Cart::getTotal();
            return view('shop.clients.adresse_livraison',compact('content', 'total_prix_panier'));
        }
        else{
            return view('shop.clients.commande_vide');
        }
    }
    
    public function store(Request $request)
    {
        $id_user = auth()->user()->id;
        $user_id = DB::select("SELECT id from users where users.id = $id_user");
        
        $request->validate([
            'adresse' => 'required|string',
        ]);
            
        $input_data = array(
            'adresse' => $request->adresse,
        );
        
        $frais = $request->frais * 100;
        $total_prix_panier = $frais + Cart::getTotal();
        
        User::whereid($user_id[0]->id)->update($input_data);

        return view('shop.clients.paiement',compact('frais','total_prix_panier'));
    }

}
