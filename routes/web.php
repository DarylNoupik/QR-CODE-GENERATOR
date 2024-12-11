<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NameController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Models\Name;

Route::get('/', [AuthenticatedSessionController::class, 'create']
);

Route::get('/dashboard', function () {
    $names = Name::all();
    return view('dashboard', compact('names'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
 

    Route::get('/index', [NameController::class, 'index'])->name('home');
    Route::post('/generate', [NameController::class, 'generate'])->name('generate');
    
});

require __DIR__.'/auth.php';


