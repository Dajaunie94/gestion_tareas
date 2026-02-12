<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\TaskController;

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {

    Route::post('/projects', [ProjectController::class, 'store']);
    Route::post('/projects/{project}/assign-user', [ProjectController::class, 'assignUser']);

    Route::post('/tasks', [TaskController::class, 'store']);

    Route::get('/my-tasks', [TaskController::class, 'myTasks']);
});

Route::get('/users/{id}/tasks', [TaskController::class, 'getUserTasks']);