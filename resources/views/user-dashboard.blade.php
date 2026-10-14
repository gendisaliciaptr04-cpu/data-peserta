
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>

    <style>
        /* Mengatur ukuran elemen agar sesuai dengan layar */
        * {
            box-sizing: border-box;
        }

        /* Mengatur tampilan dasar halaman */
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f7f5fc;
            color: #393044;
        }

        /* Mengatur header dashboard */
        .navbar {
            background: #8064b5;
            color: white;
            padding: 20px 5%;
            display: flex;
            justify-content: space-between;
            align-items: center;
            gap: 15px;
            flex-wrap: wrap;
        }

        .navbar h2 {
            margin: 0;
            font-size: 21px;
        }

        .navbar p {
            margin: 5px 0 0;
            font-size: 13px;
            color: #eee6ff;
        }

        /* Mengatur tombol logout */
        .logout {
            background: white;
            color: #70529f;
            padding: 10px 15px;
            border: none;
            border-radius: 7px;
            text-decoration: none;
            font-size: 14px;
            cursor: pointer;
        }

        /* Mengatur area utama dashboard */
        .container {
            max-width: 1200px;
            margin: 30px auto;
            padding: 0 20px;
        }

        /* Mengatur bagian sapaan pengguna */
        .welcome {
            background: white;
            padding: 25px;
            border: 1px solid #e9e1f5;
            border-radius: 14px;
            margin-bottom: 22px;
        }

        .welcome h1 {
            color: #654797;
            font-size: 25px;
            margin: 0 0 10px;
        }

        .welcome p {
            margin: 0;
            color: #786f83;
            line-height: 1.6;
        }

        /* Mengatur kartu informasi akun */
        .profile {
            display: grid;
            grid-template-columns: repeat(3, 1fr);
            gap: 15px;
            margin-bottom: 25px;
        }

        .profile-card {
            background: white;
            padding: 20px;
            border: 1px solid #e9e1f5;
            border-radius: 12px;
        }

        .profile-card p {
            margin: 0 0 8px;
            color: #81758e;
            font-size: 13px;
        }

        .profile-card h3 {
            margin: 0;
            font-size: 16px;
            color: #543a7c;
            overflow-wrap: anywhere;
        }

        /* Mengatur kotak tabel data peserta */
        .content {
            background: white;
            padding: 22px;
            border: 1px solid #e9e1f5;
            border-radius: 14px;
        }

        .content h2 {
            margin: 0 0 7px;
            color: #654797;
            font-size: 21px;
        }

        .description {
            color: #81758e;
            font-size: 14px;
            margin-bottom: 20px;
        }

        /* Menampilkan pesan setelah data berhasil diperbarui */
        .success {
            background: #e9f8ee;
            color: #237744;
            border: 1px solid #c7ebd2;
            padding: 12px;
            border-radius: 7px;
            margin-bottom: 15px;
        }

        /* Mengatur form pencarian peserta */
        .search {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }

        .search input {
            flex: 1;
            min-width: 180px;
            padding: 11px 13px;
            border: 1px solid #dcd2eb;
            border-radius: 7px;
            outline: none;
            font-size: 14px;
        }

        .search input:focus {
            border-color: #8064b5;
        }

        /* Mengatur tampilan tombol */
        .btn {
            display: inline-block;
            border: none;
            border-radius: 7px;
            padding: 10px 14px;
            font-size: 13px;
            text-decoration: none;
            cursor: pointer;
            text-align: center;
        }

        .btn-search, .btn-edit {
            background: #8064b5;
            color: white;
        }

        .btn-reset, .btn-detail {
            background: #eee8f8;
            color: #654797;
        }

        /* Membuat tabel dapat digeser pada layar kecil */
        .table-wrapper {
            width: 100%;
            overflow-x: auto;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            min-width: 950px;
        }

        thead {
            background: #f0eafb;
        }

        th {
            color: #60458e;
            font-size: 13px;
            text-align: left;
        }

        th, td {
            padding: 14px 12px;
            border-bottom: 1px solid #eee8f5;
            vertical-align: middle;
        }

        td {
            font-size: 13px;
        }

        tbody tr:last-child td {
            border-bottom: none;
        }

        /* Mengatur posisi tombol aksi */
        .actions {
            display: flex;
            gap: 7px;
            align-items: center;
        }

        /* Mengatur pesan ketika data tidak ditemukan */
        .empty {
            text-align: center;
            padding: 30px;
            color: #81758e;
        }

        /* Mengatur bagian bawah halaman */
        .footer {
            text-align: center;
            color: #9287a0;
            font-size: 12px;
            padding: 25px 10px;
        }

        /* Menyesuaikan tampilan untuk layar HP */
        @media (max-width: 700px) {
            .profile {
                grid-template-columns: 1fr;
            }

            .container {
                margin-top: 20px;
                padding: 0 12px;
            }

            .welcome, .content {
                padding: 18px;
            }

            .welcome h1 {
                font-size: 22px;
            }
        }
    </style>
