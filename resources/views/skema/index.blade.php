<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Skema</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Skema Sertifikasi</h1>
        <p>Kelola data skema sertifikasi</p>
    </div>

    <div class="card">

        <a href="{{ route('skema.create') }}" class="btn">
            + Tambah Skema
        </a>

        <br><br>

        <div class="table-wrapper">

            <table>

                <tr>
                    <th>No</th>
                    <th>Kode</th>
                    <th>Nama Skema</th>
                    <th>Deskripsi</th>
                    <th>Aksi</th>
                </tr>

                @forelse ($skemas as $skema)

                <tr>

                    <td>{{ $loop->iteration }}</td>

                    <td>{{ $skema->kode }}</td>

                    <td>{{ $skema->nama }}</td>

                    <td>{{ $skema->deskripsi ?? '-' }}</td>

                    <td>

                        <div class="action-group">

                            <a href="{{ route('skema.show', $skema->id) }}">
                                Detail
                            </a>

                            <a href="{{ route('skema.edit', $skema->id) }}">
                                Edit
                            </a>

                            <form
                                action="{{ route('skema.destroy', $skema->id) }}"
                                method="POST"
                                style="display:inline;"
                            >
                                @csrf
                                @method('DELETE')

                                <button
                                    type="submit"
                                    class="btn-danger"
                                    onclick="return confirm('Yakin ingin menghapus skema ini?')"
                                >
                                    Hapus
                                </button>

                            </form>

                        </div>

                    </td>

                </tr>

                @empty

                <tr>
                    <td colspan="5">
                        Belum ada data skema.
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