<?php

use App\Http\Controllers\DashboardPostController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/admin/dashboard',[DashboardPostController::class, 'index'] )->name('dashboard.welcome');
Route::get('/admin/dashboard/create/post',[DashboardPostController::class, 'create'] )->name('dashboard.create.post');
Route::post('/admin/dashboard/create/post',[DashboardPostController::class, 'store'] )->name('dashboard.store.post');
Route::get('/admin/dashboard/posts',[DashboardPostController::class, 'allPosts'] )->name('dashboard.posts');

Route::get('/',[PostController::class,'index'])->name('post');
Route::get('/posts',[PostController::class,'create'])->name('post.create');
Route::post('/posts',[PostController::class,'store'])->name('post.store');
Route::get('/posts/{post}',[PostController::class,'show'])->name('post.show');
Route::get('/posts/{post}/edit',[PostController::class,'edit'])->name('post.edit');
Route::put('/posts/{post}',[PostController::class,'update'])->name('post.update');
Route::delete('/posts/{post}',[PostController::class,'destroy'])->name('post.destroy');