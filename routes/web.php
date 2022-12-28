<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZugController;
use App\Models\Zug;
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


Route::get('/', 'HomeController@index')->name('home');
Route::get('/WagenHinzufügen', 'HomeController@add')->name('add');

Route::post('/addzug', function () {
    Zug::create([
        'name' => request('name'),
        'nachname' => request('nachname'),
        'versandbanhof' => request('versandbanhof'),
        'bestimmungsbanhof' => request('bestimmungsbanhof'),
        'datum' => request('datum'),
        'ref' => request('ref'),
        'zugnummer' => request('zugnummer'),
        'Mindestbremshunderstel' => request('Mindestbremshunderstel')

    ]);
    return redirect('/');
});
