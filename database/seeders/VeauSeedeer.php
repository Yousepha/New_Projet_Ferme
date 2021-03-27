<?php

namespace Database\Seeders;
use App\Models\Veau;

use Illuminate\Database\Seeder;

class VeauSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $veaux = [
            [
                'idBovin' => 4,
                'codeBovin' => "VEA-1",
            ],
            // [
            //     'codeBovin' => "VEA-2",
            // ],
            // [
            //     'codeBovin' => "VEA-3",
            // ],
            // [
            //     'codeBovin' => "VEA-4",
            // ],
            
        ];
        foreach ($veaux as $key => $value) {
            Veau::create($value);
        }
    }
}
