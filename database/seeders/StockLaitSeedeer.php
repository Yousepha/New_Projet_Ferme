<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\StockLait;

class StockLaitSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stockLaits = [
            [
                'quantiteTotale' => 100000,
                'quantiteVendue' => 90000,
                'quantiteDispo' => 10000,
            ],
            [
                'quantiteTotale' => 200000,
                'quantiteVendue' => 190000,
                'quantiteDispo' => 10000,
            ],
            [
                'quantiteTotale' => 300000,
                'quantiteVendue' => 180000,
                'quantiteDispo' => 120000,
            ],
            [
                'quantiteTotale' => 400000,
                'quantiteVendue' => 200000,
                'quantiteDispo' => 200000,
            ],
            
        ];
        foreach ($stockLaits as $key => $value) {
            StockLait::create($value);
        }
    }
}
