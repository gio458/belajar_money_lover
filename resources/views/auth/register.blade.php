<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Page - Create Account</title>

    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>

<div class="register-page">
    <div class="auth-wrapper">
        <div class="side-banner">
            <h1>Create your Account</h1>
            <p>Manage your money!</p>
        </div>

        <div class="register-form-container">
            <div class="register-card">
                <h2>Create account</h2>

                {{-- ALERT ERROR GLOBAL --}}
                @if ($errors->any())
                    <div class="alert-error">
                        Periksa kembali isian formulir Anda.
                    </div>
                @endif

                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <div class="input-group">
                        <label for="username">Username</label>
                        <input type="text" id="username" name="username" value="{{ old('username') }}" required>
                        @error('username')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
                        @error('email')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="phone">No HP</label>
                        <input type="text" id="phone" name="phone" value="{{ old('phone') }}">
                        @error('phone')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <div class="input-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                        @error('password')
                            <p class="error-text">{{ $message }}</p>
                        @enderror
                    </div>

                    <button type="submit" class="btn-register">Register</button>
                </form>

                <div class="login-link">
                    Sudah punya akun? <a href="{{ route('login') }}">Masuk di sini</a>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- SWEETALERT SUCCESS --}}
@if(session('success'))
<script>
    Swal.fire({
        title: "Berhasil!",
        text: "{{ session('success') }}",
        icon: "success",
        draggable: true,
        confirmButtonText: "OK"
    }).then(() => {
        window.location.href = "{{ route('login') }}";
    });
</script>
@endif

</body>
</html>
