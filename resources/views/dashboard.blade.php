<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        /* Mengatur tampilan dasar halaman */
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f5fc;
            color: #393044;
        }

        /* Header dashboard admin */
        .navbar {
            background: #8064b5;
            color: white;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .navbar h2 {
            margin: 0;
            font-size: 21px;
        }

        .navbar p {
            margin: 5px 0 0;
            color: #eee6ff;
            font-size: 13px;
        }

        .logout {
            background: white;
            color: #70529f;
            padding: 10px 16px;
            border: none;
            border-radius: 7px;
            cursor: pointer;
            font-size: 14px;
        }

        /* Area utama dashboard */
        .dashboard {
            max-width: 1100px;
            margin: 30px auto;
            padding: 0 20px;
        }

        .welcome {
            background: white;
            padding: 28px;
            border: 1px solid #e9e1f5;
            border-radius: 14px;
            margin-bottom: 25px;
        }

        .welcome h1 {
            color: #654797;
            font-size: 26px;
            margin: 0 0 10px;
        }

        .welcome p {
            color: #786f83;
            margin: 0;
            line-height: 1.6;
        }

        /* Ringkasan jumlah data */
        .section-title {
            color: #654797;
            font-size: 20px;
            margin: 0 0 15px;
        }

        .cards {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 18px;
            margin-bottom: 28px;
        }

        .card {
            background: white;
            border: 1px solid #e9e1f5;
            border-radius: 12px;
            padding: 24px;
        }

        .card p {
            margin: 0 0 12px;
            color: #81758e;
            font-size: 14px;
        }

        .card h2 {
            margin: 0;
            color: #654797;
            font-size: 30px;
        }

        /* Menu pengelolaan data */
        .menu-section {
            background: white;
            border: 1px solid #e9e1f5;
            border-radius: 14px;
            padding: 24px;
        }

        .menu-section p {
            color: #81758e;
            font-size: 14px;
            margin: 0 0 20px;
        }

        .menu {
            display: grid;
            grid-template-columns: repeat(2, minmax(0, 1fr));
            gap: 15px;
        }

        .menu a {
            display: block;
            padding: 18px;
            border: 1px solid #e3d8f4;
            border-radius: 9px;
            background: #f8f5ff;
            color: #654797;
            text-decoration: none;
            font-weight: bold;
        }

        .menu a span {
            display: block;
            margin-top: 7px;
            font-size: 13px;
            font-weight: normal;
            color: #81758e;
        }

        /* Footer aplikasi */
        .footer {
            text-align: center;
            color: #9287a0;
            font-size: 12px;
            padding: 25px 10px;
        }

        /* Menyesuaikan tampilan untuk layar HP */
        @media (max-width: 600px) {
            .dashboard {
                padding: 0 12px;
                margin-top: 20px;
            }

            .cards, .menu {
                grid-template-columns: 1fr;
            }

            .welcome, .card, .menu-section {
                padding: 20px;
            }

            .welcome h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>
    {{-- Header berisi nama aplikasi dan tombol logout --}}
    <header class="navbar">
        <div>
            <h2>Data Peserta Sertifikasi</h2>
            <p>Panel Administrasi</p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </header>

    <main class="dashboard">
        {{-- Sambutan untuk admin --}}
        <section class="welcome">
            <h1>Dashboard Admin</h1>
            <p>Selamat datang di Aplikasi Data Peserta Sertifikasi! Kelola data peserta dan skema sertifikasi melalui menu yang tersedia.</p>
        </section>

        {{-- Ringkasan jumlah data dari controller --}}
        <h2 class="section-title">Ringkasan Data</h2>
        <section class="cards">
            <div class="card">
                <p>Jumlah Peserta</p>
                <h2>{{ $jumlahPeserta }}</h2>
            </div>

            <div class="card">
                <p>Jumlah Skema Sertifikasi</p>
                <h2>{{ $jumlahSkema }}</h2>
            </div>
        </section>

        {{-- Menu menuju halaman pengelolaan data --}}
        <section class="menu-section">
            <h2 class="section-title">Menu Pengelolaan</h2>
            <p>Pilih menu untuk mengelola data aplikasi.</p>

            <div class="menu">
                <a href="{{ route('peserta.index') }}">
                    Data Peserta
                    <span>Melihat, menambah, mengedit, dan menghapus data peserta.</span>
                </a>

                <a href="{{ route('skema.index') }}">
                    Skema Sertifikasi
                    <span>Melihat dan mengelola data skema sertifikasi.</span>
                </a>
            </div>
        </section>
    </main>

    {{-- Footer aplikasi --}}
    <footer class="footer">Aplikasi Data Peserta Sertifikasi</footer>
</body>
</html>