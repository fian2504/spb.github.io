<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function () {
    return view('layouts.base');
});
Route::get('/testpdf', function () {
    return view('pdf.base');
});


Route::get('/spb', 'SpbController@index');
Route::get('/spb/pb1/{id}','SpbController@pb1');
Route::get('/spb/alamat/{id}', 'SpbController@setAlamat');

// Data Rekanan
Route::get('/rekanan','DataRekanan@index');
Route::get('/rekanan/tambah','DataRekanan@add');
Route::get('/rekanan/edit/{id}','DataRekanan@edit');
Route::post('/rekanan','DataRekanan@store');
Route::put('/rekanan/{id}','DataRekanan@update');  //edit rekanan
Route::delete('/rekanan/hapus/{id}', 'DataRekanan@destroy');

//Data Pejabat
Route::get('/pejabat','DataPejabat@index');
Route::get('/pejabat/tambah','DataPejabat@add');  //tambah pejabat
Route::post('/pejabat','DataPejabat@store'); //tambah pejabat
Route::get('/pejabat/edit/{id}','DataPejabat@edit');  //edit pejabat
Route::put('/pejabat/{id}','DataPejabat@update');  //edit pejabat
Route::delete('/pejabat/hapus/{id}', 'DataPejabat@destroy');  //hapus datapejabat

//db SPB
Route::get('/db_spb/{id}/print', 'SpbController@print');
Route::get('/db_spb', 'SpbController@db_spb');
Route::post('/db_spb', 'SpbController@new_db_spb');
Route::get('/db_spb/{id}/edit','SpbController@edit_db_spb');


// Users
Route::get('/login','UserController@index');
Route::post('/login','UserController@authenticate');
Route::get('/akun','UserController@akun');
Route::get('/akun/tambah','UserController@add_akun');
Route::post('/akun','UserController@store');









