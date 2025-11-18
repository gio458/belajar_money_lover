<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back!</title>
    {{-- Menghubungkan CSS. Asumsikan file auth.css ada di public/css/auth.css --}}
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>
    <div class="auth-page">
        
        {{-- Bagian Kiri: Welcome Banner --}}
        <div class="side-banner login-banner">
            <h1>Welcome!</h1>
            <p>Login to your account and manage your finance!</p>
        </div>

        {{-- Bagian Kanan: Formulir Login --}}
        <div class="auth-form-container">
            <div class="auth-card login-card">
                <h2>Login</h2>
                
                {{-- Menampilkan Pesan Status (dari Registrasi Sukses) --}}
                @if (session('status'))
                    <div class="alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                {{-- Menampilkan Error Otentikasi/Validasi --}}
                @if ($errors->any())
                    <div class="alert-error">
                        Email atau kata sandi salah.
                    </div>
                @endif
                
                <form action="{{ route('login') }}" method="POST">
                    @csrf
                    
                    <div class="input-group">
                        <label for="email">email</label>
                        {{-- Laravel menggunakan 'email' secara default --}}
                        <input type="text" id="email" name="email" value="{{ old('email') }}" required autofocus>
                        @error('email')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    {{-- Tombol Login --}}
                    <button type="submit" class="btn-primary">Login</button>
                </form>

                <div class="register-link">
                    Don't have an account? <a href="{{ route('register') }}">Register here</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>