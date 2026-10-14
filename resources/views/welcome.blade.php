<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - Data Peserta Sertifikasi</title>

    <style>
        /* Mengatur ukuran elemen agar lebih rapi */
        * {
            box-sizing: border-box;
        }

        /* Mengatur tampilan dasar halaman Welcome */
        body {
            margin: 0;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
            font-family: Arial, sans-serif;
            background: #f5f0ff;
            color: #40364d;
        }

        /* Kotak utama halaman Welcome */
        .welcome {
            max-width: 650px;
            width: 100%;
            padding: 50px 30px;
            text-align: center;
            background: white;
            border-radius: 18px;
            box-shadow: 0 5px 20px #ddd2ee;
        }

        /* Mengatur judul dan deskripsi */
        h1 {
            color: #8064a8;
            font-size: 32px;
            margin-bottom: 15px;
        }

        p {
            line-height: 1.7;
            color: #71677d;
            margin-bottom: 30px;
        }

        /* Mengatur posisi tombol Login dan Register */
        .buttons {
            display: flex;
            justify-content: center;
            gap: 12px;
            flex-wrap: wrap;
        }

        /* Tampilan dasar tombol */
        .btn {
            display: inline-block;
            padding: 12px 25px;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
        }

        /* Tombol menuju halaman Login */
        .login {
            background: #8064a8;
            color: white;
        }

        /* Tombol menuju halaman Register */
        .register {
            color: #8064a8;
            border: 1px solid #8064a8;
        }

        /* Teks bagian bawah halaman */
        footer {
            margin-top: 35px;
            font-size: 12px;
            color: #9589a5;
        }
    </style>
</head>
<body>

    <!-- Kotak utama halaman Welcome -->
    <div class="welcome">

        <!-- Judul halaman -->
        <h1>Selamat Datang!</h1>

        <!-- Deskripsi aplikasi -->
        <p>
            Aplikasi Data Peserta Sertifikasi
            <br>
            Kelola dan lihat informasi peserta sertifikasi
            dengan mudah melalui aplikasi ini.
        </p>

        <!-- Tombol untuk menuju Login dan Register -->
        <div class="buttons">
            <a href="{{ route('login') }}" class="btn login">Login</a>
            <a href="{{ route('register') }}" class="btn register">Register</a>
        </div>

        <!-- Footer halaman -->
        <footer>Aplikasi Data Peserta Sertifikasi</footer>
    </div>

</body>
</html>