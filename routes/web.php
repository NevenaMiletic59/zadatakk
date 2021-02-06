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


Route::get('/','ClanakController@index')->name('home');
Route::get('/kreirajClanak','ClanakController@create')->middleware('isLoggedIn');
Route::post('/kreiraj','ClanakController@store')->middleware('isLoggedIn')->name('kreiraj');
Route::get('exportCsv','ClanakController@export')->name('exportCsv');
Route::post('/login','LoginController@doLogin')->name('login');
Route::get('/logout','LoginController@logOut')->name('logout');