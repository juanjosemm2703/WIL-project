<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ApplicationController;

// Route for displaying the application creation form
Route::get('/application/create/{project_id}', [ApplicationController::class, 'create'])->name('application.create');

// Route for storing a new application
Route::post('/application', [ApplicationController::class, 'store'])->name('application.store');