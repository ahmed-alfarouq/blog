<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = Post::latest()->limit(10)->get();

    return view('home', ['posts' => $latestPosts]);
});
