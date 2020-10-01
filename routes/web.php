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

Route::get('/', 'HomeController@index')->name('home');
Route::get('/home', 'HomeController@index')->name('home');

Route::resource('account', 'Account\AccountController');

Route::post('account/{account}/plan/change', 'Account\AccountController@planChange')->name('account.plan.change');

Route::get('account/{account}/user/create', 'User\UserController@create')->name('user.create');
Route::post('account/{account}/user', 'User\UserController@store')->name('user.store');
Route::get('account/{account}/user/{user}', 'User\UserController@edit')->name('user.edit');
Route::post('account/{account}/user/{user}', 'User\UserController@update')->name('user.update');
