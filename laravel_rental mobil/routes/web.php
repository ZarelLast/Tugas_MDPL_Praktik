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
    $data['title'] = "Login ";
    return view('auth.login', $data);
})->middleware('guest');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/viewMobil/{id}', 'HomeController@viewMobil')->name('liat_mobil');
Route::post('/pesan', 'HomeController@pesan');
Route::get('/nota/{id}', 'HomeController@nota')->name('nota');

Route::get('/admin', function () {
    $data['title'] = "Login ";
    return view('auth.loginAdmin', $data);
})->middleware('guest');

Route::prefix('profile')->middleware('auth')->group(function(){
    Route::get('/{id}', 'ProfileController@index')->name('profile');
    Route::post('/update/{id}', 'ProfileController@update');
});

Auth::routes();


Route::prefix('admin')->middleware(['CheckUsers:admin@gmail.com', 'auth'])->group(function () {
    Route::delete('/car/delete/{id}','CarController@destroy');
    Route::delete('/pelanggan/delete/{id}','UserController@destroy');
    Route::get('/pelanggan/delete/{id}','UserController@destroy');
    Route::delete('/returns/delete/{id}','ReturnController@destroy');
    Route::get('/returns/print','ReturnController@downloadCVS');

    Route::get('dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('car', 'CarController');

    Route::resource('pelanggan', 'UserController');

    Route::resource('returns', 'ReturnController');

    Route::get('returns', ['as' => 'returns.index', 'uses' => 'ReturnController@index']);
});
