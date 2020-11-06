<?php

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

Route::get('/',[\App\Http\Controllers\PostController::class, 'index'])->name('index');

Route::get('/create',[\App\Http\Controllers\PostController::class, 'create'])->name('create');

Route::get('/show/{post}',[\App\Http\Controllers\PostController::class, 'show'])->name('show');

Route::post('/create',[\App\Http\Controllers\PostController::class, 'store'])->name('store');

Route::get('/{post}/edit',[\App\Http\Controllers\PostController::class, 'edit'])->name('edit');;

Route::put('/{post}',[\App\Http\Controllers\PostController::class, 'update'])->name('update');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
