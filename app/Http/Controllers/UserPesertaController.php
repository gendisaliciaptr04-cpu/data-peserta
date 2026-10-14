<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class UserPesertaController extends Controller
{
    // Menampilkan detail peserta
    public function show(Peserta $pesertum)
    {
        $pesertum->load('skema');

        return view('user-peserta.show', compact('pesertum'));
    }

    // Memastikan peserta merupakan milik user yang sedang login
    private function cekPemilik(Peserta $pesertum)
    {
        abort_unless(
            auth()->check() &&
            auth()->id() !== null &&
            $pesertum->user_id !== null &&
            (int) auth()->id() === (int) $pesertum->user_id,
            403,
            'Anda tidak memiliki izin untuk mengedit data peserta ini.'
        );
    }

    // Menampilkan form edit peserta
    public function edit(Peserta $pesertum)
    {
        $this->cekPemilik($pesertum);

        $skemas = Skema::all();

        return view('user-peserta.edit', [
            'peserta' => $pesertum,
            'skemas' => $skemas,
        ]);
    }

    // Memperbarui data peserta
    public function update(Request $request, Peserta $pesertum)
    {
        $this->cekPemilik($pesertum);

        $request->validate([
            'nomor_peserta' => 'required',
            'nik' => ['required', 'digits:16'],
            'nama' => ['required', 'string', 'max:50', 'regex:/^[\pL\s]+$/u'],
            'email' => 'required|email',
            'no_hp' => ['required', 'digits_between:11,13'],
            'skema_id' => 'required|exists:skemas,id',
        ], [
            'nomor_peserta.required' => 'Nomor peserta wajib diisi.',
            'nik.required' => 'NIK wajib diisi.',
            'nik.digits' => 'NIK harus tepat 16 digit.',
            'nama.required' => 'Nama wajib diisi.',
            'nama.max' => 'Nama maksimal 50 karakter.',
            'nama.regex' => 'Nama hanya boleh berisi huruf dan spasi.',
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'no_hp.required' => 'Nomor HP wajib diisi.',
            'no_hp.digits_between' => 'Nomor HP harus berupa angka dengan panjang 11–13 digit.',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_id.exists' => 'Skema sertifikasi tidak valid.',
        ]);

        $pesertum->update($request->only([
            'nomor_peserta',
            'nik',
            'nama',
            'email',
            'no_hp',
            'skema_id',
        ]));

        return redirect()
            ->route('user.dashboard')
            ->with('success', 'Data peserta berhasil diperbarui.');
    }
}
