<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::prefix('/auth')->group(function () {
    Route::post('/login', [App\Http\Controllers\AuthController::class, 'login']);
    Route::post('/register', [App\Http\Controllers\AuthController::class, 'register']);
    Route::post('/logout', [App\Http\Controllers\AuthController::class, 'logout']);
    Route::post('/refresh', [App\Http\Controllers\AuthController::class, 'refresh']);
});

Route::prefix('/categories')->group(function () {
    Route::get('/list', [App\Http\Controllers\HomeController::class, 'getAllCategories']);
    Route::post('/create', [App\Http\Controllers\HomeController::class, 'createCategories']);
    Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'updateCategories']);
    Route::post('/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteCategories']);
});

Route::prefix('/articles')->group(function () {
    Route::get('/detail/{id}', [App\Http\Controllers\HomeController::class, 'getAllArticles']);
    Route::get('/page', [App\Http\Controllers\HomeController::class, 'getArticles']);
    Route::post('/create', [App\Http\Controllers\HomeController::class, 'createArticles']);
    Route::post('/update/{id}', [App\Http\Controllers\HomeController::class, 'updateArticles']);
    Route::post('/delete/{id}', [App\Http\Controllers\HomeController::class, 'deleteArticles']);
});
