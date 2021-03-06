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

Route::middleware('api')->group(function(){

    Route::post('rating', 'RatingController@store');

    Route::get('uri/{uri}', function($uri){
        return \App\Uri::where('uri', $uri)->first();
    });

});
