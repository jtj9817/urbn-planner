<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CityController;
use App\Http\Controllers\CityDataController;
use App\Http\Controllers\HouseController;
use App\Http\Controllers\PersonController;
use App\Http\Controllers\StreetController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

//City Routes
Route::get('cities', [CityController::class, 'getallCities']);
Route::get('cities/{id}', [CityController::class, 'getCity']);
Route::post('cities', [CityController::class, 'createCity']);
Route::put('cities/{id}',  [CityController::class,'updateCity']);
Route::delete('cities/{id}',  [CityController::class,'deleteCity']);

//Street Routes
Route::get('streets', [StreetController::class, 'getallCities']);
Route::get('streets/{id}', [StreetController::class, 'getStreet']);
Route::post('streets', [StreetController::class, 'createStreet']);
Route::put('streets/{id}',  [StreetController::class,'updateStreet']);
Route::delete('streets/{id}',  [StreetController::class,'deleteStreet']);

//House Routes
Route::get('houses', [HouseController::class, 'getallCities']);
Route::get('houses/{id}', [HouseController::class, 'getHouse']);
Route::post('houses', [HouseController::class, 'createHouse']);
Route::put('houses/{id}',  [HouseController::class,'updateHouse']);
Route::delete('houses/{id}',  [HouseController::class,'deleteHouse']);

//Person Routes 
Route::get('persons', [PersonController::class, 'getallCities']);
Route::get('persons/{id}', [PersonController::class, 'getPerson']);
Route::post('persons', [PersonController::class, 'createPerson']);
Route::put('persons/{id}',  [PersonController::class,'updatePerson']);
Route::delete('persons/{id}',  [PersonController::class,'deletePerson']);

//Car Routes
Route::get('cars', [CarController::class, 'getallCities']);
Route::get('cars/{id}', [CarController::class, 'getCar']);
Route::post('cars', [CarController::class, 'createCar']);
Route::put('cars/{id}',  [CarController::class,'updateCar']);
Route::delete('cars/{id}',  [CarController::class,'deleteCar']);

//CityData Routes 
Route::get('getCityPeople/{city_name}', [CityDataController::class, 'getCityPeople']);
Route::get('getCars/{street_name}', [CityDataController::class, 'getCars']);
Route::get('getVehiclerOwner/{license_plate}', [CityDataController::class, 'getVehicleOwners']);
Route::get('getHouseDetails/{first_name}/{last_name}/{age}',  [CityDataController::class,'getHouseDetails']);