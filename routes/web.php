<?php

use App\Http\Controllers\CategoriesController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Http\Controllers\SearchesController;
use App\Http\Controllers\TagsController;
use Illuminate\Support\Facades\Artisan;

//Pages
Route::get('/', [PagesController::class, 'index'])->name('index');
Route::get('/about', [PagesController::class, 'about']);
Route::get('/contact', [PagesController::class, 'contact']);

//Authentication
Auth::routes();

//Dashboard
Route::get('/admin', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/admin/messages', [App\Http\Controllers\MessagesController::class, 'index']);
Route::post('/admin/messages', [App\Http\Controllers\MessagesController::class, 'store']);
Route::delete('admin/messages/{id}/delete', [App\Http\Controllers\MessagesController::class, 'destroy'])->name('delete_message');

//posts
Route::get('/blog', [PostsController::class, 'index']);
Route::get('/blog/create', [PostsController::class, 'create']);
Route::get('/blog/{slug}', [PostsController::class, 'show']);
Route::get('/blog/{slug}/edit', [PostsController::class, 'edit']);
Route::delete('/blog/{slug}/delete', [PostsController::class, 'destroy'])->name('delete_post');
Route::post('/blog/store',[PostsController::class, 'store']);
Route::put('/blog/{slug}/update', [PostsController::class, 'update'])->name('edit_post');

//Categories
Route::get('/categories', [CategoriesController::class, 'index']);
Route::post('/categories', [CategoriesController::class, 'store'])->name('create_category');
Route::get('/categories/{name}', [CategoriesController::class, 'show']);

//Search
Route::get('/search/{s?}', [SearchesController::class,'getIndex'])->where('s', '[\w\d]+');

//Tags
Route::get('/tags/{name}', [TagsController::class, 'show']);
