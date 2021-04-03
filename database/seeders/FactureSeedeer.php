<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Facture;

class FactureSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factures = [
            [
                'montant' => 785200,
                'datePaiement' => '2020-01-05',
                'moyenDePaiement' => 'Wari',
                'commande_id' => 1,
            ],
            [
                'montant' => 512880,
                'datePaiement' => '2020-02-05',
                'moyenDePaiement' => 'Orange Money',
                'commande_id' => 2,            
            ],
            [
                'montant' => 825656,
                'datePaiement' => '2020-03-05',
                'moyenDePaiement' => 'Wave',
                'commande_id' => 3,            
            ],
            [
                'montant' => 562222,
                'datePaiement' => '2020-04-05',
                'moyenDePaiement' => 'Tigo Cash',
                'commande_id' => 4,            
            ],
            
        ];
        foreach ($factures as $key => $value) {
            Facture::create($value);
        }    
    }
}
