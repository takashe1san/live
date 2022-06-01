<?php

use Illuminate\Support\Facades\Route;

Route::get('/addCons', function () {
    return view('addConsultation');
})->middleware('isUser');

Route::post('/insertCon','ConsController@insCons');

Route::get('/showcon','ConsController@showCons')
    ->name('showcon');

Route::get('showallcon','ConsController@showAllCons');

Route::get('/delCon/{id}','ConsController@deleteCons')
    ->name('dcons');
    // ->middleware('ownCon');

Route::get('getCon/{id}','ConsController@getCons');

Route::get('lastid', 'ConsController@getID');

//********************** LIKES > *********************** */

Route::get('/like/{id}', 'LikesController@like');
