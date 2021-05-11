<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AchatBovin;

class AchatBovinSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achatBovins = [
            [
                'bovin_id' => 1,
                'admin_id' => 1,
                'montantBovin' => 5000000,
                'dateAchatBovin' => '2021-02-03',
            ],
            [
                'bovin_id' => 2,
                'admin_id' => 1,
                'montantBovin' => 4500000,
                'dateAchatBovin' => '2021-02-03',
            ],
            [
                'bovin_id' => 3,
                'admin_id' => 1,
                'montantBovin' => 8500000,
                'dateAchatBovin' => '2021-02-03',
            ],
            [
                'bovin_id' => 4,
                'admin_id' => 1,
                'montantBovin' => 250000,
                'dateAchatBovin' => '2021-02-03',
            ],
            [
                'bovin_id' => 5,
                'admin_id' => 1,
                'montantBovin' => 200000,
                'dateAchatBovin' => '2021-02-03',
            ]
        ];
        foreach ($achatBovins as $key => $value) {
            AchatBovin::create($value);
        }
        // foreach ($achatBovins as $achatBovin) {
        //     AchatBovin::create(array(
        //         'bovin_id' => $room['bovin_id'],
        //         'admin_id' => $room['admin_id'],
        //         'montantBovin' => $room['montantBovin'],
        //         'dateAchatBovin' => $room['dateAchatBovin'],
        //     ));
        // }
    
    }
}
