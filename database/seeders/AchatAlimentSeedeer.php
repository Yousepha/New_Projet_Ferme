<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\AchatAliment;

class AchatAlimentSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $achatAliments = [
            [
                'admin_id' => 1,
                'nomAliment' => "Betamin - 20L",
                'quantite' => 400,
                'montant' => 500000,
                'dateAchatAliment' => '2021-02-01',
            ],
            [
                'admin_id' => 1,
                'nomAliment' => "Vitalac",
                'quantite' => 570,
                'montant' => 185000,
                'dateAchatAliment' => '2021-02-04',
            ],
            [
                'admin_id' => 1,
                'nomAliment' => "herbe",
                'quantite' => 600,
                'montant' => 150000,
                'dateAchatAliment' => '2021-02-05',
            ],
            [
                'admin_id' => 1,
                'nomAliment' => "Minamag - Farine",
                'quantite' => 700,
                'montant' => 1500000,
                'dateAchatAliment' => '2021-02-06',
            ],
            [
                'admin_id' => 1,
                'nomAliment' => "tourteau de soja",
                'quantite' => 300,
                'montant' => 150000,
                'dateAchatAliment' => '2021-02-06',
            ]
        ];
        foreach ($achatAliments as $key => $value) {
            AchatAliment::create($value);
        }
    }
}
