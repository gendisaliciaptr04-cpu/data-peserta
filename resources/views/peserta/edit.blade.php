<!DOCTYPE html>
<html>
<head>
    <title>Edit Peserta</title>
</head>
<body>

    <h1>Edit Peserta Sertifikasi</h1>

    <form action="{{ route('peserta.update', ['pesertum' => $peserta->id]) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nomor Peserta</label><br>
        <input type="text" name="nomor_peserta"
               value="{{ $peserta->nomor_peserta }}" required>

        <br><br>

        <label>Nama Peserta</label><br>
        <input type="text" name="nama"
               value="{{ $peserta->nama }}" required>

        <br><br>

        <label>Email</label><br>
        <input type="email" name="email"
               value="{{ $peserta->email }}" required>

        <br><br>

        <label>No HP</label><br>
        <input type="text" name="no_hp"
               value="{{ $peserta->no_hp }}" required>

        <br><br>

        <label>Skema Sertifikasi</label><br>
        <select name="skema_id" required>

            @foreach ($skemas as $skema)
                <option value="{{ $skema->id }}"
                    {{ $peserta->skema_id == $skema->id ? 'selected' : '' }}>
                    {{ $skema->nama }}
                </option>
            @endforeach

        </select>

        <br><br>

        <button type="submit">Update</button>
        <a href="{{ route('peserta.index') }}">Batal</a>

    </form>

</body>
</html>