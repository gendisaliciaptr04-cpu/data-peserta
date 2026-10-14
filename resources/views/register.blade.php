<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Akun</title>

    <!-- Menghubungkan halaman Register dengan file CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<!-- Pembungkus halaman Register -->
<div class="login-page">
    <div class="login-card">

        <!-- Tombol kembali ke halaman Welcome -->
        <div style="text-align: left; margin-bottom: 15px;">
            <a href="{{ url('/') }}" style="color: #8064b5; text-decoration: none;">
                &larr; Kembali ke Welcome
            </a>
        </div>

        <!-- Judul dan deskripsi aplikasi -->
        <div class="login-title">
            <h1>Register Akun</h1>
            <p>Aplikasi Data Peserta Sertifikasi</p>
        </div>

        <!-- Menampilkan pesan kesalahan jika pendaftaran gagal -->
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk mengirim data pendaftaran -->
        <form action="{{ route('register.store') }}" method="POST">
            @csrf <!-- Melindungi form dari pengiriman yang tidak sah -->

            <!-- Input nama pengguna -->
            <label>Nama</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama"
                required
            >

            <!-- Input email pengguna -->
            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >

            <!-- Input password baru -->
            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >

            <!-- Input untuk memastikan password sesuai -->
            <label>Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >

            <!-- Tombol untuk mengirim data pendaftaran -->
            <button type="submit">Daftar</button>
        </form>

        <!-- Link menuju halaman Login jika sudah punya akun -->
        <p style="text-align: center; margin-top: 15px;">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </p>

    </div>
</div>

</body>
</html>