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
    // return view('welcome');
    return redirect()->route('public.product.index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('product', 'PublicController@index')->name('public.product.index');
Route::get('product/{product}', 'PublicController@show')->name('public.product.show');

Route::prefix('admin')->namespace('Admin')->middleware('auth')->group(function () {
    Route::resource('product', ProductController::class);
});
