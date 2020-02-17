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

Route::get('/', 'Dashboard\DashboardController@index')->name('dashboard');

Route::group(['namespace' => 'Access'], function () {
    Route::view('role', 'app.dev.underconstruction.underconstruction-page', ['title' => 'Role'])->name('role.index');
    Route::view('permission', 'app.dev.underconstruction.underconstruction-page', ['title' => 'Permission'])->name('permission.index');
});

Route::group(['namespace' => 'Navigation'], function () {
    Route::view('sidebar', 'app.dev.underconstruction.underconstruction-page', ['title' => 'Sidebar'])->name('sidebar.index');
    Route::view('menu', 'app.dev.underconstruction.underconstruction-page', ['title' => 'Menu'])->name('menu.index');
});

Route::group(['namespace' => 'Cms'], function () {
    Route::view('content-management', 'app.pages.page-builder.page-builder-index', ['title' => 'Page Builder'])->name('page.cms.page-builder');
    // Route::view('');    
});

Route::group(['namespace' => 'Media'], function(){
    Route::name('ckfinder.upload')->get('media-manager/upload','FileManagerController@upload');
    Route::name('ckfinder.filebrowser')->get('ckfinder/filebrowser','FileManagerController@browseFile');
});