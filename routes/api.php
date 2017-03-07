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

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:api');

// get list of tasks
Route::get('/accounts','AccountsController@index');

// get specific task
Route::get('/accounts/{id}','AccountsController@show');

// delete a task
Route::delete('accounts/{id}','AccountsController@destroy');

// update existing task
Route::put('accounts','AccountsController@store');

// create new task
Route::post('accounts','AccountsController@store');

// get list of balance
Route::get('/balance','AccountsController@balance');

// get list of balance by id
Route::get('/balancebyid/{id}','AccountsController@balancebyid');

// deposit
Route::post('/deposit','AccountsController@depositstore');
