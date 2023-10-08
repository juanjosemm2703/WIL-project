<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;

// Route for displaying the list of students
Route::get('/students', [StudentController::class, 'index'])->name('student.index');

// Route for showing details of a specific student
Route::get('/student/{id}', [StudentController::class, 'show'])->name('student.show');

// Route for displaying the student editing form
Route::get('/student/{id}/edit', [StudentController::class, 'edit'])->name('student.edit');

// Route for updating a specific student
Route::put('/student/{id}', [StudentController::class, 'update'])->name('student.update');
