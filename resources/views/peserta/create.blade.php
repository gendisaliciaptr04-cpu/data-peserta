<!DOCTYPE html>
<html>
<head>
    <title>Tambah Peserta</title>
</head>
<body>

    <h1>Tambah Peserta Sertifikasi</h1>

    <form action="{{ route('peserta.store') }}" method="POST">
        @csrf

        <label>Nomor Peserta</label><br>
        <input type="text" name="nomor_peserta" required>

        <br><br>

        <label>Nama Peserta</label><br>
        <input type="text" name="nama" required>

        <br><br>

        <label>Email</label><br>
        <input type="email" name="email" required>

        <br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp" required>

        <br><br>

        <label>Skema Sertifikasi</label><br>
        <select name="skema_id" required>
            <option value="">-- Pilih Skema --</option>

            @foreach ($skemas as $skema)
                <option value="{{ $skema->id }}">
                    {{ $skema->nama }}
                </option>
            @endforeach
        </select>

        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('peserta.index') }}">Batal</a>

    </form>

</body>
</html>