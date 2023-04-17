<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ZugController;
use App\Http\Controllers\WagonController;
use App\Http\Controllers\ForgotPasswordController;
use Illuminate\Support\Facades\Auth;
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




Route::middleware(['auth'])->group(function () {


    Route::get('/home-employee', 'ZugController@empshow');







    Route::middleware(['auth', 'boss'])->group(function () {
        
        Route::post('/registeremployee', 'LoginController@registeremployee')->name('registeremployee');
        Route::get('/add-employee', function () {
            return view('boss/addemployee');
        })->name('add-employee');
        Route::get('/home-Firmenchef', 'ZugController@bossshow');  
        Route::post('/add-wagon-archive/{wagon}', 'WagonController@addnewarchive'); 
        Route::get('/employeesmanagment', 'LoginController@employeesmanagment')->name('employeesmanagment');     
    });
    

    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/', 'ZugController@show')->name('home');    
        Route::get('/list2', 'HomeController@list2')->name('list2');
        Route::get('/wagons', 'WagonController@index')->name('list');
        Route::get('/listwagon', 'WagonController@wagonszug')->name('listwagon');
        Route::get('/addFirmenchef', function () {
            return view('register');
        })->name('addboss');
        Route::post('/register', 'LoginController@register')->name('register');
        
        Route::get('/userslist/{id}', 'LoginController@userslist')->name('userslist');
        Route::post('/deleteboss/{user}', 'LoginController@deleteboss');
        
        Route::get('/usersmanagment', 'LoginController@usersmanagment')->name('usersmanagment'); 
       
    });
    Route::post('/updateuser/{id}', 'LoginController@updateuser')->name('updateuser');
    Route::get('/edit-user', 'LoginController@edituser')->name('edit-user');
    Route::post('/deleteemp/{user}', 'LoginController@deleteemp');
    Route::resource('zugs', 'ZugController');
    Route::post('/upload/image', 'ZugController@uploadlogo')->name('upload.image');
    Route::get('/search', 'WagonController@search')->name('wagons.search');

    Route::post('/search', 'WagonController@search')->name('wagons.search');
    //com
    Route::post('/wagons/{zug}', 'WagonController@store')->name('wagons');
    Route::get('/addwagon/{zug}', 'ZugController@create')->name('addwagon');
    Route::get('/WagenHinzufügen', 'HomeController@add')->name('add');
    Route::resource('wagons', 'WagonController');
    Route::get('/pdf/{zug}', 'WagonController@pdf')->name('pdf');
    Route::get('/edit-zug', 'ZugController@show1')->name('edit-zug');
    Route::post('/addzug', function () {
    
        $user = Auth::user(); 
        if($user->type == "employee"){
        $zug = Zug::where('userid',$user->userboss)->get();
        if(count($zug)>0){
            Zug::create([
                'name' => request('name'),
                'nachname' => request('nachname'),
                'versandbanhof' => request('versandbanhof'),
                'bestimmungsbanhof' => request('bestimmungsbanhof'),
                'datum' => request('datum'),
                'ref' => request('ref'),
                'zugnummer' => request('zugnummer'),
                'Mindestbremshunderstel' => request('Mindestbremshunderstel'),
                'bossid' => $user->userboss,
                'logo' => $zug->first()->logo,
                'userid' => Auth::id(),
                'seczugnummer' => request('seczugnummer'),
                'betriebsstelle' => request('betriebsstelle'),
                'secbetriebsstelle' => request('secbetriebsstelle'),
                'evu' => request('evu'),
    
            ]);        
        }
        else{
            Zug::create([
                'name' => request('name'),
                'nachname' => request('nachname'),
                'versandbanhof' => request('versandbanhof'),
                'bestimmungsbanhof' => request('bestimmungsbanhof'),
                'datum' => request('datum'),
                'ref' => request('ref'),
                'zugnummer' => request('zugnummer'),
                'Mindestbremshunderstel' => request('Mindestbremshunderstel'),
                'bossid' => $user->userboss,
                
                'userid' => Auth::id(),
                'seczugnummer' => request('seczugnummer'),
                'betriebsstelle' => request('betriebsstelle'),
                'secbetriebsstelle' => request('secbetriebsstelle'),
                'evu' => request('evu'),
    
            ]);
        }
        
       return redirect('/');
    }
    else {
        $zug = Zug::where('userid',$user->id)->get();
        $nb = Zug::where('userid',$user->id)->count();
      
        if ($nb>0){
            Zug::create([
                'name' => request('name'),
                'nachname' => request('nachname'),
                'versandbanhof' => request('versandbanhof'),
                'bestimmungsbanhof' => request('bestimmungsbanhof'),
                'datum' => request('datum'),
                'ref' => request('ref'),
                'zugnummer' => request('zugnummer'),
                'Mindestbremshunderstel' => request('Mindestbremshunderstel'),
                'bossid' => Auth::id(),
                'userid' => Auth::id(),
                'logo' => $zug->first()->logo,
                'seczugnummer' => request('seczugnummer'),
                'betriebsstelle' => request('betriebsstelle'),
                'secbetriebsstelle' => request('secbetriebsstelle'),
                'evu' => request('evu'),
    
            ]);
        }
        else {
            Zug::create([
                'name' => request('name'),
                'nachname' => request('nachname'),
                'versandbanhof' => request('versandbanhof'),
                'bestimmungsbanhof' => request('bestimmungsbanhof'),
                'datum' => request('datum'),
                'ref' => request('ref'),
                'zugnummer' => request('zugnummer'),
                'Mindestbremshunderstel' => request('Mindestbremshunderstel'),
                'bossid' => Auth::id(),
                'userid' => Auth::id(),
                'seczugnummer' => request('seczugnummer'),
                'betriebsstelle' => request('betriebsstelle'),
                'secbetriebsstelle' => request('secbetriebsstelle'),
                'evu' => request('evu'),
                
    
            ]);
        }
        
       return redirect('/');
    }
    });

    Route::get('/Archivverwalten', 'LoginController@archivmanagment')->name('Archivverwalten');
    Route::get('/employees/{id}', 'LoginController@usersarchivelist')->name('userslistarchive');
    Route::post('/deletewagonarch/{wagon}', 'WagonController@deleteonearch')->name('deletearch');
    Route::get('/zugliste/{id}', 'LoginController@zuglist')->name('zuglist');
    Route::get('/addwagonarchive/{zug}', 'ZugController@createarchive')->name('addwagonarchive');
    Route::get('/edit-wagon-archive', 'WagonController@showarch')->name('editarchivewagon');
    Route::get('/wagonsarchiveliste/{id}', 'LoginController@wagonsarchive')->name('wagonarchivelist');

    Route::get('/edit-wagon', 'WagonController@show1')->name('edit-wagon');
    Route::post('/deletezug/{zug}', 'ZugController@deleteone');
    Route::post('/deleteall/{zug}', 'WagonController@deleteall');
    Route::post('/deletewagon/{wagon}', 'WagonController@deleteone');
    Route::post('/logout', 'LoginController@logout')->name('logout');
});
Route::get('/get-list', 'ZugController@getList')->name('getList');


Route::get('/login', function () {
    if (Auth::check()) {
        return redirect('/');
    }
    return view('login');
});

Route::post('/login', 'LoginController@login')->name('login');


Route::get('forget-password','ForgotPasswordController@showForgetPasswordForm')->name('forget.password.get');
Route::post('forget-password', 'ForgotPasswordController@submitForgetPasswordForm')->name('forget.password.post'); 
Route::get('reset-password/{token}', 'ForgotPasswordController@showResetPasswordForm')->name('reset.password.get');
Route::post('reset-password', 'ForgotPasswordController@submitResetPasswordForm')->name('reset.password.post');











































//QR
Route::post('/link', function () {
    $url = request('link');
    $html = file_get_contents($url);
    $a = strip_tags($html);
    $b = preg_replace('/\s+/', '', $a);
    $word = "Wagennummer";
    $pos = strpos($b, $word);
    $result = substr($b, $pos + strlen($word), 12);

    return $result;
});
