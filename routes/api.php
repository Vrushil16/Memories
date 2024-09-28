<?php

use App\Http\Controllers\UserController;
use App\Http\Controllers\MemoryController;

Route::post('/login', [UserController::class, 'login']);

Route::get('/memories/{user_id}', [MemoryController::class, 'index']);
Route::post('/memories', [MemoryController::class, 'store']);
Route::put('/memories/{id}', [MemoryController::class, 'update']);
Route::delete('/memories/{id}', [MemoryController::class, 'destroy']);

Route::get('/memories', [MemoryController::class, 'getAllMemories']);