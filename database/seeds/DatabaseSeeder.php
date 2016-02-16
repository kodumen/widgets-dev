<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();

        for ($i = 0; $i < 100; $i++) {
            \App\User::create([
                'name' => $faker->userName,
                'email' => $faker->email,
                'password' => bcrypt($faker->password()),
            ]);
        }
    }
}
