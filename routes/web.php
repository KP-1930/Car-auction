<?php

use Illuminate\Support\Facades\Route;
use App\Http\Middleware\Admin;

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

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// For Super Admin
Route::get('SuperAdmin', 'SuperAdminController@index')->middleware(['SuperAdmin','LastActivity'])->name('SuperAdmin');
Route::get('/search', 'SuperAdminControllerController@search')->name('search');
Route::post('/particularsearch', 'SuperAdminController@particularsearch')->name('particularsearch');
Route::get('/create', 'SuperAdminController@create')->name('create');
Route::post('/store', 'SuperAdminController@store')->name('store');
Route::get('home/edit/{id}','SuperAdminController@edit')->name('home.edit');
Route::put('home/update/{id}','SuperAdminController@update')->name('home.update');
Route::get('home/delete/{id}','SuperAdminController@delete')->name('home.delete');

Route::get('/dynamic_pdf/pdf', 'DynamicPDFController@pdf'); 






Route::get('adminView','AdminController@adminView')->middleware(['Admin','LastActivity'])->name('adminView');
Route::post('/adminsearch', 'AdminController@adminsearch')->name('adminsearch');







Route::get('userView','UserController@index')->middleware(['Users','LastActivity'])->name('userView');
Route::post('/searches', 'UserController@searches')->name('searches');




