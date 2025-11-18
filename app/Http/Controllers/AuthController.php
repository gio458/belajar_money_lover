<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    // --- LANDING PAGE (Route: GET /) ---
    /**
     * Menampilkan halaman sambutan (Landing Page: Saldo-In).
     */
    public function showLandingPage()
    {
        return view('auth.welcome'); 
        

    }

    // --------------------------------------------------------------------
    // --- LOGIN ---
    // --------------------------------------------------------------------

    /**
     * Menampilkan formulir login. (Route: GET /login)
     */
    public function showLoginForm()
    {
        return view('auth.login');
    }

    /**
     * Memproses permintaan login dari pengguna. (Route: POST /login)
     */
    public function login(Request $request)
    {
        // 1. Validasi
        $credentials = $request->validate([
            'email' => ['required', 'email'], 
            'password' => ['required'],
        ]);

        // 2. Otentikasi
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            // Redirect ke dashboard setelah login sukses
            return redirect()->intended('/dashboard'); 
        }

        // 3. Jika gagal
        // Melempar exception validasi untuk menampilkan pesan error di form
        throw ValidationException::withMessages([
            'email' => __(),
        ]);
    }

    // --------------------------------------------------------------------
    // --- REGISTER ---
    // --------------------------------------------------------------------

    /**
     * Menampilkan formulir pendaftaran. (Route: GET /register)
     */
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    /**
     * Memproses permintaan pendaftaran pengguna baru. (Route: POST /register)
     */
    public function register(Request $request)
    {
        // 1. Validasi (Berdasarkan fields di Register Page)
        $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'phone' => 'nullable|string|max:15',
            'password' => 'required|string|min:8', // 'confirmed' mencari field password_confirmation
        ]);

        // 2. Buat User Baru
        User::create([
            'name' => $request->username, // Menyimpan username ke kolom 'name'
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => Hash::make($request->password), // Wajib di-hash
        ]);

        // 3. Redirect ke halaman Login (sesuai permintaan Anda)
        return redirect()->route('login')->with('status', 'Pendaftaran berhasil! Silakan masuk dengan akun Anda.');
    }
    
    // --------------------------------------------------------------------
    // --- LOGOUT ---
    // --------------------------------------------------------------------

    /**
     * Logout pengguna. (Route: POST /logout)
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        // Redirect ke landing page setelah logout
        return redirect('/'); 
    }
}