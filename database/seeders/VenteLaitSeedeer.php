<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VenteLait;

class VenteLaitSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venteLaits = [
            [
                'commande_id' => 5,
                'bouteille_id' => 1,
                'prixBouteille' => 15000,
                'nbrBouteille' => 12,
                'description' => "Bouteille de 20L de lait frais"
            ],
            [
                'commande_id' => 4,
                'bouteille_id' => 2,
                'prixBouteille' => 12000,
                'nbrBouteille' => 10,
                'description' => "Bouteille de 10L de lait frais"
            ],
            [
                'commande_id' => 1,
                'bouteille_id' => 3,
                'prixBouteille' => 25000,
                'nbrBouteille' => 15,
                'description' => "Bouteille de 5L de lait frais"
            ],
            [
                'commande_id' => 3,
                'bouteille_id' => 4,
                'prixBouteille' => 17000,
                'nbrBouteille' => 5,
                'description' => "Bouteille de 15L de lait frais"
            ],
            
        ];
        foreach ($venteLaits as $key => $value) {
            VenteLait::create($value);
        }
    }
}
