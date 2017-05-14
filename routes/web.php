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
    return view('auth/login');
});
Route::get('/manu-Invoice', function () {
    return view('Invoice/manu');
});

Route::resource('concrete', 'ConcreteController');
Route::get('concrete/create/{id}', [
  'uses'       => 'ConcreteController@create',
  'as'         => 'concrete.add',
  'middleware' => ['auth'],
  ]);
Route::get('concrete/{id}/{idinvoice}', [
    'uses'       => 'ConcreteController@destroy',
    'as'         => 'concrete.delete',
    'middleware' => ['auth'],
    ]);


Route::get('/invoice/concrete', 'InvoiceConcreteController@store');
Route::resource('invoiceConcrete', 'InvoiceConcreteController');

Route::resource('product', 'ProductController');

Route::resource('customer', 'CustomerController');
Route::get('customer/create/{id}', [
  'uses'       => 'CustomerController@create',
  'as'         => 'customer.add',
  'middleware' => ['auth'],
  ]);

  Route::resource('other', 'OtherController');
  Route::get('other/create/{id}', [
    'uses'       => 'OtherController@create',
    'as'         => 'other.add',
    'middleware' => ['auth'],
    ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
