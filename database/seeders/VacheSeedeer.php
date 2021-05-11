<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Vache;

class VacheSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $vaches = [
            [
                'idBovin' => 3,
                'codeBovin' => "VAC-00",
                'periode_id' => 1,
            ],
            // [
            //     'codeBovin' => "VAC-2",
            //     'periode_id' => 2,
            // ],
            // [
            //     'codeBovin' => "VAC-3",
            //     'periode_id' => 1,
            // ],
            // [
            //     'codeBovin' => "VAC-4",
            //     'periode_id' => 1,
            // ],
            
        ];
        foreach ($vaches as $key => $value) {
            Vache::create($value);
        }
    }
}
