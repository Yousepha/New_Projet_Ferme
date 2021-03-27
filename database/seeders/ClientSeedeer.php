<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Client;

class ClientSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $clients = [
            [
                'user_id' => 3,
            ],           
        ];
        foreach ($clients as $key => $value) {
            Client::create($value);
        }
    }
}
