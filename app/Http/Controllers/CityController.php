<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getAllCities(){
        return City::all();
    }

    public function getCity($id){

    }

    public function createCity(Request $request){

    }


    public function updateCity(Request $request, $id){

    }

    public function deleteCity($id){

    }
    //
}
