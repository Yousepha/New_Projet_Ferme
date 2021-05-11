<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bouteille;

class BouteilleSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bouteilles = [
            [
                'stock_id' => 1,
                'capacite' => 1,
                'photo' => '',
                'prix' => 2500,
                'nombreDispo' => 50,
                'description' => 'description du lait frais',
            ],
            [
                'stock_id' => 2,
                'capacite' => 5,
                'photo' => '',
                'prix' => 1500,
                'nombreDispo' => 20,
                'description' => 'description du lait',
            ],
            [
                'stock_id' => 3,
                'capacite' => 10,
                'photo' => '',
                'prix' => 3500,
                'nombreDispo' => 10,
                'description' => 'description du lait',
            ],            
        ];
        foreach ($bouteilles as $key => $value) {
            Bouteille::create($value);
        }
    }
}
