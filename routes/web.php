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

Route::get('customers', 'CustomersController@index');

Route::get('customers/{id}', 'CustomersController@show');

Route::get('customers/{id}/address', 'CustomersController@showAddress');

Route::get('customers/by-company/{id}', 'CustomersController@showCompany');


Route::get('klarna', 'KlarnaController@index');

Route::get('klarna-confirmation', 'KlarnaController@confirmation');

Route::get('klarna-acknowledge', 'KlarnaController@acknowledge');

Route::resources([
                'addresses' => 'AddressController',
                'companies' => 'CompanyController',
                'group-prices' => 'GroupPriceController',
                'order-billing-addresses' => 'OrderBillingAddressController',
                'orders' => 'OrderController',
                'order-items' => 'OrderItemController',
                'order-shipping-addresses' => 'OrderShippingAddressController',
                'products' => 'ProductController',
                'stock-items' => 'StockItemController'
]);

Route::get('instagram', 'InstagramController@show');

Route::get('twitter', 'TwitterController@wordCount');

Route::get('twitterexcl', 'TwitterController@excludeWords');

Route::post('twitterse', 'TwitterController@searchTweet');

//Route::get()