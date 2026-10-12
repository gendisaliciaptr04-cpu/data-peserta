<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="login-page">
    <div class="login-card">

        <div class="login-title">
            <h1>Login Admin</h1>
            <p>Aplikasi Data Peserta Sertifikasi</p>
        </div>

        @if (session('success'))
            <div class="success-box">
                {{ session('success') }}
            </div>
        @endif

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('login.process') }}" method="POST">
            @csrf

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
                placeholder="Masukkan password"
                required
            >

            <button type="submit">Login</button>
        </form>

        <p style="text-align: center; margin-top: 15px;">
            Belum punya akun?
            <a href="{{ route('register') }}">Register</a>
        </p>

    </div>
</div>

</body>
</html>