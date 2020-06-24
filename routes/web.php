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

Route::get('/auth/login',"Auth\LoginController@index")->name("auth.login");

Route::get('/auth/register',"Auth\RegisterController@addUser")->name("auth.register");

Route::post('/auth/login',"Auth\LoginController@login");

Route::post('/auth/register',"Auth\RegisterController@register");