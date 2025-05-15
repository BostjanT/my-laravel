<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\CategoriesController;
use App\Http\Controllers\PostsController;

Route::get('/', function () {
    return view('home');
});

Route::get('/', [PostsController::class, 'home'])->name('home');



Route::prefix('/')->group(function () {
    Route::get('/posts', function () {
        return view('posts');
    });
});

Route::resource('posts', PostsController::class);

Route::resource('categories', CategoriesController::class);

// CRUD (create, read, update, delete)
/* Route::post('/submit-post', function (Request $request) {
    $request->validate([
        'title' => 'required|min:3|max:30',
        'content' => 'required|min:10 ',
    ]);
    $title = $request ->input('title');
    $content = $request->input('content');

    return "Your post title is $title and the content is $content";
})->name('submit-post'); */
