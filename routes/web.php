<?php

use App\Http\Controllers\DataDukController;
use App\Http\Controllers\DataKgbController;
use App\Http\Controllers\DataKpController;
use App\Models\DataPegawai;
use Dflydev\DotAccessData\Data;
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

//login
Route::get('admin/login', '\App\Http\Controllers\LoginController@index')->name('admin/login');
Route::post('admin/login', '\App\Http\Controllers\LoginController@authenticate');
Route::post('admin/logout', '\App\Http\Controllers\LoginController@logout');

Route::middleware('auth')->group(function () {

    Route::get('/', '\App\Http\Controllers\DashboardController@index')->name('dashboard');

    //data pegawai
    Route::get('admin/datapegawai-index', '\App\Http\Controllers\DataPegawaiController@index')->name('admin.pegawai');
    Route::get('admin/datapegawai-create', '\App\Http\Controllers\DataPegawaiController@create')->name('create.pegawai');
    Route::post('admin/datapegawai/store', '\App\Http\Controllers\DataPegawaiController@store')->name('store.pegawai');
    Route::get('admin/datapegawai/{data_pegawai:id}/edit', '\App\Http\Controllers\DataPegawaiController@edit')->name('edit.pegawai');
    Route::patch('admin/datapegawai/{data_pegawai:id}/update', '\App\Http\Controllers\DataPegawaiController@update')->name('update.pegawai');
    Route::delete('admin/datapegawai/{data_pegawai:id}/delete', '\App\Http\Controllers\DataPegawaiController@destroy')->name('hapus.pegawai');

    //tabel kgb
    // Route::post('admin/datakgb/filter', '\App\Http\Controllers\FilterController@index')->name('filter.kgb');
    Route::get('admin/datakgb', '\App\Http\Controllers\DataKgbController@index')->name('admin.kgb');
    Route::get('admin/datakgb/{data_kgb:id}/insert', '\App\Http\Controllers\DataKgbController@create')->name('create.kgb');
    Route::POST('admin/datakgb/store', '\App\Http\Controllers\DataKgbController@store')->name('store.kgb');
    Route::get('admin/datakgb/{id}/edit', '\App\Http\Controllers\DataKgbController@edit')->name('edit.kgb');
    Route::PATCH('admin/datakgb/{dataKgb:id}/update', '\App\Http\Controllers\DataKgbController@update')->name('update.kgb');
    Route::get('admin/datakgb/{id}/print', '\App\Http\Controllers\DataKgbController@print')->name('print.kgb');
    Route::get('admin/datakgb/error', '\App\Http\Controllers\DataKgbController@error')->name('error.kgb');

    //tabel kp
    Route::get('admin/datakp', '\App\Http\Controllers\DataKpController@index')->name('admin.kp');
    Route::get('admin/datakp/{data_kp:id}/insert', '\App\Http\Controllers\DataKpController@create')->name('create.kgb');
    Route::POST('admin/datakp/store', '\App\Http\Controllers\DataKpController@store')->name('store.kgb');
    Route::get('admin/datakp/{id}/edit', '\App\Http\Controllers\DataKpController@edit')->name('edit.kp');
    Route::post('admin/datakp/{dataKp:id}/update', '\App\Http\Controllers\DataKpController@update')->name('update.kp');
    Route::get('admin/datakp/{id}/print', '\App\Http\Controllers\DataKpController@print')->name('print.kp');
    Route::get('admin/datakp/error', '\App\Http\Controllers\DataKPController@error')->name('error.kp');

    //tabel penghargaan
    Route::get('/admin/datapenghargaan', '\App\Http\Controllers\DataPenghargaanController@index')->name('admin.penghargaan');
    Route::get('admin/datapenghargaan/{id}/edit', '\App\Http\Controllers\DatapenghargaanController@edit');
    Route::post('/admin/datapenghargaan/update', '\App\Http\Controllers\DataPenghargaanController@update')->name('update.penghargaan');
    Route::get('admin/datapenghargaan/print', '\App\Http\Controllers\DataPenghargaanController@print')->name('print.penghargaan');

    //tabel duk
    Route::get('/admin/dataduk', '\App\Http\Controllers\DataDukController@index')->name('admin.duk');
    Route::get('admin/dataduk/{id}/edit', '\App\Http\Controllers\DataDukController@edit');
    Route::post('/admin/dataduk/update', '\App\Http\Controllers\DataDukController@update')->name('update.duk');
    Route::get('admin/dataduk/print', '\App\Http\Controllers\DataDukController@print')->name('print.duk');

    //tabel pensiun
    Route::get('/admin/datapensiun', '\App\Http\Controllers\DataPensiunController@index')->name('admin.pensiun');
    Route::get('admin/datapensiun/{id}/edit', '\App\Http\Controllers\DataPensiunController@edit');
    Route::post('/admin/datapensiun/update', '\App\Http\Controllers\DataPensiunController@update')->name('update.pensiun');
    Route::get('admin/datapensiun/print', '\App\Http\Controllers\DataPensiunController@print')->name('print.pensiun');

    //tabel cuti
    Route::get('admin/datacuti-index', '\App\Http\Controllers\DataCutiController@index')->name('admin.cuti');
    Route::get('admin/datacuti-create', '\App\Http\Controllers\DataCutiController@create')->name('create.cuti');
    Route::post('admin/datacuti/store', '\App\Http\Controllers\DataCutiController@store')->name('store.cuti');
    Route::get('admin/datacuti/{data_cuti:id}/edit', '\App\Http\Controllers\DataCutiController@edit')->name('edit.cuti');
    Route::patch('admin/datacuti/{data_cuti:id}/update', '\App\Http\Controllers\DataCutiController@update')->name('update.cuti');
    Route::delete('admin/datacuti/{data_cuti:id}/delete', '\App\Http\Controllers\DataCutiController@destroy')->name('hapus.cuti');
    Route::get('admin/datacuti/print', '\App\Http\Controllers\DataCutiController@print')->name('print.cuti');

    // show modal
    Route::get('showmodal-kgb/{id}', '\App\Http\Controllers\DataKgbController@showModalKgb')->name('show.kgb');
    Route::get('showmodal-kp/{id}', '\App\Http\Controllers\DataKpController@showModalKp')->name('show.kp');
});

// Disable Register
Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
]);

//Route::post('/test', [DataDukController::class, 'newUpdate']);
