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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



Route::post('auth', 'HomeController@auth');



Route::group(['middleware' => 'father'], function () {
    Route::group(['middleware' => 'admin'], function () {

        Route::group(['prefix' => 'dispatcher'], function () {

            Route::post('create', 'Admin\AdminController@store');
            Route::post('update', 'Admin\AdminController@update');
            Route::post('delete', 'Admin\AdminController@delete');
            Route::post('list', 'Admin\AdminController@index');

        });

        Route::group(['prefix' => 'farm'], function () {

            Route::post('create', 'FarmController@store');
            Route::post('update', 'FarmController@update');
            Route::post('list', 'FarmController@index');
            Route::post('read/{id}', 'FarmController@show');
            Route::post('delete', 'FarmController@delete');


            Route::group(['prefix' => 'point'], function () {

                Route::post('create', 'FarmPointController@store');
                Route::post('update', 'FarmPointController@update');
                Route::post('delete/{id}', 'FarmPointController@delete');
                Route::post('list', 'FarmPointController@index');
                Route::post('sender', 'FarmPointController@sender');
                Route::post('receiver', 'FarmPointController@receiver');
                Route::post('read/{id}', 'FarmPointController@show');

            });

        });


        Route::group(['prefix' => 'driver'], function () {

            Route::post('create', 'DriverController@store');
            Route::post('update', 'DriverController@update');
            Route::post('delete/{id}', 'DriverController@delete');
            Route::post('list', 'DriverController@index');
            Route::post('read/{id}', 'DriverController@show');
            Route::post('setStatus/{id}', 'DriverController@show');

        });



    });
});



