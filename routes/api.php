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

Route::group(['middleware' => 'auth:api'], function()
{
    /* -*- RESOURCES -*- */
    Route::resource(
        '/book',
        'Api\BookController',
        ['only' => [
            'index',
            'show'
        ]]
    );
    Route::resource(
        '/collection',
        'Api\CollectionController',
        ['only' => [
            'destroy',
            'index',
            'store'
        ]]
    );
    Route::resource(
        '/review',
        'Api\ReviewController',
        ['only' => [
            'destroy',
            'index',
            'show',
            'store'
        ]]
    );
    Route::resource(
        '/user',
        'Api\UserController',
        ['only' => [
            'index',
            'show',
            'store'
        ]]
    );

    /* -*- USER -*- */
    Route::group(['prefix' => 'user'], function()
    {
        /* -*- GET -*- */
        Route::get('timeline', 'Api\UserController@index');
        Route::get('{user_id}/subscribe', 'Api\UserController@subscribe');
        Route::get('{user_id}/unsubscribe', 'Api\UserController@unsubscribe');

        /* -*- POST -*- */
        Route::post('login', 'Api\UserController@login');
    });

});
