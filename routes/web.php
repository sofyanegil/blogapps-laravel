<?php

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home', ["title" => "Home Page"]);
});
Route::get('/about', function () {
    return view('about', ["title" => "About Page"]);
});

Route::get('/contact', function () {
    return view('contact', ["title" => "Contact Page"]);
});

Route::get('/posts', function () {
    return view('posts', [
        "title" => "Blog Page",
        "posts" => Post::all()
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        "title" => "Single Post",
        "post" => $post
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    return view('posts', [
        "title" => "{$category->posts->count()} post in category {$category->name}",
        "posts" => $category->posts
    ]);
});

Route::get('authors/{user:username}', function (User $user) {

    return view('posts', [
        "title" => "{$user->posts->count()} articles by {$user->name}",
        "posts" => $user->posts
    ]);
});
