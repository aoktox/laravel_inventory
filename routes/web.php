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

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/', 'AdminController@index')->name('dashboard');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/','UserController@index')->name('dashboard');
    Route::get('/pinjam','UserController@pinjam')->name('pinjam');
    Route::post('/pinjam','UserController@do_pinjam')->name('do_pinjam');
});



Route::get('/test', function (){
    \App\User::create([
        'name'=>'Administrator',
        'email'=>'admin@laravel.com',
        'password'=>bcrypt('rahasia'),
        'is_admin'=>true
    ]);
    \App\User::create([
        'name'=>'Pengguna',
        'email'=>'user@laravel.com',
        'password'=>bcrypt('rahasia'),
    ]);
});