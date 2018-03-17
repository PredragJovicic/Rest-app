<?php

use App\City;
use App\Country;
use Illuminate\Database\Seeder;

class CityTableSeeder extends Seeder
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
        for ($i = 0; $i < 50; $i++) {
            City::create([

                'country' => Country::inRandomOrder()->first()->country ,
                'city' => 'City_'.$i

            ]);
        }
    }
}
