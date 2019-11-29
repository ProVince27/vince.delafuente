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


Route::get('/','Dashboard\DashboardController@index')->name('dashboard');

Route::group(['namespace' => 'Access'],function(){
    Route::view('role','app.dev.underconstruction.underconstruction-page',['title' => 'Role'])->name('role.index');
    Route::view('permission','app.dev.underconstruction.underconstruction-page',['title' => 'Permission'])->name('permission.index');
});

Route::group(['namespace' => 'navigation'],function(){
    Route::view('sidebar','app.dev.underconstruction.underconstruction-page',['title' => 'Sidebar'])->name('sidebar.index');
    Route::view('menu','app.dev.underconstruction.underconstruction-page',['title' => 'Menu'])->name('menu.index');
});