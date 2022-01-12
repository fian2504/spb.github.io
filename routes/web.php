<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

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
Route::get('/home', function () {
    return view('home');
});

Route::get('/spb', 'SpbController@index');
Route::get('/spb/pb1/{id}','SpbController@pb1');
Route::get('/spb/alamat/{id}', 'SpbController@setAlamat');
Route::post('/db_spb', 'SpbController@new_db_spb');
Route::get('/db_spb', 'SpbController@db_spb');

// Data
Route::get('/rekanan','DataRekanan@index');
Route::get('/rekanan/tambah','DataRekanan@add');
Route::get('/rekanan/edit/{id}','DataRekanan@edit');
Route::post('/rekanan','DataRekanan@store');
Route::put('/rekanan/{id}','DataRekanan@update');  //edit rekanan

Route::delete('/rekanan/hapus/{id}', 'DataRekanan@destroy');

Route::get('/pejabat','DataPejabat@index');
Route::get('/pejabat/tambah','DataPejabat@add');  //tambah pejabat
Route::post('/pejabat','DataPejabat@store'); //tambah pejabat
Route::get('/pejabat/edit/{id}','DataPejabat@edit');  //edit pejabat
Route::put('/pejabat/{id}','DataPejabat@update');  //edit pejabat
Route::delete('/pejabat/hapus/{id}', 'DataPejabat@destroy');  //hapus datapejabat









// Route::get('/spb', [SpbController::class, 'index']);
// });
// Route::get('/ba1', function () {
//     return view('form.ba1');
// });
// Route::get('/ba2', function () {
//     return view('form.ba2');
// });
// Route::get('/ba3', function () {
//     return view('form.ba3');
// });
// Route::get('users/{id}', function ($id) {

// });
