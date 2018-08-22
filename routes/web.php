<?php

Route::get('/', 'HomeController@index');
Route::post('/shorten', 'HomeController@shorten');
Route::get('/{code}', 'HomeController@redirect');
