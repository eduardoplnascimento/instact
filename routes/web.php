<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;

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

Route::get('/login', [UserController::class, 'login'])->name('login');
Route::get('/register', [UserController::class, 'register']);
Route::post('/signin', [UserController::class, 'signin']);
Route::post('/signup', [UserController::class, 'signup']);
Route::get('/logout', [UserController::class, 'logout']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [HomeController::class, 'dashboard']);
    Route::get('/posts/create', [PostController::class, 'create']);
    Route::post('/posts/store', [PostController::class, 'store']);
    Route::get('/posts/edit/{id}', [PostController::class, 'edit']);
    Route::post('/posts/update/{id}', [PostController::class, 'update']);
    Route::post('/posts/destroy/{id}', [PostController::class, 'destroy']);
});
