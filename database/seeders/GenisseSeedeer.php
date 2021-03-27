<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Genisse;

class GenisseSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genisses = [
            [
                'idBovin' => 1,
                'codeBovin' => "GEN-1",
                'dateIA' => '2020-02-01',
                'phase' => "gestant",
            ],
            // [
            //     'codeBovin' => "GEN-2",
            //     'dateIA' => '2020-12-01',
            //     'phase' => "non gestant",
            // ],
            // [
            //     'codeBovin' => "GEN-3",
            //     'dateIA' => '2021-04-01',
            //     'phase' => "gestant",
            // ],
            // [
            //     'codeBovin' => "GEN-4",
            //     'dateIA' => '2021-05-01',
            //     'phase' => "non gestant",
            // ],
            
        ];
        foreach ($genisses as $key => $value) {
            Genisse::create($value);
        }
    }
}
