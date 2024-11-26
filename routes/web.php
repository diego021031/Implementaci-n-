<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\RoleController;
use App\Http\Middleware\AdminAuthenticate;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/post', [PostController::class, 'index']);
//Route::get('/post/view', [PostController::class, 'view']);
Route::resource('/role', RoleController::class);
Route::resource('/post', PostController::class);
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/dashboard', function () {
    return view('dashboard.home');
})->middleware(AdminAuthenticate::class);


