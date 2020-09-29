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

Route::get('/', 'ShopController@index')->name('shop');
Route::get('/home', 'HomeController@index')->name('home')->middleware('verified');
Route::get('/contact','ShopController@contact')->name('contact');
Route::post('/postContact','ShopController@postContact')->name('post-contact');
Route::get('addCart/{id}','ShopController@addCart')->name('add-cart');
Route::get('showCart','ShopController@showCart')->name('show-cart');
Route::get('deleteCart/{id}','ShopController@deleteCart')->name('delete-cart');
Route::post('updateCart','ShopController@updateCart')->name('update-cart');
Route::get('products/details/{id}','ShopController@getProductDetail')->name('get-product-detail');
Route::get('order','ShopController@getOrder')->name('get-order');
Route::post('saveOrder','ShopController@storeOrder')->name('save-order');
Route::get('/categories/{id}/products','ShopController@listProductByCategory')->name('search-product-by-category');
Route::get('brands/{id}/products','ShopController@listProductByBrand')->name('search-product-by-brand');
Route::post('/product/autocomplete','ShopController@fetch')->name('autocomplete');
Route::post('/search','ShopController@search')->name('search-product');
Route::get('news','ShopController@news')->name('news');


Route::group(['prefix'	=> 'categories','middleware' => 'isAdmin'], function(){
	Route::get('/','CategoryController@index')->name('list-category');
	Route::get('/create','CategoryController@create')->name('create-category');
	Route::post('','CategoryController@store')->name('store-category');
	Route::get('/{id}/edit','CategoryController@edit')->name('edit-category');
	Route::put('/{id}','CategoryController@update')->name('update-category');
	Route::delete('/{id}','CategoryController@destroy')->name('delete-category');
	Route::get('/{id}/listProductByCategory','CategoryController@listProductByCategory')->name('list-product-by-category');
});

Route::group(['prefix'	=>	'products','middleware' => 'isAdmin'], function(){
	Route::get('/','ProductController@index')->name('list-product');
	Route::get('/create','ProductController@create')->name('create-product');
	Route::post('/store','ProductController@store')->name('store-product');
	Route::get('/{id}/edit','ProductController@edit')->name('edit-product');
	Route::put('/{id}','ProductController@update')->name('update-product');
	Route::delete('/{id}','ProductController@destroy')->name('delete-product');
	Route::get('/{id}/detail','ProductController@show')->name('product-show-detail');
	Route::post('/admin/product-search','ProductController@search')->name('admin-product-search');
});

Route::group(['prefix'	=>	'brands','middleware' => 'isAdmin'], function(){
	Route::get('/','BrandController@index')->name('list-brand');
	Route::get('/create','BrandController@create')->name('create-brand');
	Route::post('/','BrandController@store')->name('store-brand');
	Route::get('/{id}/edit','BrandController@edit')->name('edit-brand');
	Route::put('/{id}','BrandController@update')->name('update-brand');
	Route::delete('/{id}','BrandController@destroy')->name('delete-brand');
	Route::get('/{id}/listProductByBrand','BrandController@listProductByBrand')->name('list-product-by-brand');
});

Route::group(['prefix'	=>	'users'], function(){
	Route::get('/','UserController@index')->name('list-user');
	Route::get('/{id}/edit','UserController@edit')->name('edit-user');
	Route::put('/{id}','UserController@update')->name('update-user');
	Route::get('/{id}/listOrderOfUser','UserController@listOrderOfUser')->name('list-order-of-user');
	Route::delete('/{id}','UserController@destroy')->name('delete-user');
});

Route::group(['prefix'	=>	'orders','middleware' => 'isAdmin'],function(){
	Route::get('/','OrderController@index')->name('list-order');
	Route::get('/confirm/{id}','OrderController@update')->name('confirm-order'); 
	Route::delete('/{id}','OrderController@destroy')->name('delete-order');
	Route::get('getDetails/{id}','OrderController@getDetails')->name('get-detail');
});
Auth::routes(['verify' => true]);

