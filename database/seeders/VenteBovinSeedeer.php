<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\VenteBovin;

class VenteBovinSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $venteBovins = [
            [
                'bovin_id' => 5,
                'commande_id' => 1,
                'dateVenteBovin' => '2020-02-01',
                'prixBovin' => 1500000,
            ],
            [
                'bovin_id' => 4,
                'commande_id' => 2,
                'dateVenteBovin' => '2020-11-01',
                'prixBovin' => 1800000,
            ],
            [
                'bovin_id' => 1,
                'commande_id' => 3,
                'dateVenteBovin' => '2021-04-01',
                'prixBovin' => 2500000,
            ],
            [
                'bovin_id' => 3,
                'commande_id' => 2,
                'dateVenteBovin' => '2021-05-01',
                'prixBovin' => 1700000,
            ],
            
        ];
        foreach ($venteBovins as $key => $value) {
            VenteBovin::create($value);
        }
    }
}
