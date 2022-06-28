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
                'role'     => 10,
                'bio'      => $faker->realText(),
            ]);

        for ($i = 1; $i <= 10 ; $i++) {
            array_push($data, [
                'name'     => $faker->name(),
                'email'    => $faker->email,
                'password' => bcrypt('12345678'),
                'role'     => 0,
                'bio'      => $faker->realText(),
            ]);
        }

        User::insert($data);
    }
}
