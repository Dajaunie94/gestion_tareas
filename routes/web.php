<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Web\ProjectController;
use App\Http\Controllers\Web\TaskController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});


// 🔹 Dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth'])
    ->name('dashboard');


// 🔹 Rutas protegidas
Route::middleware(['auth'])->group(function () {

    // Perfil
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');


    // Proyectos
    Route::resource('projects', ProjectController::class)
        ->only(['index', 'create', 'store']);

    Route::get('/projects/{project}/assign',
        [ProjectController::class, 'assignUserForm']
    )->name('projects.assign.form');

    Route::post('/projects/{project}/assign',
        [ProjectController::class, 'assignUser']
    )->name('projects.assign');


    // Tareas
    Route::resource('tasks', TaskController::class)
        ->only(['index', 'create', 'store']);

        

});

require __DIR__.'/auth.php';
