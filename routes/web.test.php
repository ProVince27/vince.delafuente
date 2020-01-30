<?php

Route::get('test',function(){
    dd("fuck");
});
Route::view('google-map', 'app.dev.google-service.google-map-container')->name('dev.google-map');
Route::get('google-kml', 'Google\KmlController@index')->name('dev.google-kml');
Route::get('dev.media-manager', 'Media\FileManagerController@index')->name('dev.media-manager');
