<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProjectController;

// Route for displaying the list of projects
Route::get('/projects', [ProjectController::class, 'index'])->name('project.index');

// Route for storing a new project
Route::post('/project', [ProjectController::class, 'store'])->name('project.store');

// Route for displaying the project creation form
Route::get('/project/create', [ProjectController::class, 'create'])->name('project.create');

// Route for showing details of a specific project
Route::get('/project/{id}', [ProjectController::class, 'show'])->name('project.show');

// Route for updating a specific project
Route::put('/project/{id}', [ProjectController::class, 'update'])->name('project.update');

// Route for deleting a specific project
Route::delete('/project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

// Route for displaying the project editing form
Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');