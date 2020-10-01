<?php

use Illuminate\Http\Request;

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


// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();    
    
// });


Route::post('register',"Auth\Api\APIRegisterController@register");
Route::post('login',"Auth\Api\APILoginController@login");



 

Route::middleware('jwt.auth')->get('/users', function (Request $request) {
    return auth()->user();    
    
});


Route::group(['middleware' => ['ChangeLanguage','jwt.auth']], function () {
    Route::get('cars/{local}', 'API\CarController@index');

    Route::post('typescars','API\TypesCarsController@index');  
    Route::post('car/store/{TypesCars}','API\CarController@store');
    Route::post('car/update/{TypesCars}/{id}','API\CarController@update');
    Route::delete('car/delete/{id}','API\CarController@destroy');
    Route::get('governorates','API\TripController@governorates');
    Route::get('cities/{id}','API\TripController@cities');
    Route::get('carstrip','API\TripController@cars');
});

