<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <style>
        body {
            background: #f8f6fc;
        }

        .container {
            max-width: 700px;
            margin: 35px auto;
            padding: 25px;
            background: white;
            border: 1px solid #e5def5;
            border-radius: 12px;
        }

        h1 {
            color: #5b3c91;
        }

        label {
            display: block;
            margin: 14px 0 6px;
        }

        input, select {
            width: 100%;
            box-sizing: border-box;
            padding: 11px;
            border: 1px solid #d8cdea;
            border-radius: 6px;
        }

        .btn {
            display: inline-block;
            background: #8064b5;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            text-decoration: none;
            margin-top: 18px;
            cursor: pointer;
        }

        .error {
            color: #b42318;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Edit Data Peserta</h1>

    @if ($errors->any())
        <div class="error">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('user.peserta.update', $peserta->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nomor_peserta">Nomor Peserta</label>
        <input type="text" id="nomor_peserta" name="nomor_peserta"
            value="{{ old('nomor_peserta', $peserta->nomor_peserta) }}" required>

        <label for="nik">NIK</label>
        <input type="text" id="nik" name="nik"
            value="{{ old('nik', $peserta->nik) }}" maxlength="16" required>

        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama"
            value="{{ old('nama', $peserta->nama) }}" required>

        <label for="email">Email</label>
        <input type="email" id="email" name="email"
            value="{{ old('email', $peserta->email) }}" required>

        <label for="no_hp">No. HP</label>
        <input type="text" id="no_hp" name="no_hp"
            value="{{ old('no_hp', $peserta->no_hp) }}" maxlength="11" required>

        <label for="skema_id">Skema Sertifikasi</label>
        <select id="skema_id" name="skema_id" required>
            @foreach ($skemas as $skema)
                <option value="{{ $skema->id }}"
                    {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                    {{ $skema->nama }}
                </option>
            @endforeach
        </select>

      <div style="display: flex; gap: 10px; align-items: center;">
    <button type="submit" class="btn" style="margin-top: 10px;">
        Simpan Perubahan
    </button>

    <a href="{{ route('user.dashboard') }}" class="btn" style="margin-top: 10px;">
        Batal
    </a>
</div>
    </form>
</div>
</body>
</html>