<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('products.index');
});

Route::resource('products', ProductController::class);

Route::resource('reviews', ReviewController::class)->only('store');

Route::resource('users', UserController::class)->except(['store']);
Route::get('/{user}/reviews', [UserController::class, 'reviews'])->name('users.review');
// Route::get('users/{user}', [UserController::class, 'show'])->middleware('auth:sanctum')->name('users.show');
