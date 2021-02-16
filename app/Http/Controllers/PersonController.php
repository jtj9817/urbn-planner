<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Person;

class PersonController extends Controller
{    
    public function getAllPErsons(){
        $people = Person::all()->toJson(JSON_PRETTY_PRINT);
        return response($people, 200);
    }

    public function getPerson($id){
        if (Person::where('id', $id)->exists()){
            $person = Person::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($person, 200);
        }
        else{
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }
    }

    public function createPerson(Request $request){
        $person = new Person;
        $person->first_name = $request->first_name;
        $person->last_name = $request->last_name;
        $person->age = $request->age;
        $person->save();

        return response()->json([
            "message" => "Person successfully created!",
        ], 200);
    }


    public function updatePerson(Request $request, $id){
        if (Person::where('id', $id)->exists()){
            $person = Person::find($id);
            $person->first_name = is_null($request->first_name) ? $person->first_name : $request->first_name;
            $person->last_name = is_null($request->last_name) ? $person->last_name : $request->last_name;
            $person->age = is_null($request->age) ? $person->age : $request->age;
            $person->save();
            
            return response()->json([
                "message" => "Person object successfully updated!"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }
    }

    public function deletePerson($id){
       if (Person::where('id', $id)->exists()){
           $person = Person::find($id);
           $person->delete();
           
           return response()->json([
               "message" => "Person object successfully deleted!"
           ], 202);
       }
        else{
            return response()->json([
                "message" => "Person not found"
            ], 404);
        }   
    }    
}
