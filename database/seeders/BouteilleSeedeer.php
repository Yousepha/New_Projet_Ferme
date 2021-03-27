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

            ],
            [
                'stock_id' => 2,
                'capacite' => 5,
                'photo' => '',

            ],
            [
                'stock_id' => 3,
                'capacite' => 10,
                'photo' => '',

            ],            
        ];
        foreach ($bouteilles as $key => $value) {
            Bouteille::create($value);
        }
    }
}
