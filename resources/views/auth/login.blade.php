<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back!</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>
<body>

    <div class="side-banner">
        <h1>Welcome Back</h1>
        <p>Login to your account and manage your finance!</p>
    </div>

    <div class="login-card">
        <h2>Login</h2>

        @if (session('status'))
            <div class="alert-success">
                {{ session('status') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="alert-error">
                Email atau kata sandi salah.
            </div>
        @endif
        
        <form action="{{ route('login') }}" method="POST">
            @csrf
            
            <div class="input-group">
                <label for="email">Email</label>
                <input 
                    type="text" 
                    id="email" 
                    name="email" 
                    value="{{ old('email') }}" 
                    required autofocus>
            </div>
            
            <div class="input-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn-login">Masuk</button>
        </form>

        <div class="link-group">
            Belum punya akun? 
            <a href="{{ route('register') }}">Daftar di sini</a>
        </div>
    </div>

</body>
</html>
