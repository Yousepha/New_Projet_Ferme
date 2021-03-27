<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Commande;

class CommandeSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $commandes = [
            [
                'client_id' => 3,
                'dateCom' => '2020-08-05',
            ],
            [
                'client_id' => 3,
                'dateCom' => '2020-01-10',
            ],
            [
                'client_id' => 3,
                'dateCom' => '2021-11-01',
            ],            
        ];
        foreach ($commandes as $key => $value) {
            Commande::create($value);
        }
    }
}
