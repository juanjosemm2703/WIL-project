<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PartnerController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\ApplicationController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Route::resource('partner', PartnerController::class)->middleware(['auth']);

Route::get('/home', [PartnerController::class, 'index'])
->middleware(['auth', 'verified'])->name('home');

Route::put('/partner/{id}', [PartnerController::class, 'update'])
->middleware(['auth', 'teacher'])->name('partner.update');

Route::get('/partner/{id}', [PartnerController::class, 'show'])
->middleware(['auth'])->name('partner.show');


Route::get('/projects', [ProjectController::class, 'index'])
->middleware(['auth'])->name('project.index');

Route::get('/project/create', [ProjectController::class, 'create'])
->middleware(['auth', 'partner'])->name('project.create');

Route::post('/project', [ProjectController::class, 'store'])
->middleware(['auth', 'partner'])->name('project.store');

Route::get('/project/{id}', [ProjectController::class, 'show'])
->middleware(['auth'])->name('project.show');

Route::get('/project/{id}/edit', [ProjectController::class, 'edit'])
->middleware(['auth', 'validatePartner'])->name('project.edit');

Route::put('/project/{id}', [ProjectController::class, 'update'])
->middleware(['auth', 'validatePartner'])->name('project.update');

Route::delete('/project/{id}', [ProjectController::class, 'destroy'])
->middleware(['auth', 'validatePartner'])->name('project.destroy');


Route::get('/application/create', [ApplicationController::class, 'create'])
->middleware(['auth'])->name('application.create');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
