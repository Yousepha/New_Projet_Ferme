<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Race;

class RaceSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $races = [
            [
                'nomRace' => "Angus",
            ],
            [
                'nomRace' => "Holstein",
            ],
            [
                'nomRace' => "Simmental",
            ],
            [
                'nomRace' => "Limousine",
            ],
            
        ];
        foreach ($races as $key => $value) {
            Race::create($value);
        }
    }
}
