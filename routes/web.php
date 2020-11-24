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
//Route::get('user', 'UserController@index')->name('user.index');
//Route::get('user/create', 'UserController@create')->name('user.create');
//Route::post('user', 'UserController@store')->name('user.store');
//Route::get('user/{id}/edit', 'UserController@edit')->name('user.edit');
//Route::put('user/{id}/update','UserController@update')->name('user.update');

//Route::delete('user/{id}', 'UserController@destroy')->name('user.delete');	
//Route::get('user/{id}', 'UserController@show')->name('user.show');	

//backend

Route::get('admin','AdminController@index')->name('admin.create');
Route::get('/dashboard','AdminController@show_dashboard')->name('admin.show');

Route::get('/logout','AdminController@logout')->name('admin.logout');
Route::post('dashboard','AdminController@dashboard')->name('admin.dashboard');


//Category Product
Route::get('category/create','CategoryProduct@add_category_product')->name('category.add');
Route::get('/all-category-product','CategoryProduct@all_category_product')->name('category.all');

Route::get('/unactive-category-product/{id}','CategoryProduct@unactive_category_product')->name('category.unactive');
Route::get('/active-category-product/{id}','CategoryProduct@active_category_product')->name('category.active');

Route::post('category','CategoryProduct@store')->name('category.store');

Route::get('/category/{id}/edit','CategoryProduct@edit')->name('category.edit');
Route::put('category/{id}/update','CategoryProduct@update')->name('category.update');
Route::delete('category/{id}', 'CategoryProduct@destroy')->name('category.delete');	


//brand
Route::get('brand/create','BrandController@add_brand_product')->name('brand.add');
Route::get('/all-brand-product','BrandController@all_brand_product')->name('brand.all');

Route::get('/unactive-brand-product/{id}','BrandController@unactive_brand_product')->name('brand.unactive');
Route::get('/active-brand-product/{id}','BrandController@active_brand_product')->name('brand.active');

Route::post('brand','BrandController@store')->name('brand.store');

Route::get('/brand/{id}/edit','BrandController@edit')->name('brand.edit');
Route::put('brand/{id}/update','BrandController@update')->name('brand.update');
Route::delete('brand/{id}', 'BrandController@destroy')->name('brand.delete');	

//products
Route::get('product/create','ProductController@add_product_product')->name('product.add');
Route::get('/all-product','ProductController@all_product_product')->name('product.all');

Route::get('/unactive-product/{id}','ProductController@unactive_product_product')->name('product.unactive');
Route::get('/active-product/{id}','ProductController@active_product_product')->name('product.active');

Route::post('product','ProductController@store')->name('product.store');

Route::get('product/{id}/edit','ProductController@edit')->name('product.edit');
Route::put('product/{id}/update','ProductController@update')->name('product.update');
Route::delete('product/{id}', 'ProductController@destroy')->name('product.delete');	



