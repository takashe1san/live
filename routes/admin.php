<?php

use Illuminate\Support\Facades\Route;


Route::get('addadmin', function () {
    return view('addAdd');
});

Route::post('addAdd', 'AdminController@addAdd');

Route::get('adminlog', function () {
    return view('adminLog');
});

Route::post('adlog', 'AdminController@adminLog');
