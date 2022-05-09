<?php

use Illuminate\Support\Facades\Route;

// Routes for accounts (Users/Doctors)

Route::get('/user', function () {
    return "i'm user :)";
})->middleware('isUser');

Route::get('/doctor', function () {
    return "i'm doctor 8)";
})->middleware('isDoctor');

Route::get('/test', function (){
    return view('signup');
});

Route::get('/log', function(){
    return view('login');
})->middleware('log');

Route::post('/sign','AccountsController@signup')
    ->name('signup');

Route::post('/login', 'AccountsController@login')
    ->name('login');

Route::get('/logout', 'AccountsController@logout');

Route::get('/show', 'AccountsController@showInfo')
    ->name('showInfo');

Route::get('update', function () {
    return view('update');
});
Route::post('upinfo', 'AccountsController@upInfo');

Route::get('sess', function () {
    return session()->all();
});

Route::get('del-acc', 'AccountsController@deleteAcc');

Route::get('users', 'UsersController@showAll');

Route::get('doctors', 'DoctorController@showAll');
