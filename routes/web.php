<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZugController;
use App\Http\Controllers\WagonController;

use App\Models\Zug;
use App\Models\Wagon;
use App\Models\relation;
use Illuminate\Support\Facades\DB;
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

Route::resource('zugs', 'ZugController');
Route::resource('wagons', 'WagonController');
Route::get('/edit-wagon', 'WagonController@show1')->name('edit-wagon');
Route::post('/search', 'WagonController@search')->name('wagons.search');


Route::get('/WagenHinzufügen', 'HomeController@add')->name('add');
Route::get('/', 'ZugController@show')->name('home');
Route::get('/addwagon/{zug}', 'ZugController@create')->name('addwagon');

Route::post('/wagons/{zug}', 'WagonController@store')->name('wagons');

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
Route::get('/list2', 'HomeController@list2')->name('list2');
Route::get('/wagons', 'WagonController@index')->name('list');
Route::get('/listwagon', 'WagonController@wagonszug')->name('listwagon');



