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
                'prixTotale' => 15000,
            ],
            [
                'commande_id' => 4,
                'bouteille_id' => 2,
                'prixTotale' => 12000,
            ],
            [
                'commande_id' => 1,
                'bouteille_id' => 3,
                'prixTotale' => 25000,
            ],
            [
                'commande_id' => 3,
                'bouteille_id' => 4,
                'prixTotale' => 17000,
            ],
            
        ];
        foreach ($venteLaits as $key => $value) {
            VenteLait::create($value);
        }
    }
}
