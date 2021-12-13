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

Route::group(['middleware' => 'auth'], function() {
    Route::get('/', function () {
        return view('penjualan/dashboard');
    });

    Route::get('/welcome', function () {
        return view('welcome');
    });

    Route::group(['prefix' => 'product'], function() {
        /* ---- DASHBOARD ---- */

        /* ---- PRODUK ---- */
        Route::get('/produk-list', 'ProductController@produk_list')->name('produk-list');
        Route::get('/produk-block', 'ProductController@produk_block')->name('produk-block');
        Route::get('/produk-tambah', 'ProductController@produk_tambah')->name('produk-tambah');
        Route::post('/produk-savetambah', 'ProductController@produk_savetambah')->name('produk-savetambah');
        Route::get('/{id}/produk-edit', 'ProductController@produk_edit')->name('produk-edit');
        Route::post('/{id}/produk-saveedit', 'ProductController@produk_saveedit')->name('produk-saveedit');
        Route::post('/{id}/produk-delete', 'ProductController@produk_delete')->name('produk-delete');

        Route::get('/produk-sampah', 'ProductController@produk_sampah')->name('produk-sampah');
        Route::get('/{id}/produk-restore', 'ProductController@produk_restore')->name('produk-restore');
        Route::post('/{id}/produk-forcedelete', 'ProductController@produk_forcedelete')->name('produk-forcedelete');

        Route::get('/produk-restoreall', 'ProductController@produk_restoreall')->name('produk-restoreall');
        Route::post('/produk-forcedeleteall', 'ProductController@produk_forcedeleteall')->name('produk-forcedeleteall');

    });

    //Penjualan
    Route::group(['prefix' => 'penjualan'], function() {
        Route::get('/', 'PenjualanController@index')->name('penjualan.index');
        Route::post('/store', 'PenjualanController@store')->name('penjualan.store');
        Route::get('/','PenjualanController@index')->name('penjualan.index');
    });
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
