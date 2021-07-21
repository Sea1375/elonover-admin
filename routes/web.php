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
    return view('welcome');
});

Auth::routes();

Route::get('/users', 'UsersController@index')->name('users');
Route::get('/transactions', 'TransactionController@index')->name('transactions');
Route::get('/punch_chains', 'TransactionController@punch_chains')->name('punch_chains');
Route::get('/settings', 'SettingController@index')->name('settings');
Route::post('/settings', 'SettingController@update')->name('update_settings');
