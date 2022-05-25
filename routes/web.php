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

Route::get('/', 'ConsController@showAllCons');

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

