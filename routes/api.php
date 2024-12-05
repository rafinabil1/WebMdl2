<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\PostController;

Route::get('/posts', [PostController::class, 'index']); // Menampilkan semua post
Route::get('/posts/{id}', [PostController::class, 'show']); // Menampilkan detail post
Route::post('/posts', [PostController::class, 'store']); // Membuat post baru
Route::put('/posts/{id}', [PostController::class, 'update']); // Mengupdate post
Route::delete('/posts/{id}', [PostController::class, 'destroy']); // Menghapus post
