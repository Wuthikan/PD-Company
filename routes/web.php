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

Route::get('/user/edit/{id}', [
  'uses'       => 'UserController@editUser',
  'as'         => 'User.edit',
  'middleware' => ['auth'],
  ]);
Route::resource('Usermanagement', 'UserController');
Route::get('Usermanagement/delete/{id}', [
  'uses'       => 'UserController@destroy',
  'middleware' => ['auth'],
  ]);

Route::get('/', function () {
    return view('home');
});
Route::get('/manu-Invoice', function () {
    return view('Invoice/manu');
});
Route::get('/test', function () {
    return view('test');
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
Route::get('invoice/menager/', [
  'uses'       => 'InvoiceController@menager',
  'as'         => 'invoice.menager',
  'middleware' => ['auth'],
  ]);
Route::get('Invoice/pdf/{id}', [
    'uses'       => 'InvoiceController@PDF',
    'as'         => 'invoice.pdf'
    ]);
Route::get('Invoice/taxinvoice/PDF/{id}', [
    'uses'       => 'InvoiceController@taxPDF',
    'as'         => 'taxinvoice.pdf'
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
Route::get('/invoiceBoxConcrete/delete/{id}', [
    'uses'       => 'InvoiceBoxConcreteController@destroy'
    ]);

Route::get('/invoice/concrete', 'InvoiceConcreteController@store');
Route::resource('invoiceConcrete', 'InvoiceConcreteController');
Route::get('invoiceconcrete/confirm/{id}', [
    'uses'       => 'InvoiceConcreteController@confirm',
    'as'         => 'invoiceconcrete.confirm',
    'middleware' => ['auth'],
    ]);
Route::get('/invoiceConcrete/delete/{id}', [
    'uses'       => 'InvoiceConcreteController@destroy'
    ]);

Route::resource('product', 'ProductController');
Route::get('Product/delete/{id}', [
  'uses'       => 'ProductController@destroy',
  'as'         => 'product.destroy',
  'middleware' => ['auth'],
  ]);
Route::get('Product/Shows', [
    'uses'       => 'ProductController@ShowForEmployee',
    'as'         => 'product.Shows',
    'middleware' => ['auth'],
    ]);


Route::resource('customer', 'CustomerController');
Route::get('customer/create/{id}', [
  'uses'       => 'CustomerController@create',
  'as'         => 'customer.add',
  'middleware' => ['auth'],
  ]);

Route::get('customer/search', [
  'as' => 'search-autocomplete',
   'uses' => 'CustomerController@autosearch']);

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

Route::resource('shipping', 'ShippingController');

Route::get('/shipping', 'ShippingController@showIndex');
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
Route::get('shipping/myshipping/{id}', [
          'uses'       => 'ShippingController@myshipping',
          'as'         => 'shipping.myShipping',
          'middleware' => ['auth'],
          ]);

Route::get('shipping/check/{id}', [
                    'uses'       => 'ShippingController@check',
                    'as'         => 'shipping.check',
                    'middleware' => ['auth'],
                    ]);

Route::post('shipping/check2', [
                    'uses'       => 'ShippingController@check2',
                    'as'         => 'shipping.check2'
                    ]);
  Route::post('shipping/add', [
                      'uses'       => 'ShippingController@addShipping',
                      'as'         => 'shipping.addShipping'
                      ]);
  Route::get('shipping/edit/{id}', [
                      'uses'       => 'ShippingController@edit',
                      'as'         => 'shipping.edit'
                      ]);
  Route::post('shipping/editdate', [
                      'uses'       => 'ShippingController@editdate',
                      'as'         => 'shipping.editdate'
                      ]);
  Route::get('shipping/delete/{id}/{idinvoice}', [
      'uses'       => 'ShippingController@delete',
      'as'         => 'shipping.destroy'
      ]);
Route::get('shipping/pdf/{id}/{idinvoice}', [
    'uses'       => 'ShippingController@PDF',
    'as'         => 'shipping.pdf'
    ]);

    Route::get('/calendarShipping', [
        'uses'       => 'ShippingController@calendar',
        ]);
Route::get('/calendarShipping/{id}', [
    'uses'       => 'ShippingController@showcalendar',
    ]);


Route::get('/Inventory', function () {
  return view('Product/manu');
});
Route::get('/Invenry/manuExtra', function () {
  return view('Inventory/manuExtra');
});
Route::get('/manuExtra/showExtra/{type}', [
    'uses'       => 'BoxconcreteInventoryController@Showextra'
    ]);

Route::resource('ConcreteInventory', 'ConcreteInventoryController');
Route::get('/ConcreteInventory/edit2/{id}', [
    'uses'       => 'ConcreteInventoryController@edit2'
    ]);
    Route::get('/map', function () {
       return view('Shipping/map');
     });

Route::get('BoxConcreteInventory/edit/{id}/{type}', [
    'uses'       => 'BoxconcreteInventoryController@edit',
    'as'         => 'boxconcrete.inventory'
    ]);
Route::get('BoxConcreteInventory/edit2/{id}/{type}', [
    'uses'       => 'BoxconcreteInventoryController@edit2',
    'as'         => 'boxconcrete2.inventory'
    ]);
Route::resource('BoxConcreteInventory', 'BoxconcreteInventoryController');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
