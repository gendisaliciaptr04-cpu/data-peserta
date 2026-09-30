<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Skema</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>

<div class="container">

    <div class="header">
        <h1>Edit Skema Sertifikasi</h1>
        <p>Ubah data skema sertifikasi</p>
    </div>

    <div class="card">

        @if ($errors->any())
            <div class="error-box">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form
            action="{{ route('skema.update', $skema->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-group">

                <label>Kode Skema</label>

                <input
                    type="text"
                    name="kode"
                    value="{{ old('kode', $skema->kode) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Nama Skema</label>

                <input
                    type="text"
                    name="nama"
                    value="{{ old('nama', $skema->nama) }}"
                    required
                >

            </div>

            <div class="form-group">

                <label>Deskripsi</label>

                <textarea
                    name="deskripsi"
                    rows="5"
                >{{ old('deskripsi', $skema->deskripsi) }}</textarea>

            </div>

            <div class="action-group">

                <button type="submit">
                    Update
                </button>

                <a href="{{ route('skema.index') }}" class="btn btn-secondary">
                    Batal
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>