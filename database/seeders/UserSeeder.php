<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        $data = [];

            array_push($data, [
                'name'     => 'Super Admin',
                'email'    => 'superadmin@pak-dosen.test',
                'password' =>'$2a$15$Ehes7LY6ngeG5pujiP3b9.3GIerhJUHOdn2vowtu/T//yoOTThbWG',
                'username'=>'superadmin',

            ]);


        User::insert($data);
    }
}
