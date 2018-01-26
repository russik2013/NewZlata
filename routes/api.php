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

        });




    });
});



