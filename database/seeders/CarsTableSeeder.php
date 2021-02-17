<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Person;
use App\Models\Car;
use Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $people = Person::all()->pluck('id')->toArray();

        for ($i=0; $i < 20; $i++){
            Car::create([
                'license_plate' => $faker->unique()->word,
                'brand' => $faker->company,
                'color' => $faker->safeColorName,
                'person_id' => $faker->unique()->randomElement($people)
            ]);
        }
    }
}
