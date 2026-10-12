```html
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Edit Peserta</h1>
        <p>Ubah data peserta sertifikasi</p>
    </div>

    <div class="card">

        <!-- Menampilkan pesan validasi -->
        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <!-- Form untuk mengubah data peserta -->
        <form action="{{ route('peserta.update', ['pesertum' => $peserta->id]) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label>Nomor Peserta</label>
                <input type="text" name="nomor_peserta"
                    value="{{ old('nomor_peserta', $peserta->nomor_peserta) }}" required>
            </div>

            <!-- NIK harus tepat 16 digit -->
            <div class="form-group">
                <label>NIK</label>
                <input type="text" name="nik"
                    value="{{ old('nik', $peserta->nik) }}"
                    maxlength="16" inputmode="numeric" required>
            </div>

            <div class="form-group">
                <label>Nama Peserta</label>
                <input type="text" name="nama"
                    value="{{ old('nama', $peserta->nama) }}" required>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="email" name="email"
                    value="{{ old('email', $peserta->email) }}" required>
            </div>

            <!-- Nomor HP dibatasi maksimal 11 digit -->
            <div class="form-group">
                <label>No HP</label>
                <input type="text" name="no_hp"
                    value="{{ old('no_hp', $peserta->no_hp) }}"
                    maxlength="11" inputmode="numeric" required>
            </div>

            <!-- Pilihan skema sertifikasi -->
            <div class="form-group">
                <label>Skema Sertifikasi</label>
                <select name="skema_id" required>
                    @foreach ($skemas as $skema)
                        <option value="{{ $skema->id }}"
                            {{ old('skema_id', $peserta->skema_id) == $skema->id ? 'selected' : '' }}>
                            {{ $skema->nama }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="action-group">
                <button type="submit">Update</button>
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">
                    Batal
                </a>
            </div>

        </form>

    </div>

</div>

</body>
</html>
```