<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\House;
use App\Models\Person;
use Faker;
use Illuminate\Database\Eloquent\Factories\Factory;

class PeopleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create();
        $houses = House::all()->pluck('id')->toArray();

        for ($i=0; $i < 20; $i++){
            Person::create([
                'first_name' => $faker->firstName($gender = null),
                'last_name' => $faker->lastName,
                'age' => rand(1,100),
                'house_id' => $faker->randomElement($houses)
            ]);
    }
    }
}