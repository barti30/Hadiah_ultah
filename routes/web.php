<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\MemoriesController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LetterController;
use App\Http\Controllers\GaleriController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// 🔴 Logout (manual)
    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();
        return redirect('/login');
    });

Route::get('/migrate', function () {
    Artisan::call('migrate', ['--force' => true]);
    return 'Migrated!';
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::resource('admin', AdminController::class);
});

// Route user
Route::middleware(['auth', 'role:user'])->group(function () {
    Route::get('/welcome', [UserController::class, 'welcome'])->name('user.welcome');
    Route::get('/dashboard', [UserController::class, 'dashboard'])->name('dashboard');
    Route::get('/memories', [MemoriesController::class, 'index'])->name('memories');
    Route::get('/flower', [UserController::class, 'flower'])->name('flower');
    Route::get('/letter', [userController::class, 'letter'])->name('letter');
    Route::get('/galeri', [GaleriController::class, 'index'])->name('galeri');






});

require __DIR__.'/auth.php';
