<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Car;
use App\Models\Person;
use App\Models\Street;
use App\Models\House;

class CityDataController extends Controller
{
    //Use this API controller for custom API requests that doesn't fit
    //the usual CRUD API patterns

    //Fetch all ppl living in the city: List of people living in an city
    public function getCityPeople($city_name){
        $cityPeople = DB::table('cities')
                        ->where('name', $city_name)
                        ->get();
    }

    //Fetch all cars when providing a particular street name:
    public function getCars($street_name){

    }

    //Fetch the owners of a vehicle when providing a license plate.
    public function getVehicleOwners($license_plate){

    }

    //Fetch the full address and street of a house when providing a person's name
    public function getHouseDetails($first_name, $last_name, $age){

    }
}
