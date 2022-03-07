<?php

use App\Models\DataPegawai;
use GuzzleHttp\Psr7\Request;
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
    return view('index');
});

Route::get('admin/datapegawai', '\App\Http\Controllers\DataPegawaiController@index')->name('admin.pegawai');
Route::get('admin/datapegawai/create', '\App\Http\Controllers\DataPegawaiController@create')->name('create.pegawai');
Route::post('admin/datapegawai/store', '\App\Http\Controllers\DataPegawaiController@store')->name('store.pegawai');
Route::get('admin/datapegawai/{data_pegawai:id}/edit', '\App\Http\Controllers\DataPegawaiController@edit')->name('edit.pegawai');
Route::patch('admin/datapegawai/{data_pegawai:id}/update', '\App\Http\Controllers\DataPegawaiController@update')->name('update.pegawai');
Route::delete('admin/datapegawai/{data_pegawai:id}/delete', '\App\Http\Controllers\DataPegawaiController@destroy')->name('hapus.pegawai');

Route::get('admin/datakgb', '\App\Http\Controllers\DataKgbController@index')->name('admin.kgb');

Route::get('admin/datakp', '\App\Http\Controllers\DataKpController@index')->name('admin.kp');

Route::get('admin/datapenghargaan', '\App\Http\Controllers\DataPenghargaanController@index')->name('admin.penghargaan');

Route::get('admin/dataduk', '\App\Http\Controllers\DataDukController@index')->name('admin.duk');

Route::get('admin/datapensiun', '\App\Http\Controllers\DataPensiunController@index')->name('admin.pensiun');

Route::get('admin/datacuti', '\App\Http\Controllers\DataCutiController@index')->name('admin.cuti');
Route::get('admin/datacuti/create', '\App\Http\Controllers\DataCutiController@create')->name('create.cuti');
Route::post('admin/datacuti/store', '\App\Http\Controllers\DataCutiController@store')->name('store.cuti');
Route::get('admin/datacuti/{data_cuti:id}/edit', '\App\Http\Controllers\DataCutiController@edit')->name('edit.cuti');
Route::patch('admin/datacuti/{data_cuti:id}/update', '\App\Http\Controllers\DataCutiController@update')->name('update.cuti');
Route::delete('admin/datacuti/{data_cuti:id}/delete', '\App\Http\Controllers\DataCutiController@destroy')->name('hapus.cuti');
