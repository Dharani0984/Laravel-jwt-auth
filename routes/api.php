<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\ProductController;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
Route::post('login', [ApiController::class, 'authenticate']);
Route::POST('register', [ApiController::class, 'register']);

Route::get('test-products', 'tetproductsController@index');
Route::get('flights', 'flightsController@index');


Route::get('/empdata', 'EmpController@index');
Route::post('/savedata','EmpController@store');


Route::get('/users','ReviewsController@index');

Route::get('/countries','CountriesController@index');
Route::get('/countries/{id}','CountriesController@show');
Route::post('/savecontry','CountriesController@store');
Route::put('/updatecountry/{id}','CountriesController@update');
Route::delete('/deletecountry/{id}','CountriesController@destroy');





    Route::group(['middleware' => ['jwt.verify']], function() {
    Route::get('logout', [ApiController::class, 'logout']);
    Route::get('get_user', [ApiController::class, 'get_user']);
    Route::get('products', [ProductController::class, 'index']);
    Route::get('products/{id}', [ProductController::class, 'show']);
    Route::post('create', [ProductController::class, 'store']);
    Route::put('update/{product}',  [ProductController::class, 'update']);
    Route::delete('delete/{product}',  [ProductController::class, 'destroy']);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
