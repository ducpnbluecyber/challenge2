<?php

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
Auth::routes();
Route::get('/', function(){
    return redirect('/home');
});

Route::get('/logout', 'Auth\LoginController@logout');

Route::get('/home', 'HomeController@index')->name('home');
Route::resource('users', 'UserController');

Route::post('/messages', 'MessageController@store');

Route::get('/messages',  'MessageController@index');
Route::resource('assignments', 'AssignmentController');
Route::resource('challenges', 'ChallengeController');

Route::get('download/{filename}', 'AssignmentController@download');
Route::post('challenge-submit', 'ChallengeController@submit');