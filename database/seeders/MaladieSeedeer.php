<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Maladie;

class MaladieSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $maladies = [
            [
                'nomMaladie' => "Coryza gangreneux",
            ],
            [
                'nomMaladie' => "Rhinotrachéite infectieuse bovine(IBR)",
            ],
            [
                'nomMaladie' => "Salmonellose",
            ],
            [
                'nomMaladie' => "Charbon bactéridien",
            ],
            
        ];
        foreach ($maladies as $key => $value) {
            Maladie::create($value);
        }
    }
}
