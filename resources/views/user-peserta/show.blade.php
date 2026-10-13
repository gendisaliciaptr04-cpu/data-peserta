<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body { background: #f8f6fc; }
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 25px;
            background: white;
            border: 1px solid #e5def5;
            border-radius: 12px;
        }
        h1 { color: #5b3c91; }
        .info { padding: 12px 0; border-bottom: 1px solid #eee8ff; }
        .btn {
            display: inline-block;
            background: #8064b5;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 18px;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Detail Peserta</h1>

    <div class="info"><strong>Nomor Peserta:</strong> {{ $pesertum->nomor_peserta }}</div>
    <div class="info"><strong>NIK:</strong> {{ $pesertum->nik }}</div>
    <div class="info"><strong>Nama:</strong> {{ $pesertum->nama }}</div>
    <div class="info"><strong>Email:</strong> {{ $pesertum->email }}</div>
    <div class="info"><strong>No. HP:</strong> {{ $pesertum->no_hp }}</div>
    <div class="info"><strong>Skema:</strong> {{ $pesertum->skema->nama ?? '-' }}</div>

    <a href="{{ route('user.peserta.edit', $pesertum->id) }}" class="btn">Edit Data</a>
    <a href="{{ route('user.dashboard') }}" class="btn">Kembali</a>
</div>
</body>
</html>