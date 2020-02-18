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

Route::get('/','HomeController@home')->name('home');
Route::get('storys/{id}','HomeController@story')->name('story');
Route::get('chapter/{id}','HomeController@chapter')->name('chapter');
Route::get('ranking','HomeController@ranking')->name('ranking');
Route::get('bookshelf','HomeController@bookshelf')->name('bookshelf');
Route::get('writer','HomeController@writer')->name('writer');
Route::get('search','HomeController@search')->name('search');
Route::get('contact','HomeController@contact')->name('contact');
Route::get('register','HomeController@register')->name('register');