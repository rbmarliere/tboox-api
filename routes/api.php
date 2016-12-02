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
    Route::resource('/book', 'api\BookController');
    Route::resource('/collection', 'api\CollectionController');
    Route::resource('/review', 'api\ReviewController');

    /* -*- GET -*- */
    Route::get('/timeline', 'api\TimelineController@index');

    /* -*- POST -*- */
    Route::post('/user/login', 'api\UserController@login');
});
