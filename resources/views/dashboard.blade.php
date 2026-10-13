<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        .dashboard {
            max-width: 1000px;
            margin: 40px auto;
            padding: 25px;
        }

        .header {
            background: #eee8ff;
            padding: 25px;
            border-radius: 12px;
            margin-bottom: 25px;
        }

        .header h1 {
            color: #5b3c91;
        }

        .cards {
            display: flex;
            gap: 20px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        .card {
            flex: 1;
            min-width: 200px;
            background: white;
            border: 1px solid #e5def5;
            border-radius: 12px;
            padding: 25px;
        }

        .card h2 {
            color: #5b3c91;
        }

        .menu a {
            display: inline-block;
            margin: 5px 10px 5px 0;
            padding: 12px 18px;
            background: #8064b5;
            color: white;
            text-decoration: none;
            border-radius: 6px;
        }

        .logout {
            margin-top: 20px;
            padding: 10px 20px;
            background: #8064b5;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
    </style>
</head>
<body>
<div class="dashboard">
    <div class="header">
        <h1>Dashboard Admin</h1>
        <p>Selamat datang di Aplikasi Data Peserta Sertifikasi!</p>
    </div>

    <div class="cards">
        <div class="card">
            <h2>Jumlah Peserta</h2>
            <h1>{{ $jumlahPeserta }}</h1>
        </div>

        <div class="card">
            <h2>Jumlah Skema Sertifikasi</h2>
            <h1>{{ $jumlahSkema }}</h1>
        </div>
    </div>

    <div class="menu">
        <a href="{{ route('peserta.index') }}">Data Peserta</a>
        <a href="{{ route('skema.index') }}">Skema Sertifikasi</a>
    </div>

    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button type="submit" class="logout">Logout</button>
    </form>
</div>
</body>
</html>