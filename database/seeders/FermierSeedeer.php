<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Fermier;

class FermierSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $fermiers = [
            [
                'user_id' => 2,
                'salaire' => 100000,
            ],
            // [
            //     'salaire' => 150000,
            // ],
            // [
            //     'salaire' => 200000,
            // ],            
        ];
        foreach ($fermiers as $key => $value) {
            Fermier::create($value);
        }
    }
}
