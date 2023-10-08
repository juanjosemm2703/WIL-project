<?php
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;

// Route for displaying the home or main page
Route::get('/home', [PartnerController::class, 'index'])->name('home');

// Route for updating partner information
Route::put('/partner/{id}', [PartnerController::class, 'update'])->name('partner.update');

// Route for showing partner information
Route::get('/partner/{id}', [PartnerController::class, 'show'])->name('partner.show');
