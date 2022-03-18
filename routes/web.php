<?php

use App\Http\Controllers\DataDukController;
use App\Models\DataPegawai;
use GuzzleHttp\Psr7\Request;
use Illuminate\Http\Request as HttpRequest;
use Illuminate\Support\Facades\Route;
use RealRashid\SweetAlert\Facades\Alert;


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

Route::get('/admin/login', function () {
    return view('login');
});

//data pegawai
Route::get('admin/datapegawai', '\App\Http\Controllers\DataPegawaiController@index')->name('admin.pegawai');
Route::get('admin/datapegawai/create', '\App\Http\Controllers\DataPegawaiController@create')->name('create.pegawai');
Route::post('admin/datapegawai/store', '\App\Http\Controllers\DataPegawaiController@store')->name('store.pegawai');
Route::get('admin/datapegawai/{data_pegawai:id}/edit', '\App\Http\Controllers\DataPegawaiController@edit')->name('edit.pegawai');
Route::patch('admin/datapegawai/{data_pegawai:id}/update', '\App\Http\Controllers\DataPegawaiController@update')->name('update.pegawai');
Route::delete('admin/datapegawai/{data_pegawai:id}/delete', '\App\Http\Controllers\DataPegawaiController@destroy')->name('hapus.pegawai');

//tabel kgb
Route::get('admin/datakgb', '\App\Http\Controllers\DataKgbController@index')->name('admin.kgb');

//tabel kp
Route::get('admin/datakp', '\App\Http\Controllers\DataKpController@index')->name('admin.kp');

//tabel penghargaan
Route::get('/admin/datapenghargaan', '\App\Http\Controllers\DataPenghargaanController@index')->name('admin.penghargaan');
Route::get('admin/datapenghargaan/{id}/edit', '\App\Http\Controllers\DatapenghargaanController@edit');
Route::post('/admin/datapenghargaan/update', '\App\Http\Controllers\DataPenghargaanController@update')->name('update.penghargaan');

//tabel duk
Route::get('/admin/dataduk', '\App\Http\Controllers\DataDukController@index')->name('admin.duk');
Route::get('admin/dataduk/{id}/edit', '\App\Http\Controllers\DataDukController@edit');
Route::post('/admin/dataduk/update', '\App\Http\Controllers\DataDukController@update')->name('update.duk');

//tabel pensiun
Route::get('/admin/datapensiun', '\App\Http\Controllers\DataPensiunController@index')->name('admin.pensiun');
Route::get('admin/datapensiun/{id}/edit', '\App\Http\Controllers\DataPensiunController@edit');
Route::post('/admin/datapensiun/update', '\App\Http\Controllers\DataPensiunController@update')->name('update.pensiun');

//tabel cuti
Route::get('admin/datacuti', '\App\Http\Controllers\DataCutiController@index')->name('admin.cuti');
Route::get('admin/datacuti/create', '\App\Http\Controllers\DataCutiController@create')->name('create.cuti');
Route::post('admin/datacuti/store', '\App\Http\Controllers\DataCutiController@store')->name('store.cuti');
Route::get('admin/datacuti/{data_cuti:id}/edit', '\App\Http\Controllers\DataCutiController@edit')->name('edit.cuti');
Route::patch('admin/datacuti/{data_cuti:id}/update', '\App\Http\Controllers\DataCutiController@update')->name('update.cuti');
Route::delete('admin/datacuti/{data_cuti:id}/delete', '\App\Http\Controllers\DataCutiController@destroy')->name('hapus.cuti');


//Route::post('/test', [DataDukController::class, 'newUpdate']);
