<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::group(['middleaware'=>"web"],function(){
    Route::get('/','RestroController@index');
    Route::get('/list','RestroController@list');
    Route::get('/add','RestroController@view');
    Route::post('/store','RestroController@store');
    Route::get('/delete/{id}','RestroController@delete');
    Route::get('/edit/{id}','RestroController@edit');
    Route::post('/update','RestroController@update');
    Route::view('register', 'register');
    Route::post('register','RestroController@register');
    Route::view('login', 'login');
    Route::post('login','RestroController@login');
});
