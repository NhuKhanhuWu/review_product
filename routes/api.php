<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\UserController;
use App\Models\User;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware(['web'])->group(function () {
    // login
    Route::get('/login', function () {
        return view('user.login');
    })->name('login');
    Route::post('/login_check', [AuthController::class, 'login'])->name('login_check');

    // logout
    Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum')->name('logout');

    // check login
    Route::get('/check-login-ajax', [AuthController::class, 'checkLoginAjax'])->name('check_login_ajax');

    // create account
    Route::post('/users', [UserController::class, 'store'])->name('users.store');
});


// show account infor
// Route::resource('users', User::class)->only(['show', 'create', 'store']);

// ->middleware('auth:sanctum')
