<?php

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
    return view('welcome');
});

Route::get('/top','SController@topView')->name('S');
Route::get('/top1','AController@topView')->name('A');
Route::get('/top2','BController@topView')->name('B');
Route::get('/top3','CController@topView')->name('C');
Route::get('/top4','DController@topView')->name('D');
Route::get('/top5','EController@topView')->name('E');
Route::get('/top6','FController@topView')->name('F');
Route::get('/top7','GController@topView')->name('G');
Route::get('/top8','HController@topView')->name('H');

Route::get('/inofrmation','AController@A');
Route::post('top3','AController@add');