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
Route::resource('returns', 'ReturnController');

Route::get('/admin', function () {
    $data['title'] = "Login ";
    return view('auth.loginAdmin', $data);
})->middleware('guest');

Auth::routes();

Route::prefix('admin')->middleware(['CheckUsers:admin@gmail.com', 'auth'])->group(function () {
    Route::get('/dashboard', 'DashboardController@index')->name('dashboard');

    Route::resource('car', 'CarController')->middleware('auth');

    Route::resource('pelanggan', 'UserController')->middleware('auth');

    Route::resource('returns', 'ReturnController')->middleware('auth');

    Route::get('returns', ['as' => 'returns.index', 'uses' => 'ReturnController@index'])->middleware('auth');
});
