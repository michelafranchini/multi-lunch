<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;
use App\Console\Kernel; 

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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/admin', 'Admin\AdminController@index')->name('admin')->middleware('admin');

// Route::any('/groups', 'Admin\AdminController@getLunch')->name('groups'); 
//Route::any('/groups', 'Kernel@schedule')->name('groups'); 

Route::get('/config', 'Admin\AdminController@create')->name('config');
Route::post('/config/success', 'Admin\AdminController@store')->name('config.store');

Route::get('/edit/{id}', 'Admin\AdminController@edit')->name('editconfig');
Route::patch('/edit/{id}/success', 'Admin\AdminController@update')->name('editconfig.update');

Route::get('/user', 'User\UserController@index')->name('user')->middleware('user');
Route::get('/user/create', 'User\UserController@create')->name('addRestaurant');
Route::post('/user/createsuccess', 'User\UserController@store')->name('addRestaurant.store');
