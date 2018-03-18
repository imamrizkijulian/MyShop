<?php

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
    return view('home');
});

Route::get('/data', function () {
    return view('transaksi.data');
});

Route::get('/simintatemp', function () {
    return view('simintatemp.dashboard');
});

Auth::routes();

Route::get('/simintatemp', 'HomeController@index')->name('index');

Route::group(['prefix'=>'admin', 'middleware'=>['auth','role:admin']], function () 
	{ 
		Route::resource('barang', 'BarangController');
		Route::resource('suplier', 'SuplierController');
		Route::resource('transaksi', 'TransaksiController');
		Route::resource('trxbeli', 'TrxBeliController');
		Route::get('/laporan/penjualan','LaporanController@index');
		Route::post('/laporan/detail','LaporanController@downloadPDF');
		Route::get('/laporan2/pembelian','Laporan2Controller@index');
		Route::post('/laporan2/detail2','Laporan2Controller@downloadPDF');
		Route::resource('petugas','PetugasController');
	});

Route::group(['prefix'=>'karyawan1', 'middleware'=>['auth','role:admin|karyawan1']], function () 
	{ 
		Route::resource('barang', 'BarangController');
		Route::resource('suplier', 'SuplierController');
		Route::resource('transaksi', 'TransaksiController');
		Route::resource('trxbeli', 'TrxBeliController');
	});

Route::group(['prefix'=>'karyawan2', 'middleware'=>['auth','role:admin|karyawan2']], function () 
	{ 
		Route::resource('barang', 'BarangController');
		Route::resource('suplier', 'SuplierController');
		Route::resource('transaksi', 'TransaksiController');
		Route::resource('trxbeli', 'TrxBeliController');
	});

Route::get('pageuser', 'UserTemplateController@index');

Route::group(['middleware'=>'cors'], function(){
	Route::get('/listdata','ApiController@listdata');
});

