<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AlimentationDuJour;

class AlimentationDuJourSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $alimentationDuJours = [
            [
                'fermier_id' => 2,
                'nomAlimentation' => "herbe",
                'quantite' => 200,
                'date' => '2021-02-01',
            ],
            [
                'fermier_id' => 2,
                'nomAlimentation' => "Betamin - 20L",
                'quantite' => 300,
                'date' => '2021-02-01',
            ],
            [
                'fermier_id' => 2,
                'nomAlimentation' => "Vitalac",
                'quantite' => 400,
                'date' => '2021-02-01',
            ],
            [
                'fermier_id' => 2,
                'nomAlimentation' => "Minamag - Farine 25kg",
                'quantite' => 500,
                'date' => '2021-02-01',
            ],
            
        ];
        foreach ($alimentationDuJours as $key => $value) {
            AlimentationDuJour::create($value);
        }
    }
}
