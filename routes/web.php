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
Auth::routes();

// Giao diện khách hàng

Route::get('/', 'BakeryController@home')->name('home');

Route::get('/shop/{type}', 'BakeryController@shop')->name('shop');

Route::get('/shop/discount/{type}', 'BakeryController@shopDiscount')->name('shop.discount');

Route::get('/detail_product/{slug}', 'BakeryController@detail_product')->name('detail_product');

Route::get('/about', 'BakeryController@about')->name('about');

Route::get('/new', 'BakeryController@news')->name('new');

Route::get('/new/{id}', 'BakeryController@detail_news')->name('detail_news');

Route::get('/contact', 'BakeryController@contact')->name('contact');

Route::get('/checkout', 'BakeryController@checkout')->name('checkout');
// Quản lý
//Sản phẩm
Route::resource('product', 'ProductController');

Route::get('product_trash', 'ProductController@trash')->name('product.trash');

Route::get('product_restore/{id}', 'ProductController@restore')->name('product.restore');

Route::get('product_restoreAll', 'ProductController@restoreAll')->name('product.restoreAll');

Route::get('product_delete/{id}', 'ProductController@delete')->name('product.delete');

Route::get('product_deleteAll', 'ProductController@deleteAll')->name('product.deleteAll');

//Loại sản phẩm

Route::resource('productType', 'ProductTypeController');

Route::get('productType_trash', 'ProductTypeController@trash')->name('productType.trash');

Route::get('productType_restore/{id}', 'ProductTypeController@restore')->name('productType.restore');

Route::get('productType_restoreAll', 'ProductTypeController@restoreAll')->name('productType.restoreAll');

Route::get('productType_delete/{id}', 'ProductTypeController@delete')->name('productType.delete');

Route::get('productType_deleteAll', 'ProductTypeController@deleteAll')->name('productType.deleteAll');

Route::resource('user', 'UserController');

Route::resource('news', 'NewsController');

Route::resource('customer', 'CustomerController');

Route::get('customer_trash', 'CustomerController@trash')->name('customer.trash');

Route::get('customer_restore/{id}', 'CustomerController@restore')->name('customer.restore');

Route::get('customer_restoreAll', 'CustomerController@restoreAll')->name('customer.restoreAll');

Route::get('customer_delete/{id}', 'CustomerController@delete')->name('customer.delete');

Route::get('customer_deleteAll', 'CustomerController@deleteAll')->name('customer.deleteAll');

Route::resource('bill', 'BillController');

Route::get('bill_trash', 'BillController@trash')->name('bill.trash');

Route::get('bill_restore/{id}', 'BillController@restore')->name('bill.restore');

Route::get('bill_restoreAll', 'BillController@restoreAll')->name('bill.restoreAll');

Route::get('bill_deleteAll', 'BillController@deleteAll')->name('bill.deleteAll');


Route::resource('cart', 'CartController');

Route::get('addCart/{id}' , 'CartController@addCart')->name('addCart');

Route::post('/cart-add', 'CartController@add')->name('cart.add');

Route::post('/cart-clear', 'CartController@clear')->name('cart.clear');

Route::get('/removeCart/{id}' , 'CartController@remove')->name('cart.remove');

Route::post('/confirmCheckout', 'CartController@confirmCheckout')->name('confirmCheckout');
