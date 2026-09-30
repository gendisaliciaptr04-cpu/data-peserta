<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang di Aplikasi Data Peserta Sertifikasi</p>
    </div>

    <div class="card">

        <h3>Ringkasan Data</h3>

        <div class="summary">

            <div class="summary-box">
                <p>Jumlah Peserta</p>
                <div class="summary-number">
                    {{ $jumlahPeserta }}
                </div>
            </div>

            <div class="summary-box">
                <p>Jumlah Skema Sertifikasi</p>
                <div class="summary-number">
                    {{ $jumlahSkema }}
                </div>
            </div>

        </div>

        <hr>

        <h3>Menu</h3>

        <div class="action-group">

            <a href="{{ route('peserta.index') }}" class="btn">
                Data Peserta
            </a>

            <a href="{{ route('skema.index') }}" class="btn">
                Skema Sertifikasi
            </a>

        </div>

        <br>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="btn-danger">
                Logout
            </button>
        </form>

    </div>

</div>

</body>
</html>