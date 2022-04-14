<?php

use App\Http\Controllers\API\CommentController;
use App\Http\Controllers\API\MusicianController;
use App\Http\Controllers\API\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('/register', [UserController::class, 'register']);
Route::post('/login', [UserController::class, 'login']);

Route::get('/musicians', [MusicianController::class, 'get']);
Route::get('/musicians/{id}', [MusicianController::class, 'get_by_id']); 

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [UserController::class, 'logout']);
    Route::put('/users/update', [UserController::class, 'update']);
    Route::put('/users/publish', [UserController::class, 'publish']);

    Route::put('/musicians/{id}/like', [MusicianController::class, 'like']);

    Route::post('/comments/{musician_id}', [CommentController::class, 'post']);
    Route::delete('/comments/{id}', [CommentController::class, 'delete']);
    Route::get('/comments/{musician_id}', [CommentController::class, 'get_by_musician']);
});