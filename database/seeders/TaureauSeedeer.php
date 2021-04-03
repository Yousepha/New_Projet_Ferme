<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Taureau;

class TaureauSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $taureaux = [
            [
                'idBovin' => 2,
                'codeBovin' => "TAU-00",
            ],
            // [
            //     'codeBovin' => "TAU-2",
            // ],
            // [
            //     'codeBovin' => "TAU-3",
            // ],
            // [
            //     'codeBovin' => "TAU-4",
            // ],
            
        ];
        foreach ($taureaux as $key => $value) {
            Taureau::create($value);
        }
    }
}
