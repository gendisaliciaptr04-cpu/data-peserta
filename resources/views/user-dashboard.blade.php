<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            padding: 25px;
            font-family: Arial, sans-serif;
            background: #f7f4fc;
            color: #333;
        }

        .container {
            max-width: 1200px;
            margin: auto;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
            margin-bottom: 25px;
        }

        h1 {
            margin: 0 0 8px;
            color: #7254a8;
        }

        .profile, .table-container {
            background: white;
            padding: 22px;
            border-radius: 12px;
            margin-bottom: 22px;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.06);
        }

        .profile p {
            margin: 8px 0;
        }

        .search-form {
            display: flex;
            gap: 10px;
            flex-wrap: wrap;
            margin-bottom: 20px;
        }

        .search-form input {
            flex: 1;
            min-width: 200px;
            padding: 11px;
            border: 1px solid #d5c9e8;
            border-radius: 7px;
        }

        button, .btn {
            display: inline-block;
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
            text-align: center;
        }

        .btn-purple {
            background: #9475c9;
            color: white;
        }

        .btn-gray {
            background: #eae6f0;
            color: #333;
        }

        .btn-red {
            background: #dc626c;
            color: white;
        }

        .table-container {
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 850px;
        }

        th, td {
            padding: 12px;
            border-bottom: 1px solid #eee;
            text-align: left;
        }

        th {
            background: #eee7f8;
            color: #59427f;
        }

        .actions {
            display: flex;
            gap: 7px;
        }

        .success {
            padding: 12px;
            margin-bottom: 18px;
            border-radius: 7px;
            background: #e4f5e8;
            color: #236b37;
        }

        .empty {
            text-align: center;
            padding: 20px;
        }

        @media (max-width: 600px) {
            body {
                padding: 12px;
            }

            .profile, .table-container {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <div>
                <h1>Dashboard User</h1>
                <p>Aplikasi Data Peserta Sertifikasi</p>
            </div>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-red">Logout</button>
            </form>
        </div>

        @if (session('success'))
            <div class="success">
                {{ session('success') }}
            </div>
        @endif

        <div class="profile">
            <h2>Profil User</h2>
            <p><strong>Nama:</strong> {{ auth()->user()->name }}</p>
            <p><strong>Email:</strong> {{ auth()->user()->email }}</p>
        </div>

        <div class="table-container">
            <h2>Data Peserta Sertifikasi</h2>

            <form action="{{ route('user.dashboard') }}" method="GET" class="search-form">
                <input
                    type="text"
                    name="search"
                    value="{{ $search ?? '' }}"
                    placeholder="Cari nama atau nomor peserta..."
                >

                <button type="submit" class="btn-purple">Cari</button>

                <a href="{{ route('user.dashboard') }}" class="btn btn-gray">
                    Reset
                </a>
            </form>

            <table>
                <thead>
                    <tr>
                        <th>No.</th>
                        <th>Nomor Peserta</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No. HP</th>
                        <th>Skema Sertifikasi</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($pesertas as $peserta)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $peserta->nomor_peserta }}</td>
                            <td>{{ $peserta->nik }}</td>
                            <td>{{ $peserta->nama }}</td>
                            <td>{{ $peserta->email }}</td>
                            <td>{{ $peserta->no_hp }}</td>
                            <td>{{ $peserta->skema->nama ?? '-' }}</td>
                            <td>
                                <div class="actions">
                                    <a
                                        href="{{ route('user.peserta.show', $peserta->id) }}"
                                        class="btn btn-purple">
                                        Detail
                                    </a>

                                    @if ($peserta->user_id == 3)
                                        <a
                                            href="{{ route('user.peserta.edit', $peserta->id) }}"
                                            class="btn btn-gray">
                                            Edit
                                        </a>
                                    @endif
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="empty">
                                Data peserta tidak ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>