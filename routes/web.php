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
    Route::any('/create', [\App\Http\Controllers\UserController::class, 'create'])->name('users.create');
    Route::any('/update/{id}', [\App\Http\Controllers\UserController::class, 'update'])->name('users.update');
    Route::any('/delete/{id}', [\App\Http\Controllers\UserController::class, 'delete'])->name('users.delete');
    Route::any('/events/{id}', [\App\Http\Controllers\UserController::class, 'usersEvents'])->name('users.events');
    Route::get('/', [\App\Http\Controllers\UserController::class, 'index'])->name('users.index');
    Route::any('/{id}', [\App\Http\Controllers\UserController::class, 'item'])->name('user.item');

});
Route::prefix('/events')->group( function () {
    Route::get('/', [\App\Http\Controllers\EventController::class, 'index'])->name('events.index');
    Route::any('/create', [\App\Http\Controllers\EventController::class, 'create'])->name('event.create');
    Route::any('/update/{id}', [\App\Http\Controllers\EventController::class, 'update'])->name('event.update');
    Route::any('/delete/{id}', [\App\Http\Controllers\EventController::class, 'delete'])->name('event.delete');
    Route::any('/{id}', [\App\Http\Controllers\EventController::class, 'item'])->name('event.item');
});
Route::prefix('/categories')->group( function () {
Route::get('/', [\App\Http\Controllers\CategoryController::class, 'read'])->name('categories.index');
Route::get('/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('categories.create');
Route::get('/read', [\App\Http\Controllers\CategoryController::class, 'read'])->name('categories.index');
Route::get('/read/sample', [\App\Http\Controllers\CategoryController::class, 'readSample'])->name('categories.readSample');
Route::get('/update/{id}', [\App\Http\Controllers\CategoryController::class, 'update'])->name('categories.update');
Route::get('/delete/{id}', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('categories.delete');
Route::get('/delete', [\App\Http\Controllers\CategoryController::class, 'delete'])->name('categories.delete_last');
});
