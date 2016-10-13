<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Preffix: /api/
|
*/

Route::group(['namespace' => 'Api'], function()
{
    /*
    |--------------------------------------------------------------------------
    | Exclusive routes for authentication service
    |--------------------------------------------------------------------------
    */
    Route::group(['namespace' => 'Authentication'], function()
    {
        Route::post('/authentication', 'AuthenticationController@authenticate');
        Route::post('/authentication/forgot_password', 'AuthenticationController@forgot_password');

        /*
        |--------------------------------------------------------------------------
        | Routes with required login
        |--------------------------------------------------------------------------
        */
        Route::group(['middleware' => ['jwt.auth']], function()
        {

            Route::put('/authentication/change_password', 'AuthenticationController@change_password');
            Route::post('/authentication/logout', 'AuthenticationController@logout');

            Route::get('/authentication/refresh_token', 'AuthenticationController@refresh_token');
        });
    });

    /*
    |--------------------------------------------------------------------------
    | Routes for exercises service
    |--------------------------------------------------------------------------
    */
    Route::delete('/exercises/{id}', 'ExercisesController@destroy');
    Route::put('/exercises/{id}', 'ExercisesController@update');
    Route::get('/exercises/{id}', 'ExercisesController@show');
    Route::post('/exercises', 'ExercisesController@store');
    Route::get('/exercises', 'ExercisesController@index');
});