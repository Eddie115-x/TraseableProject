<?php

use App\Http\Controllers\PostController;
use App\Models\Post;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $latestPosts = Post::latest()->take(3)->get();
    return view('home', compact('latestPosts'));
});

Route::resource('posts', PostController::class);
