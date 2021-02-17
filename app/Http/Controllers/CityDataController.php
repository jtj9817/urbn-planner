<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;
use App\Models\Car;
use App\Models\Person;
use App\Models\Street;
use App\Models\House;
use Illuminate\Support\Facades\DB;

class CityDataController extends Controller
{
    //Use this API controller for custom API requests that doesn't fit
    //the usual CRUD API patterns

    //Fetch all ppl living in the city: List of people living in an city
    public function getCityPeople(Request $request){
    /* QUERY STRUCTURE: 
        SELECT  Cities.name AS "City Name", Streets.name AS "Street Name",  Houses.address, CONCAT(People.first_name, " ", People.last_name) AS "Person"
        FROM Cities
        JOIN Streets ON Streets.city_id=Cities.id
        JOIN Houses ON Houses.street_id=Streets.id
        JOIN People ON People.house_id=Houses.id
        WHERE Cities.name = "Goyettemouth"
        LIMIT 10;
    */
        $city_name = $request->city_name;
        $cityPeople = DB::table('cities')
                        ->join('streets', 'cities.id', '=', 'streets.city_id')
                        ->join('houses', 'streets.id', '=', 'houses.street_id')
                        ->join('people', 'houses.id', '=', 'people.house_id')
                        ->select('cities.name as City Name', 
                        'streets.name as Street Name', 
                        'houses.address as House Address',
                        'people.first_name as First Name',
                        'people.last_name as Last Name',
                        'people.age as Age'
                        )
                        ->where('cities.name', '=', $city_name)
                        ->limit(10)
                        ->get();

        return response($cityPeople, 200);
    }

    //Fetch all cars when providing a particular street name:
    public function getCars(Request $request){
        $street_name = $request->street_name;
        $cars = DB::table('streets')
                        ->join('houses', 'streets.id', '=', 'houses.street_id')
                        ->join('cars', 'houses.id','=', 'cars.house_id')
                        ->select('streets.name as Street Name', 
                        'cars.license_plate as License Plate'
                        )
                        ->where('streets.name', '=', $street_name)
                        ->limit(10)
                        ->get();
        return response($cars, 200);
    }

    //Fetch the owners of a vehicle when providing a license plate.
    public function getVehicleOwners(Request $request){
        $license_plate = $request->license_plate;
        echo($license_plate);
        $household = DB::table('cars')
                        ->join('houses', 'cars.house_id', '=', 'houses.id')
                        ->join('people', 'people.house_id', '=', 'houses.id')
                        ->select(
                            'people.first_name as Owner First Name',
                            'people.last_name as Owner Last Name',
                            'cars.license_plate as License Plate',
                            'houses.address as Address'
                        )
                        ->where('cars.license_plate', '=', $license_plate)
                        ->limit(5)
                        ->get();
        //$household = DB::table
        return response($household, 200);
    }

    //Fetch the full address and street of a house when providing a person's name
    public function getHouseDetails(Request $request){
        $first_name = $request->first_name;
        $last_name = $request->last_name;
        $age = $request->age;
        $owners = DB::table('people')
                        ->join('houses', 'people.house_id', '=', 'houses.id')
                        ->join('streets', 'houses.street_id', '=', 'streets.id')
                        ->join('cities', 'streets.city_id', '=', 'cities.id')
                        ->select(
                        'people.first_name as First Name',
                        'people.last_name as Last Name',
                        'houses.address as Address',
                        'streets.name as Street Name',
                        'cities.name as City'
                        )
                        ->where('people.first_name', '=', $first_name)
                        ->where('people.last_name', '=', $last_name)
                        ->where('people.age', '=', $age)
                        ->limit(1)
                        ->get();
        return response($owners, 200);
    }
}