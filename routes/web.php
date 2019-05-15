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
    return view('welcome');
});


Route::get('/dashboard','DashboardController@index');
Route::get('/login','AuthController@login');
Route::post('/postlogin','AuthController@postlogin');
Route::get('/logout', 'AuthController@logout');

 

Route::group(['middleware' => ['auth','checkRole:waiter,admin,owner']], function(){
    
     Route::group(['prefix'=>'menu'],function()
    {
        route::get('/','MenuController@index')->name('menu.index');
        
        route::get('/new','MenuController@create');
     
        route::post('/', 'MenuController@save');

        Route::get('/{id}', 'MenuController@edit');
     
        Route::put('/{id}', 'MenuController@update');

        Route::delete('/{id}', 'MenuController@destroy');
    });


});



Route::group(['middleware' => ['auth','checkRole:admin, owner']], function(){

     Route::group(['prefix'=>'meja'],function()
    {
        route::get('/','MejaController@index')->name('meja.index');
        
        route::get('/new','MejaController@create');
     
        route::post('/', 'MejaController@save');

        Route::get('/{id}', 'MejaController@edit');
     
        Route::put('/{id}', 'MejaController@update');

        Route::delete('/{id}', 'MejaController@destroy');
    });


        Route::get('/pelanggan/', 'PelangganController@index')->name('pelanggan.index');

        Route::get('/pelanggan/new', 'PelangganController@create');
     
        Route::post('/pelanggan/', 'PelangganController@save');

        Route::get('/pelanggan/{id}', 'PelangganController@edit');
     
        Route::put('/pelanggan/{id}', 'PelangganController@update');

        Route::delete('/pelanggan/{id}', 'PelangganController@destroy');


        


});



Route::group(['middleware' => ['auth','checkRole:kasir,waiter,owner']], function(){

    Route::group(['prefix' => 'transaksi'], function() {
         Route::get('/', 'TransaksiController@index')->name('transaksi.index');
        //ROUTE UNTUK HALAMAN INVOICE

        Route::get('/exportpdf', 'TransaksiController@exportPdf');
     
        Route::get('/new', 'TransaksiController@create');
     
        Route::post('/create', 'TransaksiController@save');

        Route::get('/{id}', 'TransaksiController@edit');
     
        Route::put('/{id}', 'TransaksiController@update');

        Route::delete('/{id}', 'TransaksiController@destroy');
    });


   Route::group(['prefix' => 'pesanan'], function() {
         Route::get('/', 'PesananControllerer@index')->name('pesanan.index');
    
        Route::get('/new', 'PesananControllerer@create');
     
        Route::post('/', 'PesananControllerer@save');

        Route::get('/transaksi/{id}', 'PesananControllerer@transaksi');
     
         Route::post('/transaksi1', 'PesananControllerer@createtransaksi');

        Route::get('/{id}', 'PesananControllerer@edit');
     
        Route::put('/{id}', 'PesananControllerer@update');

        Route::delete('/{id}', 'PesananControllerer@destroy');

    });


});













