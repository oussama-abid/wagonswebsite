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


Route::get('/', function () {
    return view('welcome');
});
<<<<<<< HEAD

Route::get('/test', function () {
    return view('test');
=======
Route::get('/home', function () {
    return view('home');
>>>>>>> 5ac39061f5cdf40500a8ee90e50f2a76832f9972
});
