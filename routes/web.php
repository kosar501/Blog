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

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/index', 'IndexController@index');
Route::get('/editDocx', 'IndexController@editDocx');
Route::get('/editDocx1', 'IndexController@editDocx1');
Route::get('/editDocx2', 'IndexController@editDocx2');
Route::get('/editDocx3', 'IndexController@editDocx3');
Route::get('/editDocx4', 'IndexController@editDocx4');


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
