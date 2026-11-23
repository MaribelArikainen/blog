<?php

use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PublicController;
use App\Http\Controllers\TagController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/posts', [PublicController::class, 'index']);
Route::get('/post/{post}', [PublicController::class, 'post']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/admin/posts', [PostController::class, 'index']);
    Route::post('/admin/posts', [PostController::class, 'store']);
    Route::get('/admin/posts/{post}', [PostController::class, 'show']);
    Route::patch('/admin/posts/{post}', [PostController::class, 'update']);
    Route::delete('/admin/posts/{post}', [PostController::class, 'destroy']);

    Route::get('/admin/tags', [TagController::class, 'index']);
    Route::post('/admin/tags', [TagController::class, 'store']);
    Route::get('/admin/tags/{tag}', [TagController::class, 'show']);
    Route::patch('/admin/tags/{tag}', [TagController::class, 'update']);
    Route::delete('/admin/tags/{tag}', [TagController::class, 'destroy']);
});

Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::post('/register', [RegisteredUserController::class, 'store']);
Route::delete('/logout', [AuthenticatedSessionController::class, 'destroy']);
