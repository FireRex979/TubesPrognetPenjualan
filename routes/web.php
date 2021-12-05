<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('layouts/master');
});

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/first', function () {
    return view('penjualan/first');
});

Route::get('/table-basic', function () {
    return view('table-basic');
});

Route::get('/icon-fontawesome', function () {
    return view('icon-fontawesome');
});

Route::get('/pages-profile', function () {
    return view('pages-profile');
});

//Penjualan
Route::group(['prefix' => 'penjualan'], function() {
    Route::get('/', 'PenjualanController@index')->name('penjualan.index');
    Route::post('/store', 'PenjualanController@store')->name('penjualan.store');
});
