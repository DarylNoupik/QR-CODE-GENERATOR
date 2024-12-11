<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\QRcodeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

# la route "simple-qrcode"
Route::get('/qrcode', [QRcodeController::class, 'index'])->name('qrcode.index');
Route::post('/qrcode', [QRcodeController::class, 'store'])->name('qrcode.store');





Route::get('/dashboard', function () {
    return view('dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
