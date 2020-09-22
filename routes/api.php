<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::namespace('Api')->group(function() {
    Route::apiResource('clients', 'ClientsController');
    Route::get('clients/{client}/plans', 'ClientsController@showPlans');
    Route::post('clients/{client}/plan', 'ClientsController@addPlan');
    Route::delete('clients/{client}/plan', 'ClientsController@removePlan');
});
