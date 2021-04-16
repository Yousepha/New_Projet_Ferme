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
            
        ];
        foreach ($stockLaits as $key => $value) {
            StockLait::create($value);
        }
    }
}
