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

Route::get('/admin/products/create', 'Admin\ProductsController@create');
Route::get('/admin/products', 'Admin\ProductsController@index');
Route::post('/admin/products', 'Admin\ProductsController@store');
Route::delete('/admin/products/{id}', 'Admin\ProductsController@destroy');
Route::get('/admin/products/{id}/edit', 'Admin\ProductsController@edit');
Route::PATCH('/admin/products/{id}', 'Admin\ProductsController@update');

Route::get('/admin/users',"Admin\UsersController@index");
Route::delete('/admin/users/{id}', 'Admin\UsersController@destroy');
Route::get('/admin/users/{id}/edit', 'Admin\UsersController@edit');
Route::PATCH('/admin/users/{id}', 'Admin\UsersController@update');

Route::get('/home', 'User\HomeController@index');

Route::get('/auth/login',"Auth\LoginController@index");
Route::get('/auth/register',"Auth\RegisterController@addUser");
Route::post('/auth/login',"Auth\LoginController@login");
Route::post('/auth/register',"Auth\RegisterController@register");

Route::get('/product/cart/{id}', 'User\CartController@addcart');
Route::get('/user/cart', 'User\CartController@index');
Route::get('/user/order', 'User\CartController@createOrder');