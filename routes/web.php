<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
// Pastikan AuthController sudah diimport dari namespace yang benar

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
| Di sini Anda dapat mendaftarkan rute web untuk aplikasi Anda.
|
*/

// 1. LANDING PAGE (Route: /)
// Menampilkan halaman sambutan 'Saldo-In' (welcome.blade.php)
Route::get('/', [AuthController::class, 'showLandingPage'])->name('landing'); 


// 2. AUTHENTICATION (Login & Register)
// Rute di dalam grup ini hanya dapat diakses oleh pengguna yang BELUM LOGIN (guest).
Route::middleware('guest')->group(function () {
    // --- LOGIN ---
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);

    // --- REGISTER ---
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});


// 3. LOGOUT (POST request)
// Dapat diakses oleh pengguna yang sudah login
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');


// 4. PROTECTED ROUTES (Perlu Login)
// Rute di dalam grup ini HANYA dapat diakses oleh pengguna yang SUDAH LOGIN ('auth').
Route::middleware('auth')->group(function () {
    // --- DASHBOARD ---
    Route::get('/dashboard', function () {
        // Ini akan diarahkan ke resources/views/dashboard/index.blade.php
        return view('dashboard.index'); 
    })->name('dashboard');
    
    // Anda akan menambahkan semua rute fungsionalitas inti (Transaksi, Anggaran, dll.) di sini:
    // Route::resource('transactions', TransactionController::class);
});