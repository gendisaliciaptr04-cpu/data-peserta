<!DOCTYPE html>
<html>
<head>
    <title>Tambah Skema</title>
</head>
<body>

    <h1>Tambah Skema Sertifikasi</h1>

    <form action="{{ route('skema.store') }}" method="POST">
        @csrf

        <label>Kode Skema</label><br>
        <input type="text" name="kode" required>

        <br><br>

        <label>Nama Skema</label><br>
        <input type="text" name="nama" required>

        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi"></textarea>

        <br><br>

        <button type="submit">Simpan</button>
        <a href="{{ route('skema.index') }}">Batal</a>
    </form>

</body>
</html>