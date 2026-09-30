<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Detail Peserta</h1>
        <p>Informasi lengkap peserta sertifikasi</p>
    </div>

    <div class="card">

        <table class="detail-table">

            <tr>
                <th>Nomor Peserta</th>
                <td>{{ $pesertum->nomor_peserta }}</td>
            </tr>

            <tr>
                <th>Nama Peserta</th>
                <td>{{ $pesertum->nama }}</td>
            </tr>

            <tr>
                <th>Email</th>
                <td>{{ $pesertum->email }}</td>
            </tr>

            <tr>
                <th>No HP</th>
                <td>{{ $pesertum->no_hp }}</td>
            </tr>

            <tr>
                <th>Skema Sertifikasi</th>
                <td>{{ $pesertum->skema->nama ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <div class="action-group">

            <a
                href="{{ route('peserta.edit', $pesertum->id) }}"
                class="btn"
            >
                Edit
            </a>

            <a
                href="{{ route('peserta.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>