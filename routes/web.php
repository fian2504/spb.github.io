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

// Data
Route::get('/rekanan','DataRekanan@index');
Route::get('/rekanan/edit/{id}','DataRekanan@edit');

Route::get('/pejabat','DataPejabat@index');
Route::get('/pejabat/tambah','DataPejabat@add');
Route::post('/pejabat','DataPejabat@store');
Route::get('/pejabat/edit/{id}','DataPejabat@edit');
Route::delete('/pejabat/hapus/{id}', 'DataPejabat@destroy');









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
