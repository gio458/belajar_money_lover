<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Money Manager</title>
    <link rel="stylesheet" href="{{ asset('css/login.css') }}"> 
</head>
<body>
    <div class="login-container">
        <h2>Selamat Datang Kembali</h2>
        <form id="loginForm" action="/login" method="POST">
            @csrf 
            
            <div class="input-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            
            <div class="input-group">
                <label for="password">Kata Sandi</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" id="loginButton">Masuk</button>
            
            <p class="error-message" id="errorMessage"></p>
            
            <div class="link-group">
                <a href="#">Lupa Kata Sandi?</a> | 
                <a href="#">Daftar Akun Baru</a>
            </div>
        </form>
    </div>

    <script src="{{ asset('js/login.js') }}"></script>
</body>
</html>