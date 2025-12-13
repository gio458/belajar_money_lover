<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Welcome Back!</title>

    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="side-banner">
    <h1>Welcome Back</h1>
    <p>Login to your account and manage your finance!</p>
</div>

<div class="login-card">
    <h2>Login</h2>

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

{{-- ✅ ALERT SUCCESS (DARI REGISTER) --}}
@if(session('success'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        draggable: true,
        confirmButtonText: "OK"
    });
</script>
@endif

{{-- ❌ ALERT ERROR LOGIN --}}
@if ($errors->any())
<script>
    Swal.fire({
        title: "Login Gagal!",
        text: "Email tidak terdaftar atau password salah.",
        icon: "error",
        confirmButtonText: "Coba Lagi"
    });
</script>
@endif

</body>
</html>
