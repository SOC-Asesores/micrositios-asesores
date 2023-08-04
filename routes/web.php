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

Route::get('/', function () {
    return view('welcome');
});
Route::get('/silvestre-alberto-gaona-parra', function () {
    return redirect('/alberto-gaona');
});

# Route::get('/{url}','App\Http\Controllers\UserController@getUser');
Route::get('/{url}','App\Http\Controllers\UserController@getUser');
Route::get('/testing/{url}','App\Http\Controllers\UserController@getUserTesting');

