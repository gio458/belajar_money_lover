<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Saldo-In</title>
    {{-- Menghubungkan CSS. Kita akan menggunakan kembali auth.css atau buat welcome.css --}}
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}"> 
</head>
<body>
    <div class="landing-page">
        
        {{-- Bagian Kiri: Welcome Headline dan Tombol Get Started --}}
        <div class="side-banner welcome-banner">
            <h1>Welcome to <span class="app-name">Saldo-In</span></h1>
            <p>Manage your finances easily and efficiently</p>
            
            {{-- Tombol utama (Bisa diarahkan ke Register atau penjelasan) --}}
            <a href="{{ route('register') }}" class="btn-get-started">Get Started</a>
        </div>

        {{-- Bagian Kanan: About Saldo-In --}}
        <div class="about-container">
            <div class="about-card">
                <div class="app-logo">
                    {{-- Logo S dalam lingkaran biru-hijau --}}
                    <svg viewBox="0 0 100 100" class="logo-svg">
                        <circle cx="50" cy="50" r="50" fill="#00e4c6"/>
                        <text x="50%" y="60%" dominant-baseline="middle" text-anchor="middle" font-size="60" fill="white" font-weight="bold">S</text>
                    </svg>
                </div>
                
                <h3>About Saldo-In</h3>
                <p>Saldo-In is a financial management platform that helps you manage your expenses, record daily transactions, and understand your financial condition more easily and efficiently.</p>
                
                <div class="auth-buttons">
                    <a href="{{ route('login') }}" class="btn-secondary">Login</a>
                    <a href="{{ route('register') }}" class="btn-primary-outline">Register</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>