<?php

use App\City;
use App\Country;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use App\Agencies;

class AgenciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();


        // And now, let's create a few articles in our database:
        for ($i = 0; $i < 3; $i++) {
            $counry = Country::inRandomOrder()->first()->country;
            $city = City::inRandomOrder()->where('country', $counry)->first()->city;

            Agencies::create([
                'name' => $faker->company,
                'address' => $faker->address,
				'city' => $city,
				'countri' => $counry,
				'phone' => $faker->phoneNumber,
				'email' => $faker->email,
				'web' => "www.addadadadad.com",
            ]);
        }
    }
}
