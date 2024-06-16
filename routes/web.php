<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Response; 

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

Route::get('/dashboard', [EvenementController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes de gestion des événements
Route::resource('evenement', EvenementController::class)
    ->only(['index', 'store']) // Seuls les méthodes index et store sont accessibles
    ->middleware(['auth', 'verified']);

require __DIR__.'/auth.php';