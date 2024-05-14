<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/', [ProductController::class, 'home'])->name('home');

Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
Route::post('/login', [AuthController::class, 'login']);

Route::get('/productos/{slug}', [ProductController::class, 'showBySlug'])->name('productos.showBySlug');

Route::middleware('auth')->group(function () {
    Route::resource('users', UserController::class);
    Route::resource('categories', CategoryController::class);
    Route::resource('products', ProductController::class);
});
