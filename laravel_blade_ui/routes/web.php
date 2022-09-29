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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::post('/home/delete_categories/{id}', [App\Http\Controllers\HomeController::class, 'delete_categories']);
Route::post('/home/add_categories', [App\Http\Controllers\HomeController::class, 'add_categories']);
Route::post('/home/update_categories/{id}', [App\Http\Controllers\HomeController::class, 'update_categories']);

Route::post('/home/delete_articles/{id}', [App\Http\Controllers\HomeController::class, 'delete_articles']);
Route::post('/home/add_articles', [App\Http\Controllers\HomeController::class, 'add_articles']);
Route::post('/home/update_articles/{id}', [App\Http\Controllers\HomeController::class, 'update_articles']);
