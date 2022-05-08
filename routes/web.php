<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\DoctorController;
use Illuminate\Http\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rules\Unique;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
// home ********************************************************************
Route::get('/home', function () {
    return view('welcome');
});

// consultation ************************************************************
Route::get('/addCons', function () {
    return view('addConsultation');
})->middleware('isUser');

Route::post('/insertCon','ConsController@insCons')
    ->name('cons');

Route::get('/showcon','ConsController@showCons')
    ->name('showcon');

Route::get('showallcon','ConsController@showAllCons');

Route::get('/delCon/{id?}','ConsController@deleteCons')
    ->name('dcons')
    ->middleware('ownCon');

Route::get('getCon/{id}','ConsController@getCons');

Route::get('lastid', 'ConsController@getID');

// answers *****************************************************************
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

// comment *****************************************************************
Route::post('insertCom','CommController@insComm');

Route::get('dcom/{id?}', 'CommController@deleteCom')
    ->name('dcom');

Route::get('addCom', function () {
    return view('addcoment');
});

Route::get('comment', 'CommController@showComm');


// account ***************************************************************
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
// report ********************************************************

Route::get('addrep', function () {
    return view('report');
});

Route::get('insertrep', 'RepoController@addRepo');

// files *********************************************************

Route::get('write/{text}', function ($text) {
    Storage::disk('local')->put('t.txt', $text);
});

Route::get('read', function () {
    return Storage::path('t.txt');
});

Route::post('img', 'FileController@personal');

Route::post('upload','FileController@multiFile')->name('up');

Route::get('file', function () {
    return view('file');
});

Route::get('del-img', 'FileController@imgDelete');

Route::get('imges', 'FileController@showImg');

// Admins ******************************************************

Route::get('addadmin', function () {
    return view('addAdd');
});

Route::post('addAdd', 'AdminController@addAdd');

Route::get('adminlog', function () {
    return view('adminLog');
});

Route::post('adlog', 'AdminController@adminLog');
