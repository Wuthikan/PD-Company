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

Route::get('/', 'ShippingController@showIndex');

Route::post('/create/shipping', [
  'uses'       => 'ShippingController@addShipping',
  'as'         => 'shipping.store',
  ]);

Route::get('/shipping/1', [
  'uses'       => 'ShippingController@shippingList1',
  'as'         => 'shipping.type1',
  ]);

Route::get('/shipping/2', [
  'uses'       => 'ShippingController@shippingList2',
  'as'         => 'shipping.type2',
  ]);

  Route::post('/shipping/checkavailable', [
    'uses'       => 'ShippingController@chkAvailable',
    'as'         => 'shipping.chkAvailable',
    ]);

  Route::get('/shipping/pdf', [
    'uses'       => 'ShippingController@pdf',
    'as'         => 'shipping.recipt',
    ]);
  Route::get('/calendar', [
    'uses'       => 'ShippingController@showCalendar',
    'as'         => 'calendar',
    ]);


// Route::get('/', function () {
//     return view('auth/login');
// });

// Route::resource('product', 'ProductController');

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
//
// Route::resource('stock', 'StockController');
// Route::get('/stock/edit/{id}', [
//   'uses' => 'StockController@Stockupdate',
//   'as' => 'stock.edit',
//   ]);
