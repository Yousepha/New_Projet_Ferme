<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admin;

class AdminSeedeer extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admins = [
            [
                'user_id' => 1,
            ],           
        ];
        foreach ($admins as $key => $value) {
            Admin::create($value);
        }
    }
}
