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

//Route::get('/home', 'HomeController@index');


// Route::get('/user', 'User\UserController@index')->name('users.home');
// Route::get('/user/create', 'User\UserController@create')->name('users.addRestaurant'); 
// Route::post('/user/createsuccess', 'User\UserController@store')->name('users.addRestaurant.store');
// Route::get('/admin', 'Admin\AdminController@index')->name('admin.home');

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware('admin');
//Route::post('/addnumber', 'Admin\AdminController@getNumber');
Route::any('/groups', 'Admin\AdminController@getNumber')->name('groups'); 

Route::get('/user', 'User\UserController@index')->name('user')->middleware('user');
Route::get('/user/create', 'User\UserController@create')->name('addRestaurant');
Route::post('/user/createsuccess', 'User\UserController@store')->name('addRestaurant.store');
