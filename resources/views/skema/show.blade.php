<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Detail Skema</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Detail Skema Sertifikasi</h1>
        <p>Informasi lengkap skema sertifikasi</p>
    </div>

    <div class="card">

        <table class="detail-table">

            <tr>
                <th>Kode Skema</th>
                <td>{{ $skema->kode }}</td>
            </tr>

            <tr>
                <th>Nama Skema</th>
                <td>{{ $skema->nama }}</td>
            </tr>

            <tr>
                <th>Deskripsi</th>
                <td>{{ $skema->deskripsi ?? '-' }}</td>
            </tr>

        </table>

        <br>

        <div class="action-group">

            <a
                href="{{ route('skema.edit', $skema->id) }}"
                class="btn"
            >
                Edit
            </a>

            <a
                href="{{ route('skema.index') }}"
                class="btn btn-secondary"
            >
                Kembali
            </a>

        </div>

    </div>

</div>

</body>
</html>