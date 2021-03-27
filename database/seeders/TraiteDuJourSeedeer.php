<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\TraiteDuJour;

class TraiteDuJourSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $traiteDuJours = [
            [
                'productionLait_id' => 1,
                'fermier_id' => 2,
                'dateTraite' => '2020-02-01',
                'traiteMatin' => 150,
                'traiteSoir' => 250,
            ],
            [
                'productionLait_id' => 2,
                'fermier_id' => 2,
                'dateTraite' => '2020-12-01',
                'traiteMatin' => 300,
                'traiteSoir' => 315,
            ],
            [
                'productionLait_id' => 3,
                'fermier_id' => 2,
                'dateTraite' => '2021-04-01',
                'traiteMatin' => 400,
                'traiteSoir' => 450,
            ],
            [
                'productionLait_id' => 2,
                'fermier_id' => 2,
                'dateTraite' => '2021-05-01',
                'traiteMatin' => 150,
                'traiteSoir' => 250,
            ],
            
        ];
        foreach ($traiteDuJours as $key => $value) {
            TraiteDuJour::create($value);
        }
    }
}
