<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ProductionLait;

class ProductionLaitSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $productionLaits = [
            [
                'bovin_id' => 3,
            ],
            // [
            //     'bovin_id' => 2,
            // ],
            // [
            //     'bovin_id' => 3,
            // ],
            // [
            //     'bovin_id' => 4,
            // ],
            
        ];
        foreach ($productionLaits as $key => $value) {
            ProductionLait::create($value);
        }
    }
}
