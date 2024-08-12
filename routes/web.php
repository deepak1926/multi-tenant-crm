<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Models\Tenant;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ReportingController; 
use App\Http\Controllers\InteractionController; 

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::get('/', function () {
    $tenants = Tenant::all();
    return view('auth/register',compact('tenants'));
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
Route::middleware('auth')->group(function () {
    Route::get('/clients', [ClientController::class, 'index'])->name('clients.index');
    Route::get('/clients/create', [ClientController::class, 'create'])->name('clients.create');
    Route::post('/clients/store', [ClientController::class, 'store'])->name('clients.store');
    Route::get('/clients/{id}', [ClientController::class, 'show'])->name('clients.show');
    Route::put('/clients/{id}', [ClientController::class, 'update'])->name('clients.update');
    Route::delete('/clients/{id}', [ClientController::class, 'destroy'])->name('clients.destroy');
    Route::get('/clients/edit/{id}',[ClientController::class,'edit'])->name('clients.edit');
});
Route::middleware('auth')->group(function () {
    Route::get('/interactions', [InteractionController::class, 'index'])->name('interactions.index');
    Route::get('/interactions/create/{id}', [InteractionController::class, 'create'])->name('interactions.create');
    Route::post('/interactions', [InteractionController::class, 'store'])->name('interactions.store');
    Route::get('/interactions/{id}', [InteractionController::class, 'show'])->name('interactions.show');
    Route::put('/interactions/{id}', [InteractionController::class, 'update'])->name('interactions.update');
    Route::delete('/interactions/{id}', [InteractionController::class, 'destroy'])->name('interactions.destroy');
});
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/report/clients', [ReportingController::class, 'clientsReport'])->name('report.clients');
    Route::get('/report/interactions', [ReportingController::class, 'interactionsReport'])->name('report.interactions');
});

require __DIR__.'/auth.php';
