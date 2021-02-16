<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\City;

class CityController extends Controller
{
    public function getAllCities(){
        $cities = City::all()->toJson(JSON_PRETTY_PRINT);
        return response($cities, 200);
    }

    public function getCity($id){
        if (City::where('id', $id)->exists()){
            $city = City::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($city, 200);
        }
        else{
            return response()->json([
                "message" => "City not found"
            ], 404);
        }
    }

    public function createCity(Request $request){
        $city = new City;
        $city->name = $request->name;
        $city->save();

        return response()->json([
            "message" => "City successfully created!",
        ], 200);
    }

    public function updateCity(Request $request, $id){
        if (City::where('id', $id)->exists()){
            $city = City::find($id);
            $city->name = is_null($request->name) ? $city->name : $request->name;
            $city->save();
            
            return response()->json([
                "message" => "City object successfully updated!"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "City not found"
            ], 404);
        }
    }

    public function deleteCity($id){
       if (City::where('id', $id)->exists()){
           $city = City::find($id);
           $city->delete();
           
           return response()->json([
               "message" => "City object successfully deleted!"
           ], 202);
       }
        else{
            return response()->json([
                "message" => "City not found"
            ], 404);
        }
    }
}
