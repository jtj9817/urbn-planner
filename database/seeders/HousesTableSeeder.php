<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Street;
use App\Models\House;
use Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class HousesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $streets = Street::all()->pluck('id')->toArray();

        for ($i=0; $i < 20; $i++){
            House::create([
                'address' => $faker->unique()->streetAddress,
                'street_id' => $faker->randomElement($streets)
            ]);
        }
        
    }
}
