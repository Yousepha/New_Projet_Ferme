<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Velle;

class VelleSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $velles = [
            [
                'idBovin' => 5,
                'codeBovin' => "VEL-00",
            ],
            // [
            //     'codeBovin' => "VEL-2",
            // ],
            // [
            //     'codeBovin' => "VEL-3",
            // ],
            // [
            //     'codeBovin' => "VEL-4",
            // ],
            
        ];
        foreach ($velles as $key => $value) {
            Velle::create($value);
        }
    }
}
