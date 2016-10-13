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

    /*
    |--------------------------------------------------------------------------
    | Routes for plans service
    |--------------------------------------------------------------------------
    */
    Route::delete('/plans/{id}', 'PlansController@destroy');
    Route::put('/plans/{id}', 'PlansController@update');
    Route::get('/plans/{id}', 'PlansController@show');
    Route::post('/plans', 'PlansController@store');
    Route::get('/plans', 'PlansController@index');

    /*
    |--------------------------------------------------------------------------
    | Routes for plan_days service
    |--------------------------------------------------------------------------
    */
    Route::delete('/plan_days/{id}', 'PlanDaysController@destroy');
    Route::put('/plan_days/{id}', 'PlanDaysController@update');
    Route::get('/plan_days/{id}', 'PlanDaysController@show');
    Route::post('/plan_days', 'PlanDaysController@store');
    Route::get('/plan_days', 'PlanDaysController@index');

    /*
    |--------------------------------------------------------------------------
    | Routes for users service
    |--------------------------------------------------------------------------
    */
    Route::put('/users/{id}/plans', 'UsersController@update_plans');
    Route::delete('/users/{id}', 'UsersController@destroy');
    Route::put('/users/{id}', 'UsersController@update');
    Route::get('/users/{id}', 'UsersController@show');
    Route::post('/users', 'UsersController@store');
    Route::get('/users', 'UsersController@index');
});