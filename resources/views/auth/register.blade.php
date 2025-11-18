<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page - Create Account</title>
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>
<body>
    <div class="register-page">
        
        <div class="side-banner">
            <h1>Create your Account</h1>
            <p>Manage your money!</p>
        </div>

        <div class="register-form-container">
            <div class="register-card">
                <h2>Create account</h2>
                
                <form action="{{ route('register') }}" method="POST">
                    @csrf
                    
                    {{-- Menampilkan Error Validasi dari Laravel --}}
                    @if ($errors->any())
                        <div class="alert-error">
                            Periksa kembali isian formulir Anda.
                        </div>
                    @endif

                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="input-group">
                        <label for="phone">No hp</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')<p class="error-text">{{ $message }}</p>@enderror
                    </div>
                    
                    {{-- Field konfirmasi password wajib untuk validasi 'confirmed' --}}
                    {{-- <div class="input-group" style="display:none;"> 
                        <label for="password_confirmation">Konfirmasi Password</label>
                        <input type="password" id="password_confirmation" name="password_confirmation" required>
                    </div> --}}

                    <button type="submit" class="btn-register">Register</button>
                </form>
                @if ($errors->any())
    <div class="alert-error">
        Periksa kembali isian formulir Anda.
    </div>
@endif
{{-- Dan di bawah setiap input: --}}
@error('email')<p class="error-text">{{ $message }}</p>@enderror

                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>