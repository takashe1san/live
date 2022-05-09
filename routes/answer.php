<?php

use Illuminate\Support\Facades\Route;

Route::get('addAns', function () {
    return view('addAnswer');
})->middleware('isDoctor');

Route::post('insertAns','AnsController@insAns')
    ->name('answ');

Route::get('dans/{id?}', 'AnsController@deleteAns')
    ->name('dans');

Route::get('/showans','AnsController@showAns')
    ->name('showans');

Route::get('showallans','AnsController@showAllAns');
