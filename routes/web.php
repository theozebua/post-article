<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\{DashboardController, CategoryController, PostController};
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

Route::view('/', 'welcome');;
Route::middleware('guest')->as('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'index'])->name('index');
    Route::post('/login', [AuthController::class, 'authenticate'])->name('authenticate');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard.index');

    Route::as('posts.')->group(function () {
        Route::put('restore/{id}', [PostController::class, 'restore'])->name('restore');
        Route::delete('delete/{id}', [PostController::class, 'delete'])->name('delete');
    });

    Route::resources([
        'categories' => CategoryController::class,
        'posts' => PostController::class
    ]);
});
