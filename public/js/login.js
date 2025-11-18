// Kode JavaScript untuk public/js/login.js

document.getElementById('loginForm').addEventListener('submit', function(event) {
    // Mencegah formulir terkirim secara default
    event.preventDefault(); 

    const email = document.getElementById('email').value.trim();
    const password = document.getElementById('password').value.trim();
    const errorMessage = document.getElementById('errorMessage');

    errorMessage.textContent = ''; // Kosongkan pesan error

    if (email === '' || password === '') {
        // Cek jika ada kolom yang kosong
        errorMessage.textContent = 'Email dan Kata Sandi wajib diisi.';
        return;
    }

    if (!isValidEmail(email)) {
        // Cek format email dasar
        errorMessage.textContent = 'Format email tidak valid.';
        return;
    }

    // Jika semua validasi Front-End lolos:
    // Formulir akan dikirim ke Back-End Laravel.
    this.submit(); 
});

// Fungsi validasi format email sederhana
function isValidEmail(email) {
    const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return emailRegex.test(email);
}