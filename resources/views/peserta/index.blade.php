<!DOCTYPE html>
<html>
<head>
    <title>Data Peserta</title>
</head>
<body>

    <h1>Data Peserta Sertifikasi</h1>

    <a href="{{ route('peserta.create') }}">+ Tambah Peserta</a>

    <br><br>

    <table border="1" cellpadding="10">
        <tr>
            <th>No</th>
            <th>Nomor Peserta</th>
            <th>Nama</th>
            <th>Email</th>
            <th>No HP</th>
            <th>Skema</th>
            <th>Aksi</th>
        </tr>

        @foreach ($pesertas as $peserta)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $peserta->nomor_peserta }}</td>
            <td>{{ $peserta->nama }}</td>
            <td>{{ $peserta->email }}</td>
            <td>{{ $peserta->no_hp }}</td>
            <td>{{ $peserta->skema->nama ?? '-' }}</td>
            <td>
                <a href="{{ route('peserta.edit', $peserta->id) }}">Edit</a>

                <form action="{{ route('peserta.destroy', $peserta->id) }}" method="POST" style="display:inline;">
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