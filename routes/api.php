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
Route::get('data-desa','DesaController@view');
Route::get('data-dusun/{id}','DesaController@dusun');
Route::get('pelanggan','PelangganController@view');
Route::get('pelanggan/{idDusun}','PelangganController@listPelanggan');
Route::post('pelanggan','PelangganController@add');
Route::get('check-pelanggan/{codePelanggan}','PelangganController@checkPelanggan');
Route::put('pelanggan/{pelanggan}','PelangganController@update');
Route::delete('pelanggan/{pelanggan}','PelangganController@delete');
Route::post('add-debit-air','TransactionController@add');
Route::get('list-pembayaran','TransactionController@listPembayaran');

