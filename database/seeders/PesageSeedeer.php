<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Pesage;

class PesageSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pesages = [
            [
                'bovin_id' => 1,
                'datePesee' => '2020-02-01',
                'poids' => 5.5,
            ],
            [
                'bovin_id' => 2,
                'datePesee' => '2020-12-01',
                'poids' => 2.3,
            ],
            [
                'bovin_id' => 3,
                'datePesee' => '2021-04-01',
                'poids' => 10,
            ],
            [
                'bovin_id' => 2,
                'datePesee' => '2021-05-01',
                'poids' => 10,
            ],
            
        ];
        foreach ($pesages as $key => $value) {
            Pesage::create($value);
        }
    }
}
