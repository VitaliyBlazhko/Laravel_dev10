<?php

use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/events', [EventController::class, 'getAllEvents'])->name('events');
Route::get('/event/{id}', [EventController::class, 'getEvent'])->name('event');
Route::put('/event/update/{id}', [EventController::class, 'eventUpdate'])->name('event.update');
Route::get('/event/delete/{id}', [EventController::class, 'eventDelete'])->name('event.delete');

Route::get('/users', [UserController::class, 'getAllUsers'])->name('users');
Route::get('/user/{id}', [UserController::class, 'getUser'])->name('user');
Route::put('/user/update/{id}', [UserController::class, 'userUpdate'])->name('user.update');
Route::get('/user/delete/{id}', [UserController::class, 'userDelete'])->name('user.delete');
