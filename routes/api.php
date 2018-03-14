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

Route::get('/collections', [
    'uses' => 'Api\CollectionController@getCollections'
]);

Route::get('/collection/{id}', [
    'uses' => 'Api\CollectionController@getCollection'
]);

Route::post('/collection', [
    'uses' => 'Api\CollectionController@saveCollection'
]);

Route::put('/collection/{id}', [
    'uses' => 'Api\CollectionController@updateCollection'
]);

Route::delete('/collection/{id}', [
    'uses' => 'Api\CollectionController@deleteCollection'
]);

Route::post('/user/', [
    'uses' => 'Api\UserController@signup'
]);

Route::post('/user/signin', [
    'uses' => 'Api\UserController@signin'
]);