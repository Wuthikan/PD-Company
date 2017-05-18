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
Route::get('/all-Invoice', function () {
    return view('Invoice/allInvoice');
});
Route::get('/invoice/editDiscount/{id}', [
  'uses' => 'InvoiceConcreteController@editDiscount',
  'as' => 'invoice.editDiscount',
  'middleware' => ['auth'],
  ]);

Route::resource('invoiceall', 'InvoiceController');
Route::get('invoice/edit/{id}', [
  'uses'       => 'InvoiceController@edit',
  'as'         => 'invoice.edit',
  'middleware' => ['auth'],
  ]);

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


Route::resource('boxconcrete', 'BoxconcreteController');
Route::get('boxconcrete/product/{id}', [
      'uses'       => 'BoxconcreteController@index',
      'as'         => 'boxconcrete.open',
      'middleware' => ['auth'],
      ]);
Route::get('boxconcrete/create/{id}/{idproduct}', [
            'uses'       => 'BoxconcreteController@create',
            'as'         => 'boxconcrete.select',
            'middleware' => ['auth'],
            ]);
Route::get('boxconcrete/{id}/{idinvoice}', [
                'uses'       => 'BoxconcreteController@destroy',
                'as'         => 'boxconcrete.delete',
                'middleware' => ['auth'],
                ]);

Route::resource('extraconcrete', 'ExtraConcreteController');
Route::get('extraconcrete/create/{id}', [
                  'uses'       => 'ExtraConcreteController@create',
                  'as'         => 'extraconcrete.add',
                  'middleware' => ['auth'],
                  ]);
Route::get('extraconcrete/{id}/{idinvoice}', [
                  'uses'       => 'ExtraConcreteController@destroy',
                  'as'         => 'extraconcrete.delete',
                  'middleware' => ['auth'],
                    ]);

Route::get('/invoice/concretebox', 'InvoiceBoxConcreteController@store');
Route::resource('invoiceBoxConcrete', 'InvoiceBoxConcreteController');
Route::get('invoiceBoxConcrete/confirm/{id}', [
    'uses'       => 'InvoiceBoxConcreteController@confirm',
    'as'         => 'invoiceBoxConcrete.confirm',
    'middleware' => ['auth'],
    ]);

Route::get('/invoice/concrete', 'InvoiceConcreteController@store');
Route::resource('invoiceConcrete', 'InvoiceConcreteController');
Route::get('invoiceconcrete/confirm/{id}', [
    'uses'       => 'InvoiceConcreteController@confirm',
    'as'         => 'invoiceconcrete.confirm',
    'middleware' => ['auth'],
    ]);

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
    Route::get('other/{id}/{idinvoice}', [
        'uses'       => 'OtherController@destroy',
        'as'         => 'other.delete',
        'middleware' => ['auth'],
        ]);

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
