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
    Route::get('/detail', 'AdminController@detailtrans')->name('detail');
    
    
    Route::get('/history', 'AdminController@history')->name('history');
    Route::get('/historydetail/{id}', 'AdminController@historydetail')->name('historydetail');
    Route::get('/historyreject/{id}', 'AdminController@historyreject')->name('historyreject');
    
    Route::get('/item', 'AdminController@item')->name('item');
    Route::get('/itemadd', 'AdminController@itemadd')->name('itemadd');
    Route::post('/add', 'AdminController@add');
    Route::get('/itemdetail/{id}', 'AdminController@itemdetail')->name('itemdetail');
    Route::get('/itemdelete/{id}', 'AdminController@itemdelete')->name('itemdelete');
    Route::post('/itemedit/{id}', 'AdminController@itemedit');
    Route::get('/itemout', 'AdminController@itemout')->name('itemout');
    Route::get('/itemoutdetail/{id}', 'AdminController@itemoutdetail')->name('itemoutdetail');
    
    Route::get('/request', 'AdminController@request')->name('request');
    Route::get('/requestdetail/{id}', 'AdminController@requestdetail')->name('requestdetail');
    Route::get('/approve/{id}', 'AdminController@approve')->name('approve');
    Route::get('/reject/{id}', 'AdminController@reject')->name('reject');
    
    Route::get('/user', 'AdminController@user')->name('user');
    Route::get('/userdetail/{id}', 'AdminController@userdetail')->name('userdetail');
    Route::get('/userdelete/{id}', 'AdminController@userdelete')->name('userdelete');
    Route::post('/useredit/{id}', 'AdminController@useredit');
    Route::post('/do_receive', 'AdminController@do_receive_item')->name('do_receive');
});

Route::prefix('user')->name('user.')->group(function () {
    Route::get('/','UserController@index')->name('dashboard');
    Route::get('/pinjam','UserController@pinjam')->name('pinjam');
    Route::get('/pinjam','UserController@pinjam')->name('pinjam');
    Route::get('/riwayat','UserController@riwayat_pinjam')->name('riwayat_pinjam');
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