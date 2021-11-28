<?php

use App\Http\Controllers\PenjualanController;
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
    return view('penjualan/dashboard');
});

Route::get('/welcome', function () {
    return view('welcome');
});

//Penjualan
Route::group(['prefix' => 'penjualan'], function() {
    Route::get('/', 'PenjualanController@index')->name('penjualan.index');

    Route::get('/produk-list',PenjualanController::class,'produk_list')->name('produk-list');
    Route::get('/produk-tambah',PenjualanController::class,'produk_tambah')->name('produk-tambah');
    Route::post('/produk-savetambah',PenjualanController::class,'produk_savetambah')->name('produk-savetambah');
    Route::get('/produk-edit',PenjualanController::class,'produk_edit')->name('produk-edit');
    Route::post('/produk-saveedit',PenjualanController::class,'produk_saveedit')->name('produk-saveedit');
    Route::get('/produk-delete',PenjualanController::class,'produk_delete')->name('produk-delete');
    
});
