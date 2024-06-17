<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\EvenementController;
use App\Http\Controllers\UserController;
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

/*
Route::get('/', function () {
    return view('welcome');
});


Route::get('/', [EvenementController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes de gestion des événements
Route::resource('/evenement', EvenementController::class)
    ->only(['index', 'store']) // Seuls les méthodes index et store sont accessibles
    ->middleware(['auth', 'verified']);
*/

Route::get('/', [EvenementController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    // Routes de gestion des événements
    Route::resource('evenement', EvenementController::class)
        ->only(['index', 'create', 'store'])
        ->middleware(['auth', 'verified']);
    });

    Route::middleware(['auth'])->group(function () {
        Route::get('/', [EvenementController::class, 'dashboard'])->name('dashboard');
        
        Route::resource('evenement', EvenementController::class)
            ->only(['index', 'create', 'store']);
        
        Route::middleware('admin')->prefix('admin')->group(function () {
            Route::get('/', [EvenementController::class, 'admin'])->name('admin.dashboard');
        });
    });

    //route pour recup mes users:
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    });
    
    Route::middleware(['auth', 'admin'])->group(function () {
        Route::get('/admin/dashboard', [EvenementController::class, 'admin'])->name('admin.dashboard');
});

//suppression des evebts
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [EvenementController::class, 'admin'])->name('admin.dashboard');
    Route::delete('/admin/evenement/bulk-delete', [EvenementController::class, 'bulkDelete'])->name('evenement.bulk-delete');
});

//gestion des users mise à jour
/*
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::patch('/admin/users/{id}', [UserController::class, 'update'])->name('admin.users.update');
});*/

//supression des users

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/users', [UserController::class, 'index'])->name('admin.users.index');
    Route::delete('/admin/users', [UserController::class, 'destroy'])->name('admin.users.destroy');
});
require __DIR__.'/auth.php';