<?php

use Illuminate\Support\Facades\Route;


Route::post('/insertInfo','InfoController@insInfo');

Route::get('showInfo','InfoController@showInfo');

Route::get('/delInfo/{id}','InfoController@deleteInfo');

Route::get('getInfo/{id}','InfoController@getInfo');
