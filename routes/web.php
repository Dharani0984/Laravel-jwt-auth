<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarbersController;

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


Route::group(['middleware' => 'auth'], function () {


Route::get('/home','BarbersController@index');
Route::POST('/add_barbers','BarbersController@store');
Route::get('/barber_edit/{id}','BarbersController@edit');
Route::get('/barber_delete/{id}','BarbersController@destroy');
Route::get('/barber_approved/{id}','BarbersController@update');
Route::get('/barber_disapproved/{id}','BarbersController@update1');
Route::get('/reviews','ReviewsController@index');

});




Auth::routes();

//Route::get('/home', 'HomeController@index')->name('test');
