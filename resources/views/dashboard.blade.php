<!DOCTYPE html>
<html lang="en">
<head>
    <title>Dashboard</title>
</head>
<body>
    <h1>Dashboard Admin</h1>
    <p>Selamat datang di Aplikasi Data Peserta Sertifikasi</p>
    <hr>
    <h3>Menu</h3>
    <a href="#">Data Peserta</a>
    <br><br>

    <a href="#">Skema Sertifikasi</a>
    <br><br>

    <form action="{{ route('logout') }}" mrthod="POST">
        @csrf
        <button type="submit">Logout</button>
    </form>
</body>
</html>