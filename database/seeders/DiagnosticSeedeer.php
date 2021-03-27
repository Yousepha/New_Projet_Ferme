<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Diagnostic;

class DiagnosticSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $diagnostics = [
            [
                'bovin_id' => 1,
                'maladie_id' => 1,
                'dateMaladie' => '2020-01-05',
                'dateGuerison' => '2020-11-08',
            ],
            [
                'bovin_id' => 2,
                'maladie_id' => 1,
                'dateMaladie' => '2020-05-02',
                'dateGuerison' => '2020-07-04',
            ],
            [
                'bovin_id' => 3,
                'maladie_id' => 2,
                'dateMaladie' => '2020-01-01',
                'dateGuerison' => '2020-10-02',
            ],            
        ];
        foreach ($diagnostics as $key => $value) {
            Diagnostic::create($value);
        }
    }
}
