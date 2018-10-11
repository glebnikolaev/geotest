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

Route::group(['prefix' => '/v1', 'namespace' => 'Api\V1', 'as' => 'api.'], function () {
    Route::get('places', 'PlacesController@index');
    Route::get('find/{query}', 'PlacesController@find');
    Route::post('places', 'PlacesController@store');
    Route::delete('places/{id}', 'PlacesController@destroy');
});
