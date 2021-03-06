<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\Dashboard\{DashboardController, CategoryController, PostController};
use App\Http\Controllers\PreviewController;
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

Route::middleware('guest')->as('auth.')->group(function () {
    Route::get('/', [AuthController::class, 'index'])->name('index');
    Route::post('/', [AuthController::class, 'authenticate'])->name('authenticate');
});
Route::middleware('auth')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/dashboard', DashboardController::class)->name('dashboard.index');

    Route::as('preview.')->group(function () {
        Route::get('/preview', [PreviewController::class, 'index'])->name('index');
        Route::get('/preview/{post}', [PreviewController::class, 'show'])->name('show');
    });

    Route::as('posts.')->group(function () {
        Route::put('restore/{id}', [PostController::class, 'restore'])->name('restore');
        Route::delete('delete/{id}', [PostController::class, 'delete'])->name('delete');
    });

    Route::resources([
        'categories' => CategoryController::class,
        'posts' => PostController::class
    ]);
});
