<?php

use Illuminate\Support\Facades\Route;

// Route::get('/addCons', function () {
//     return view('addConsultation');
// })->middleware('isUser');

Route::post('/insertCon','ConsController@insCons');

Route::get('/con/{id}','ConsController@showCons');

// Route::get('showallcon','ConsController@showAllCons');

Route::get('/delCon/{id}','ConsController@deleteCons')
    ->name('dcons');

// Route::get('getCon/{id}','ConsController@getCons');

Route::get('lastid', 'ConsController@getID');

//********************** LIKES > *********************** */

Route::get('/like/{id}', 'LikesController@like');

//********************** Search *************************/

Route::get('/docsearch/{content?}', 'ConsController@Csearch');