<?php

namespace Database\Seeders;
use App\Models\User;

use Illuminate\Database\Seeder;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = [
            [
                'nom'=>'Admin',
                'prenom' => 'Modou',
                'adresse' => 'Fatick',
                'telephone' => 785262632,
                'login'=>'Admin',
                'email'=>'admin@gmail.com',
                'est_admin'=>'1',
                'est_fermier'=>'0',
                'password'=> bcrypt('adminlogin'),
            ],
            [
                'nom'=>'Fermier',
                'prenom' => 'Fallou',
                'telephone' => 778523132,
                'adresse' => 'Diourbel',
                'login'=>'Fermier',
                'email'=>'fermier@gmail.com',
                'profile' => 'fermier',
                'est_admin'=>'0',
                'est_fermier'=>'1',
                'password'=> bcrypt('fermierlogin'),
            ],
            [
               'nom'=>'User',
               'prenom' => 'Badou',
               'telephone' => 765262562,
               'adresse' => 'Dakar',
               'login'=>'User',
               'email'=>'user01@gmail.com',
               'profile' => 'client',
               'est_admin'=>'0',
               'est_fermier'=>'0',
               'password'=> bcrypt('userlogin'),
            ],
        ];

        foreach ($user as $key => $value) {
            User::create($value);
        }
    }
}
