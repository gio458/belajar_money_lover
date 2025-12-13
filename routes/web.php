<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController; 
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\SpayController;
use App\Http\Controllers\SettingController;
use App\Http\Controllers\DashboardController;
 
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
    Route::get('/dashboard', [DashboardController::class, 'index'])
        ->name('dashboard');

    
    // Anda akan menambahkan semua rute fungsionalitas inti (Transaksi, Anggaran, dll.) di sini:
    // Route::resource('transactions', TransactionController::class);
});

Route::get('/document', [DocumentController::class, 'index'])->name('document.index');

//historyroute
Route::resource('history', HistoryController::class);
Route::get('/history', [HistoryController::class, 'index'])->name('history.index');
Route::put('/history/{id}', [HistoryController::class, 'update'])->name('history.update');
Route::delete('/history/{id}', [HistoryController::class, 'destroy'])->name('history.destroy');
Route::get('/history/export', [HistoryController::class, 'exportExcel'])->name('history.export');


//Spayroute
Route::get('/spay', [SpayController::class, 'index'])->name('spay.index');
Route::post('/spay/store', [SpayController::class, 'store'])->name('spay.store');

//documentroute
Route::get('/document/export', [DocumentController::class,'export'])
     ->name('document.export');
Route::get('/spay/{id}/download', [DocumentController::class, 'download'])->name('spay.download');
Route::get('/document/download/{id}', [DocumentController::class, 'download'])
     ->name('document.download');




Route::get('/setting', [SettingController::class, 'index'])->name('setting.setting');
Route::post('/setting/profile', [SettingController::class, 'updateProfile'])->name('setting.profile');
Route::post('/setting/password', [SettingController::class, 'updatePassword'])->name('setting.password');


