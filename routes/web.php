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
    $account = DB::table('accounts')->where('id', 1)->first();
    return view('index')->with('accountName', $account->name);
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
