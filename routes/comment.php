<?php

use Illuminate\Support\Facades\Route;

Route::post('insertCom','CommController@insComm');

Route::get('dcom/{id?}', 'CommController@deleteCom')
    ->name('dcom');

Route::get('addCom', function () {
    return view('addcoment');
});

Route::get('comment', 'CommController@showComm');

