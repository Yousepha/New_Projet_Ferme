<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AutresDepenses;

class AutresDepensesSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $autresDepenses = [
            [
                'admin_id' => 1,
                'dateDepenses' => '2021-02-01',
                'type' => "Sante",
                'libelle' => "Service vétérinaire",
                'montant' => 20000,
            ],
            [
                'admin_id' => 1,
                'dateDepenses' => '2021-10-01',
                'type' => "Alimentation",
                'libelle' => "10 tonnes d'aliments",
                'montant' => 3000000,
            ],
            [
                'admin_id' => 1,
                'dateDepenses' => '2021-10-01',
                'type' => "Achat Vache",
                'libelle' => "2 vaches laitières provenant du mali",
                'montant' => 4000000,
            ],
            [
                'admin_id' => 1,
                'dateDepenses' => '2021-10-01',
                'type' => "Service Technique",
                'libelle' => "réfection des matériels des fermiers",
                'montant' => 5000000,
            ],
            
        ];
        foreach ($autresDepenses as $key => $value) {
            AutresDepenses::create($value);
        }
    }
}
