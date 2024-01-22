<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\RegisterController;
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

Route::get('/', [MainController::class, 'showView'])->name('home');
Route::get('/home', [MainController::class, 'showView'])->name('home_page');
Route::middleware('auth')->group(function () {
    Route::prefix('/users')->group(function () {
        Route::any('/create', [UserController::class, 'create'])->name('users.create');
        Route::any('/update', [UserController::class, 'update'])->name('users.update');
        Route::any('/delete/{id}', [UserController::class, 'delete'])->name('users.delete');
        Route::any('/events/{id}', [UserController::class, 'usersEvents'])->name('users.events');
        Route::get('/', [UserController::class, 'index'])->name('users.index');
        Route::any('/{id}', [UserController::class, 'item'])->name('user.item');

    });
    Route::prefix('/events')->group(function () {
        Route::get('/', [EventController::class, 'index'])->name('events.index');
        Route::post('/create', [EventController::class, 'create'])->name('event.create');
        Route::any('/update', [EventController::class, 'update'])->name('event.update');
        Route::any('/delete/{id}', [EventController::class, 'delete'])->name('event.delete');
        Route::any('/{id}', [EventController::class, 'item'])->name('event.item');
    });
    Route::prefix('/categories')->group(function () {
        Route::get('/', [CategoryController::class, 'read'])->name('categories.index');
        Route::any('/create', [CategoryController::class, 'create'])->name('categories.create');
        Route::get('/read', [CategoryController::class, 'read'])->name('categories.index');
        Route::get('/read/sample', [CategoryController::class, 'readSample'])->name('categories.readSample');
        Route::any('/update', [CategoryController::class, 'update'])->name('categories.update');
        Route::any('/delete/{id}', [CategoryController::class, 'delete'])->name('categories.delete');
        Route::any('/{id}', [CategoryController::class, 'item'])->name('category.item');
    });
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisterController::class, 'registration'])->name('register.index');
    Route::post('/register_store', [RegisterController::class, 'store'])->name('register.store');

    Route::get('/login', [AuthController::class, 'index'])->name('login');
    Route::any('/auth', [AuthController::class, 'authenticator'])->name('login.authenticator');

    Route::any('/oauth/facebook', [\App\Http\Controllers\OAuth\SocialController::class, 'facebook'])->name('facebook');

});

