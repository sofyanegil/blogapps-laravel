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
    $posts = Post::filter(request(['search', 'category', 'author']))->latest()->get(); //this lazy loading by default
    // $posts = Post::with(['category', 'user'])->get(); // eager loading
    return view('posts', [
        "title" => "Blog Page",
        "posts" => $posts
    ]);
});

Route::get('posts/{post:slug}', function (Post $post) {
    return view('post', [
        "title" => "Single Post",
        "post" => $post
    ]);
});

Route::get('authors/{user:username}', function (User $user) {
    // Eager load posts with category and user relationships
    $posts = $user->posts()->with(['category', 'user'])->get();

    return view('posts', [
        "title" => "{$posts->count()} articles by {$user->name}",
        "posts" => $posts
    ]);
});

Route::get('categories/{category:slug}', function (Category $category) {
    // Lazy load posts first, then eager load related category and user
    $posts = $category->posts; // Lazy loading posts
    $posts->load(['category', 'user']); // Eager loading relationships for the retrieved posts

    return view('posts', [
        "title" => "{$posts->count()} posts in category {$category->name}",
        "posts" => $posts
    ]);
});