</head>
<body>

    {{-- Header berisi nama aplikasi dan tombol logout --}}
    <header class="navbar">
        <div>
            <h2>Data Peserta Sertifikasi</h2>
            <p>Dashboard Pengguna</p>
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout">Logout</button>
        </form>
    </header>

    <main class="container">

        {{-- Menampilkan sapaan sesuai nama pengguna yang login --}}
        <section class="welcome">
            <h1>Halo, {{ auth()->user()->name }}!</h1>
            <p>Selamat datang di dashboard pengguna. Kamu dapat melihat data peserta dan mengelola data milikmu di sini.</p>
        </section>

        {{-- Menampilkan informasi akun pengguna --}}
        <section class="profile">
            <div class="profile-card">
                <p>Nama Pengguna</p>
                <h3>{{ auth()->user()->name }}</h3>
            </div>

            <div class="profile-card">
                <p>Email Akun</p>
                <h3>{{ auth()->user()->email }}</h3>
            </div>

            <div class="profile-card">
                <p>Total Data Ditampilkan</p>
                <h3>{{ $pesertas->count() }} Peserta</h3>
            </div>
        </section>

        {{-- Menampilkan tabel dan fitur pencarian data peserta --}}
        <section class="content">
            <h2>Data Peserta Sertifikasi</h2>
            <p class="description">Cari data peserta melalui nama atau nomor peserta.</p>

            {{-- Menampilkan pesan jika data berhasil diperbarui --}}
            @if (session('success'))
                <div class="success">
                    {{ session('success') }}
                </div>
            @endif

            {{-- Form untuk mencari peserta berdasarkan nama atau nomor peserta --}}
            <form action="{{ route('user.dashboard') }}" method="GET" class="search">
                <input
                    type="text"
                    name="search"
                    placeholder="Cari nama atau nomor peserta..."
                    value="{{ $search ?? '' }}"
                >

                <button type="submit" class="btn btn-search">Cari</button>
                <a href="{{ route('user.dashboard') }}" class="btn btn-reset">Reset</a>
            </form>

            {{-- Menampilkan data peserta dari database --}}
            <div class="table-wrapper">
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
                                        {{-- Tombol untuk melihat detail peserta --}}
                                        <a
                                            href="{{ route('user.peserta.show', $peserta->id) }}"
                                            class="btn btn-detail"
                                        >
                                            Detail
                                        </a>

                                        {{-- Tombol edit hanya muncul pada data milik user yang login --}}
                                        @if (
                                            $peserta->user_id !== null &&
                                            (int) $peserta->user_id === (int) auth()->id()
                                        )
                                            <a
                                                href="{{ route('user.peserta.edit', $peserta->id) }}"
                                                class="btn btn-edit"
                                            >
                                                Edit
                                            </a>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            {{-- Menampilkan pesan jika pencarian tidak menemukan data --}}
                            <tr>
                                <td colspan="8" class="empty">
                                    Data peserta tidak ditemukan.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </section>
    </main>

    {{-- Footer aplikasi --}}
    <footer class="footer">
        Aplikasi Data Peserta Sertifikasi
    </footer>

</body>
</html>