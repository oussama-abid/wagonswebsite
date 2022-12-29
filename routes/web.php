<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZugController;
use App\Models\Zug;
use App\Models\Wagon;
use App\Models\relation;

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
Route::get('/WagenHinzufügen', 'HomeController@add')->name('add');
Route::get('/', 'ZugController@show')->name('home');
Route::get('/addwagon/{zug}', 'ZugController@create')->name('addwagon');

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
Route::get('/list', 'WagonController@list')->name('list');

Route::post('/addwagen', function () {
    $wagon = new Wagon;
    $wagon->wagennummer = request('wagennummer');
    $wagon->gattungsbuchstabe = request('gattungsbuchstabe');
    $wagon->längeüberpuffer = request('längeüberpuffer');
    $wagon->eigenmasse = request('eigenmasse');
    $wagon->AnzahlderAcshen = request('AnzahlderAcshen');
    $wagon->GewichtderLadung = request('GewichtderLadung');
    $wagon->Bremsgewicht = request('Bremsgewicht');
    $wagon->lastwechselundbremsgewicht = request('lastwechselundbremsgewicht');
    $wagon->bremsstellung = request('bremsstellung');
    $wagon->hinweisezureibungsbremse = request('hinweisezureibungsbremse');
    $wagon->bemerkungenzurfeststellbremse = request('bemerkungenzurfeststellbremse');
    $wagon->bemerkung = request('bemerkung');
    $wagon->Schadwagen = request('Schadwagen');
    $wagon->Beladenmitgefahrgut = request('Beladenmitgefahrgut');
    $wagon->UNNummer = request('UNNummer');
    $wagon->versandbanhof = request('zugversandbanhof');
    $wagon->bestimmungsbanhof = request('zugbestimmungsbanhof');
    $wagon->datum = request('zugdatum');
    $wagon->save();

    relation::create([
        'zug_id' => request('zugid'),
        'wagon_id' => $wagon->id
    ]);
    return redirect('/list');
});
