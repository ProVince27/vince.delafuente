<?php

Route::view('google-map','app.dev.google-service.google-map-container')->name('dev.google-map');
Route::get('google-kml','Google\KmlController@index')->name('dev.google-kml');