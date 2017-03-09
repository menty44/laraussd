<?php

/**
 * Author: oluoch
 * URL: www.blaqueyard.com
 * twitter: http://twitter.com/menty44
 * fred.oluoch@blaqueyard.com
 */

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

#Developed by oluoch 0720106420

#ByPass the authenticating middle for ease of testing

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

//get home
Route::get('/','AccountsController@welcome');

// get list of accounts
Route::get('/accounts','AccountsController@index');

// get specific accounts
Route::get('/accounts/{id}','AccountsController@show');

// delete a accounts
Route::delete('accounts/{id}','AccountsController@destroy');

// update existing accounts
Route::put('accounts','AccountsController@store');

// create new accounts
Route::post('accounts','AccountsController@store');

// get list of balance
Route::get('/balance','AccountsController@balance');

// get list of balance by id
Route::get('/balancebyid/{id}','AccountsController@balancebyid');

// deposit
Route::post('/deposit','AccountsController@depositstore');

// get list of test
Route::get('/test','AccountsController@test');

// get list of test
Route::get('/test1','AccountsController@test1');

// get list of test
Route::get('/test1/{id} ','AccountsController@test1');

// deposit by id
Route::put('/deposit/{id}','AccountsController@testupdate');

//withdraw by 1d
Route::put('/withdrawal/{id}','AccountsController@withdrawal');
