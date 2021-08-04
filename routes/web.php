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

// Route::get('/', function () {
//     return view('index');
// });

// Route::get('/produk', function () {
// 	$judul = 'POS - Produk';
//     return view('produk', ['judul' => $judul]);
// });

Route::get('/', 'DashboardController@home');

// Produk
Route::get('/produk', 'ProduksController@index');
Route::get('/produk/create', 'ProduksController@create');
Route::post('/produk', 'ProduksController@store');
Route::delete('/produk/{produk}', 'ProduksController@destroy');
Route::get('/produk/{produk}/edit', 'ProduksController@edit');
Route::patch('/produk/{produk}', 'ProduksController@update');

// Customer
Route::get('/customer', 'CustomersController@index');
Route::get('/customer/create', 'CustomersController@create');
Route::post('/customer', 'CustomersController@store');
Route::delete('/customer/{customer}', 'CustomersController@destroy');
Route::get('/customer/{customer}/edit', 'CustomersController@edit');
Route::patch('/customer/{customer}', 'CustomersController@update');

// transaksi
Route::get('/requestProduk', 'ProduksController@getProdukbyKode');
Route::get('/getCustomer', 'CustomersController@getCustomerbyPhone');
Route::post('/simpanOrder', 'OrdersController@saveOrder');
Route::get('/order', 'OrdersController@index');
Route::get('/order/{order}', 'OrdersController@show');
