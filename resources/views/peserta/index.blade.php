<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Peserta</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Data Peserta Sertifikasi</h1>
        <p>Kelola data peserta sertifikasi</p>
    </div>

    <div class="card">

        <a href="{{ route('peserta.create') }}" class="btn">
            + Tambah Peserta
        </a>

        <form action="{{ route('peserta.index') }}" method="GET" class="search-box">

            <input
                type="text"
                name="search"
                placeholder="Cari nama atau nomor peserta..."
                value="{{ $search ?? '' }}"
            >

            <button type="submit">
                Cari
            </button>

            @if($search)
                <a href="{{ route('peserta.index') }}" class="btn btn-secondary">
                    Reset
                </a>
            @endif

        </form>

        <div class="table-wrapper">

            <table>

                <tr>
                    <th>No</th>
                    <th>Nomor Peserta</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>No HP</th>
                    <th>Skema</th>
                    <th>Aksi</th>
                </tr>

                @forelse ($pesertas as $peserta)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $peserta->nomor_peserta }}</td>

                    <td>{{ $peserta->nama }}</td>

                    <td>{{ $peserta->email }}</td>

                    <td>{{ $peserta->no_hp }}</td>

                    <td>{{ $peserta->skema->nama ?? '-' }}</td>

                    <td>

                        <div class="action-group">

                            <a href="{{ route('peserta.show', $peserta->id) }}">
                                Detail
                            </a>

                            <a href="{{ route('peserta.edit', $peserta->id) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('peserta.destroy', $peserta->id) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus peserta ini?')"
                                >
                                    Hapus
                                </button>
                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="7">
                        Data peserta tidak ditemukan.
                    </td>
                </tr>

                @endforelse

            </table>

        </div>

        <br>

        <a href="{{ route('dashboard') }}">
            ← Kembali ke Dashboard
        </a>

    </div>

</div>

</body>
</html>