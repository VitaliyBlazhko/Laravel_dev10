<?php

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

Route::get('/', [\App\Http\Controllers\MainController::class, 'showView'])->name('home');
Route::prefix('/users')->group( function (){
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::get('/item/{id}', [\App\Http\Controllers\UserController::class, 'item'])->name('user.item');
});
Route::prefix('/events')->group( function () {
    Route::get('/', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');
    Route::get('/item/{id}', [\App\Http\Controllers\EventController::class, 'item'])->name('event.item');
});
