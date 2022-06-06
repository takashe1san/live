<?php

use Illuminate\Support\Facades\Route;


Route::get('dashboard', 'AdminController@dash');

Route::post('addAdd', 'AdminController@addAdd');

Route::get('adminlog', function () {
    return view('adminLog');
});

Route::post('adlog', 'AdminController@adminLog');
