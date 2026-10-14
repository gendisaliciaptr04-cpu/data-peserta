<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>

    <!-- Menghubungkan halaman Login dengan file CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Pembungkus halaman Login -->
<div class="login-page">
    <div class="login-card">

<!-- Tombol kembali ke halaman Welcome -->
<div style="text-align: left; margin-bottom: 15px;">
    <a href="{{ url('/') }}" style="color: #8064b5; text-decoration: none;">
        &larr; Kembali ke Welcome
    </a>
</div>

<!-- Judul dan deskripsi halaman Login -->
<div class="login-title">
    <h1>Login Admin</h1>
    <p>Aplikasi Data Peserta Sertifikasi</p>
</div>

        <!-- Menampilkan pesan berhasil dari sistem -->
        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        <!-- Menampilkan pesan kesalahan validasi -->
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk mengirim data Login ke controller -->
        <form action="{{ route('login.process') }}" method="POST">
            @csrf <!-- Melindungi form dari pengiriman yang tidak sah -->

            <!-- Input email pengguna -->
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >

            <!-- Input password pengguna -->
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Masukkan password"
                required
            >

            <!-- Tombol untuk mengirim data Login -->
            <button type="submit">Login</button>
        </form>

        <!-- Link menuju halaman Register -->
        <p style="text-align: center; margin-top: 15px;">
            Belum punya akun?
            <a href="{{ route('register') }}">Register</a>
        </p>

    </div>
</div>
</body>
</html>