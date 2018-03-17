<?php

use App\Agencies;
use App\Professions;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::truncate();

        $faker = \Faker\Factory::create();

        // Let's make sure everyone has the same password and 
        // let's hash it before the loop, or else our seeder 
        // will be too slow.
        $password = Hash::make('password');
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.admin',
            'password' => $password,
            'admin' => '1',
            'agency' => "admin",
            'professions' => "admin",
            'phone' => "admin",
            'avatar' => "avatar.png"
        ]);
        // And now let's generate a few dozen users for our app:
        for ($i = 0; $i < 3; $i++) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => $password,
				'admin' => '0',
                'agency' => Agencies::inRandomOrder()->first()->name,
                'professions' => Professions::inRandomOrder()->first()->profession,
                'phone' => $faker->phoneNumber,
                'avatar' => "avatar.png"
            ]);
        }
    }
}
