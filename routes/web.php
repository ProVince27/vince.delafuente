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


Route::get('/base','Controller@index')->name('parent');
Route::get('/child','Controller@index')->name('child1');
Route::get('/child2','Controller@index')->name('child2');
Route::get('/content','Dashboard\DashboardController@index')->name('dashboard');