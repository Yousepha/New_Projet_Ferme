<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Periode;

class PeriodeSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $periodes = [
            [
                'nomPeriode' => "lactation",
                'phase' => "gestant",
            ],
            // [
            //     'nomPeriode' => "tarissement",
            //     'phase' => "non gestant",
            // ],
            
        ];
        foreach ($periodes as $key => $value) {
            Periode::create($value);
        }
    }
}
