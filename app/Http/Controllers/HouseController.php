<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\House;

class HouseController extends Controller
{
    public function getAllHouses(){
        $houses = House::all()->toJson(JSON_PRETTY_PRINT);
        return response($houses, 200);
    }

    public function getHouse($id){
        if (House::where('id', $id)->exists()){
            $house = House::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($house, 200);
        }
        else{
            return response()->json([
                "message" => "House not found"
            ], 404);
        }
    }

    public function createHouse(Request $request){
        $house = new House;
        $house->address = $request->address;
        $house->save();

        return response()->json([
            "message" => "House successfully created!",
        ], 200);
    }


    public function updateHouse(Request $request, $id){
        if (House::where('id', $id)->exists()){
            $house = House::find($id);
            $house->address = is_null($request->address) ? $house->address : $request->address;
            $house->save();
            
            return response()->json([
                "message" => "House object successfully updated!"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "House not found"
            ], 404);
        }
    }

    public function deleteHouse($id){
       if (House::where('id', $id)->exists()){
           $house = House::find($id);
           $house->delete();
           
           return response()->json([
               "message" => "House object successfully deleted!"
           ], 202);
       }
        else{
            return response()->json([
                "message" => "House not found"
            ], 404);
        }
    }
    
}
