<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Tambah Peserta</h1>
        <p>Tambah data peserta sertifikasi</p>
    </div>

    <div class="card">

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('peserta.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label>Nomor Peserta</label>
                <input type="text" name="nomor_peserta"
                    value="{{ old('nomor_peserta') }}" required>
            </div>

            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik"
                    value="{{ old('nik') }}"
                    maxlength="16" inputmode="numeric" required>
            </div>

            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" name="nama"
                    value="{{ old('nama') }}"
                    maxlength="50"
                    pattern="[A-Za-zÀ-ÖØ-öø-ÿĀ-ž ]+"
                    title="Nama maksimal 50 karakter dan hanya boleh menggunakan huruf serta spasi."
                    required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                    value="{{ old('email') }}" required>
            </div>

            <div class="form-group">
                <label>No. Telepon</label>
                <input type="tel" name="no_hp"
                    value="{{ old('no_hp') }}"
                    minlength="11"
                    maxlength="13"
                    pattern="[0-9]{11,13}"
                    inputmode="numeric"
                    title="Nomor telepon harus terdiri dari 11 sampai 13 angka tanpa huruf atau simbol."
                    required>
            </div>

            <div class="form-group">
                <label>Skema Sertifikasi</label>
                <select name="skema_id" required>
                    <option value="">-- Pilih Skema --</option>
                    @foreach ($skemas as $skema)
                        <option value="{{ $skema->id }}"
                            {{ old('skema_id') == $skema->id ? 'selected' : '' }}>
                            {{ $skema->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="action-group">
                <button type="submit">Simpan</button>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>