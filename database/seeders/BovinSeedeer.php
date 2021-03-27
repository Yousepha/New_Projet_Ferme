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
                'codeBovin' => "GEN-1",
                'nom' => "vanita",
                'photo' => '1615449202.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2018-01-01',
                'geniteur' => "tabi",
                'genitrice' => "érata",
                'etat' => "Mort",
            ],
            [
                'race_id' => 2,
                'codeBovin' => "TAU-1",
                'nom' => "davita",
                'photo' => '569464204.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2019-02-01',
                'geniteur' => "safi",
                'genitrice' => "lafita",
                'etat' => "Mort",
            ],
            [
                'race_id' => 3,
                'codeBovin' => "VAC-1",
                'nom' => "awi",
                'photo' => '118092197.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2018-02-05',
                'geniteur' => "tabi",
                'genitrice' => "fasala",
                'etat' => "Vivant",
            ],
            [
                'race_id' => 2,
                'codeBovin' => "VEA-1",
                'nom' => "félawi",
                'photo' => '118092197.jpg',
                'etatDeSante' => "Malade",
                'dateNaissance' => '2014-10-04',
                'geniteur' => "tési",
                'genitrice' => "fanita",
                'etat' => "Vivant",
            ],
            [
                'race_id' => 1,
                'codeBovin' => "VEL-1",
                'nom' => "baki",
                'photo' => '1095823693.jpg',
                'etatDeSante' => "Sain",
                'dateNaissance' => '2015-12-06',
                'geniteur' => "gari",
                'genitrice' => "téssia",
                'etat' => "Vivant",
            ],
        ];
        foreach ($bovins as $key => $value) {
            Bovin::create($value);
        }
    }
}
