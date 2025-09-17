<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = Post::latest()->limit(10)->get();

    return view('home', ['posts' => $latestPosts]);
});

Route::controller(PostController::class)->group(function () {
    Route::get('/blog', 'index');
    Route::get('/blog/create', 'create')->middleware('auth');
    Route::get('/blog/{post}', 'show');

    Route::post('/blog', 'store');
    Route::get('/blog/{post}/edit', 'edit')
        ->middleware('auth')
        ->can('edit', 'post');

    Route::patch('/blog/{post}', 'update');
    Route::delete('/blog/{post}', 'destroy');
});

Route::controller(AuthController::class)->group(function () {
    Route::view('/login', 'auth.login')->name('login');
    Route::view('/register', 'auth.register');
    Route::view('/verify-otp', 'auth.otp');

    Route::post('/otp', 'verifyOTP');

    Route::post('/login', 'login')->middleware('throttle:auth');
    Route::post('/register', 'register')->middleware('throttle:auth');
    Route::post('/logout', 'logout');
});
