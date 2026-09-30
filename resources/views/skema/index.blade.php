<!DOCTYPE html>
<html>
<head>
    <title>Data Skema</title>
</head>
<body>

    <h1>Data Skema Sertifikasi</h1>

    <a href="{{ route('skema.create') }}">+ Tambah Skema</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Kode</th>
            <th>Nama Skema</th>
            <th>Deskripsi</th>
            <th>Aksi</th>
        </tr>

        @foreach ($skemas as $skema)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $skema->kode }}</td>
            <td>{{ $skema->nama }}</td>
            <td>{{ $skema->deskripsi }}</td>
            <td>
                <a href="{{ route('skema.edit', $skema->id) }}">Edit</a>

                <form action="{{ route('skema.destroy', $skema->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach

    </table>

    <br>

    <a href="{{ route('dashboard') }}">Kembali ke Dashboard</a>

</body>
</html>