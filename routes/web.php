<?php

use Illuminate\Support\Facades\Auth;
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


Route::prefix('backend')->group(function(){

    Route::prefix('dashboard')->group(function(){
        Route::get('/','Admin\DashboardController@index')->name('admin.dashboard');
    });

    Route::prefix('room')->group(function(){
        Route::get('/','Admin\RoomController@index')->name('room.index');
        Route::get('/create','Admin\RoomController@create')->name('room.create');
        Route::post('/','Admin\RoomController@store')->name('room.store');
        Route::get('/{id}','Admin\RoomController@show')->name('room.show');
        Route::get('/gambar/{id}','Admin\RoomController@tambahgambar')->name('image.add');
        Route::post('/image','Admin\RoomController@gambarstore')->name('gambar.store');
    });
    
    Route::prefix('/transaction')->group(function(){
        Route::get('/checkout','Admin\TransactionController@checkout')->name('transaction.checkout');
        Route::post('/checkout','Admin\TransactionController@keluar')->name('transaction.keluar');
    });
    Route::resource('/transaction',Admin\TransactionController::class);
    Route::resource('/facilities',Admin\FacilitiesController::class);
});


Auth::routes();



