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

Route::post('login','AuthController@login');
Route::post('register','AuthController@signup');
Route::get('pelanggan','PelangganController@view')->middleware('auth:api');
Route::post('pelanggan','PelangganController@add')->middleware('auth:api');
Route::post('add-debit-air','TransactionController@add')->middleware('auth:api');

