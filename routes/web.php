<?php

use App\Http\Controllers\AdminControllers\DashboardController;
use App\Http\Controllers\AdminControllers\PostController;
use App\Http\Controllers\PublicPagesController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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

 Route::name('public.')->group(function () {
    Route::get('/', [PublicPagesController::class, 'homePage'])->name('home');
    Route::get('/articles/{post:slug}', [PostController::class, 'show'])->name('post.show');
    Route::name('account.')->group(function(){
        Route::get('login', [UserController::class, 'login'])->middleware('guest')->name('login');
        Route::post('login', [UserController::class, 'auth'])->middleware('guest');
        Route::post('logout', [UserController::class, 'logout'])->middleware('auth')->name('logout');
    });
});

Route::name('admin.')->group(function(){
    Route::middleware(['auth','can:admin'])->group(function(){
        Route::prefix('/admin-dashboard')->group(function () {
            Route::get('/', [DashboardController::class, 'home'])->name('home');
            Route::get('/articles', [PostController::class, 'index']);
            Route::get('/articles/create', [PostController::class, 'create']);
            Route::post('/articles', [PostController::class, 'store']);
            Route::get('/articles/{post:id}/edit', [PostController::class, 'edit']);
            Route::put('/articles/{post:id}', [PostController::class, 'update']);
            Route::post('/articles', [PostController::class, 'store']);
            Route::delete('/articles/{post:id}', [PostController::class, 'destroy']);

        });
    });
});

