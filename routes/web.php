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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', function(){
    return view('home');
});

// Route::get('/home', 'User\HomeController@index');
Route::get('/home', 'User\HomeController@product');

Route::get('/logout', 'User\HomeController@logout');
Route::post('/home', 'User\HomeController@sort');
Route::post('/home', 'User\HomeController@productOfCate');
Route::post('/home', 'User\HomeController@searchProduct');

Route::get('/product/detail/{id}', 'User\HomeController@detail');

Route::get('/auth/login',"Auth\LoginController@index");
Route::get('/auth/register',"Auth\RegisterController@addUser");
Route::post('/auth/login',"Auth\LoginController@login");
Route::post('/auth/register',"Auth\RegisterController@register");

Route::get('/product/cart/{id}', 'User\CartController@addcart');
Route::get('/user/cart', 'User\CartController@index');
Route::post('/user/cart', 'User\CartController@update');

Route::post('/user/order', 'User\CartController@createOrder');
Route::get('/user/order', 'User\CartController@createOrder');
Route::post('/user/order/check', 'User\OrderController@order');

Route::group(['middleware'=>"adminLogin"], function(){

Route::get('/admin/dashboard',"Admin\DashboardController@index");

// USER
Route::get('/admin/users',"Admin\UsersController@index");
Route::delete('/admin/users/{id}', 'Admin\UsersController@destroy');
Route::get('/admin/users/{id}/edit', 'Admin\UsersController@edit');
Route::PATCH('/admin/users/{id}', 'Admin\UsersController@update');


// PRODUCT
Route::get('/admin/products/create', 'Admin\ProductsController@create');
Route::get('/admin/products', 'Admin\ProductsController@index');
Route::post('/admin/products', 'Admin\ProductsController@store');
Route::delete('/admin/products/{id}', 'Admin\ProductsController@destroy');
Route::get('/admin/products/{id}/edit', 'Admin\ProductsController@edit');
Route::PATCH('/admin/products/{id}', 'Admin\ProductsController@update');
Route::get('/admin/dashboard/order/products/{id}', 'User\OrderController@productOrder');


});

//CATEGORY


//PROMOTION


//ORDER


//CUSTOMER
