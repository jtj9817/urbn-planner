<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Street;
use App\Models\City;
use Faker;
class StreetsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $cities = City::all()->pluck('id')->toArray();

        for ($i=0; $i < 20; $i++){
            Street::create([
                'name' => $faker->streetName,
                'city_id' => $faker->randomElement($cities)
            ]);
        }

    }
}
