<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Street;

class StreetController extends Controller
{
    public function getAllStreets(){
        $streets = Street::all()->toJson(JSON_PRETTY_PRINT);
        return response($streets, 200);
    }

    public function getStreet($id){
        if (Street::where('id', $id)->exists()){
            $street = Street::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($street, 200);
        }
        else{
            return response()->json([
                "message" => "Street not found"
            ], 404);
        }
    }

    public function createStreet(Request $request){
        $street = new Street;
        $street->name = $request->name;

        $street->save();

        return response()->json([
            "message" => "Street successfully created!",
        ], 200);
    }

    public function updateStreet(Request $request, $id){
        if (Street::where('id', $id)->exists()){
            $street = Street::find($id);
            $street->name = is_null($request->name) ? $street->name : $request->name;
            $street->save();
            
            return response()->json([
                "message" => "Street object successfully updated!"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "Street not found"
            ], 404);
        }
    }

    public function deleteStreet($id){
       if (Street::where('id', $id)->exists()){
           $street = Street::find($id);
           $street->delete();
           
           return response()->json([
               "message" => "Street object successfully deleted!"
           ], 202);
       }
        else{
            return response()->json([
                "message" => "Street not found"
            ], 404);
        }   
    }
}
