<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call(CreateUsersSeeder::class);
        $this->call(AchatBovinSeeder::class);
        $this->call(AdminSeedeer::class);
        $this->call(ClientSeedeer::class);
        $this->call(RaceSeedeer::class);
        $this->call(PeriodeSeedeer::class);
        $this->call(ProductionLaitSeedeer::class);
        $this->call(MaladieSeedeer::class);
        $this->call(StockLaitSeedeer::class);
        $this->call(DiagnosticSeedeer::class);
        $this->call(FermierSeedeer::class);
        $this->call(CommandeSeedeer::class);
        $this->call(BovinSeedeer::class);
        $this->call(BouteilleSeedeer::class);
        $this->call(PesageSeedeer::class);
        $this->call(AutresDepensesSeedeer::class);
        $this->call(AlimentationDuJourSeedeer::class);
        $this->call(AchatAlimentSeedeer::class);
        $this->call(VenteLaitSeedeer::class);
        $this->call(VenteBovinSeedeer::class);
        $this->call(VelleSeedeer::class);
        $this->call(VeauSeedeer::class);
        $this->call(VacheSeedeer::class);
        $this->call(TaureauSeedeer::class);
        $this->call(TraiteDuJourSeedeer::class);
        $this->call(GenisseSeedeer::class);
    }
}
