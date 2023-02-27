<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::get('/',[PostController::class,'index'])->name('index.post');

Route::get('/new',[PostController::class,'create'])->name('index.create');

Route::post('/create',[PostController::class,'addPost'])->name('post.add');

Route::get('/read/{id}',[PostController::class,'showPost'])->name('post.show');

Route::delete('destroy/{id}',[PostController::class,'destroy'])->name('post.destroy');

Route::get('/edit/{id}',[PostController::class,'editPost'])->name('post.edit');

Route::put('/update/{id}',[PostController::class,'updatePost'])->name('post.update');
