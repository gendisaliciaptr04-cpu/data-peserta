<!DOCTYPE html>
<html>
<head>
    <title>Edit Skema</title>
</head>
<body>

    <h1>Edit Skema Sertifikasi</h1>

    <form action="{{ route('skema.update', $skema->id) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Kode Skema</label><br>
        <input type="text" name="kode" value="{{ $skema->kode }}" required>

        <br><br>

        <label>Nama Skema</label><br>
        <input type="text" name="nama" value="{{ $skema->nama }}" required>

        <br><br>

        <label>Deskripsi</label><br>
        <textarea name="deskripsi">{{ $skema->deskripsi }}</textarea>

        <br><br>

        <button type="submit">Update</button>
        <a href="{{ route('skema.index') }}">Batal</a>

    </form>

</body>
</html>