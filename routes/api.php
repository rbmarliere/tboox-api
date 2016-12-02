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

Route::group(['middleware' => 'auth:api'], function() {
    /* -*- RESOURCES -*- */
    Route::resource(
        '/book',
        'api\BookController',
        ['only' => ['index', 'show']]
    );
    Route::resource(
        '/collection',
        'api\CollectionController',
        ['only' => ['index', 'store', 'destroy']]
    );
    Route::resource(
        '/review',
        'api\ReviewController',
        ['only' => ['index', 'show', 'store', 'destroy']]
    );

    /* -*- GET -*- */
    Route::get('/timeline', 'api\TimelineController@index');

    /* -*- POST -*- */
    Route::post('/user/login', 'api\UserController@login');
});
