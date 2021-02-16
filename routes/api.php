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
Route::get('cities', 'CityController@getAllCities');
Route::get('cities/{id}', 'CityController@getCity');
Route::post('cities', 'CityController@createCity');
Route::put('cities/{id}', 'CityController@updateCity');
Route::delete('cities/{id}', 'CityController@deleteCity');

//Street Routes
Route::get('streets', 'StreetController@getAllstreets');
Route::get('streets/{id}', 'StreetController@getStreet');
Route::post('streets', 'StreetController@createStreet');
Route::put('streets/{id}', 'StreetController@updateStreet');
Route::delete('streets/{id}', 'StreetController@deleteStreet');

//House Routes
Route::get('houses', 'HouseController@getAllHouses');
Route::get('houses/{id}', 'HouseController@getHouse');
Route::post('houses', 'HouseController@createHouse');
Route::put('houses/{id}', 'HouseController@updateHouse');
Route::delete('houses/{id}', 'HouseController@deleteHouse');

//Person Routes 
Route::get('person', 'PersonController@getAllPersons');
Route::get('person/{id}', 'PersonController@getPerson');
Route::post('person', 'PersonController@createPerson');
Route::put('person/{id}', 'PersonController@updatePerson');
Route::delete('person/{id}', 'PersonController@deletePerson');

//Car Routes
Route::get('cars', 'CarController@getAllCars');
Route::get('cars/{id}', 'CarController@getCar');
Route::post('cars', 'CarController@createCar');
Route::put('cars/{id}', 'CarController@updateCar');
Route::delete('cars/{id}', 'CarController@deleteCar');

//CityData Routes 
Route::get('getCityPeople/{city_name}', 'CityDataController@getCityPeople');
Route::get('getCars/{street_name}', 'CityDataController@getCars');
Route::get('getVehiclerOwner/{license_plate}', 'CityDataController@getVehicleOwners');
Route::get('getHouseDetails/{first_name}/{last_name}/{age}', 'CityDataController@getHouseDetails');