<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Bovin;

class BovinSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bovins = [
            [
                'race_id' => 1,
                'codeBovin' => "GEN-00",
                'nom' => "vanita",
                'photo' => '1615449202.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2018-01-01',
                'geniteur' => "tabi",
                'genitrice' => "érata",
                'prix' => 286100,
                'etat' => "Mort",
                'situation' => "en vente"
            ],
            [
                'race_id' => 2,
                'codeBovin' => "TAU-00",
                'nom' => "davita",
                'photo' => '569464204.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2019-02-01',
                'geniteur' => "safi",
                'genitrice' => "lafita",
                'prix' => 289600,
                'etat' => "Mort",
                'situation' => "en vente"
            ],
            [
                'race_id' => 3,
                'codeBovin' => "VAC-00",
                'nom' => "awi",
                'photo' => '118092197.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2018-02-05',
                'geniteur' => "tabi",
                'genitrice' => "fasala",
                'prix' => 257600,
                'etat' => "Vivant",
                'situation' => "en vente"
            ],
            [
                'race_id' => 2,
                'codeBovin' => "VEA-00",
                'nom' => "félawi",
                'photo' => '118092197.jpg',
                'etatDeSante' => "Malade",
                'dateNaissance' => '2014-10-04',
                'geniteur' => "tési",
                'genitrice' => "fanita",
                'prix' => 268000,
                'etat' => "Vivant",
                'situation' => "pas en vente"
            ],
            [
                'race_id' => 1,
                'codeBovin' => "VEL-00",
                'nom' => "baki",
                'photo' => '1095823693.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2015-12-06',
                'geniteur' => "gari",
                'prix' => 253600,
                'genitrice' => "téssia",
                'etat' => "Vivant",
                'situation' => "pas en vente"
            ],
        ];
        foreach ($bovins as $key => $value) {
            Bovin::create($value);
        }
    }
}
