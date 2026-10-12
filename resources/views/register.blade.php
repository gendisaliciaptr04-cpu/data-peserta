<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Register Akun</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="login-page">
    <div class="login-card">

        <div class="login-title">
            <h1>Register Akun</h1>
            <p>Aplikasi Data Peserta Sertifikasi</p>
        </div>

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('register.store') }}" method="POST">
            @csrf

            <label>Nama</label>
            <input
                type="text"
                name="name"
                value="{{ old('name') }}"
                placeholder="Masukkan nama"
                required
            >

            <label>Email</label>
            <input
                type="email"
                name="email"
                value="{{ old('email') }}"
                placeholder="Masukkan email"
                required
            >

            <label>Password</label>
            <input
                type="password"
                name="password"
                placeholder="Minimal 8 karakter"
                required
            >

            <label>Konfirmasi Password</label>
            <input
                type="password"
                name="password_confirmation"
                placeholder="Ulangi password"
                required
            >

            <button type="submit">Daftar</button>
        </form>

        <p style="text-align: center; margin-top: 15px;">
            Sudah punya akun?
            <a href="{{ route('login') }}">Login</a>
        </p>

    </div>
</div>

</body>
</html>