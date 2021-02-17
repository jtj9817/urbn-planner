<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;

class CarController extends Controller
{
    public function getAllCars(){
        $cars = Car::all()->toJson(JSON_PRETTY_PRINT);
        return response($cars, 200);
    }

    public function getCar($id){
        if (Car::where('id', $id)->exists()){
            $car = Car::where('id', $id)->get()->toJson(JSON_PRETTY_PRINT);
            return response($car, 200);
        }
        else{
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    public function createCar(Request $request){
        $car = new Car;
        $car->license_plate = $request->license_plate;
        $car->color = $request->color;
        $car->brand = $request->brand;
        $car->house_id = $request->house_id;
        $car->save();

        return response()->json([
            "message" => "Car successfully created!",
        ], 200);
    }


    public function updateCar(Request $request, $id){
        if (Car::where('id', $id)->exists()){
            $car = Car::find($id);
            $car->license_plate = is_null($request->license_plate) ? $car->license_plate : $request->license_plate;
            $car->color = is_null($request->color) ? $car->color : $request->color;
            $car->brand = is_null($request->brand) ? $car->brand : $request->brand;
            $car->house_id = is_null($request->house_id) ? $car->house_id : $request->house_id;
            $car->save();
            
            return response()->json([
                "message" => "Car object successfully updated!"
            ], 200);
        }
        else{
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }

    public function deleteCar($id){
       if (Car::where('id', $id)->exists()){
           $car = Car::find($id);
           $car->delete();
           
           return response()->json([
               "message" => "Car object successfully deleted!"
           ], 202);
       }
        else{
            return response()->json([
                "message" => "Car not found"
            ], 404);
        }
    }
}
