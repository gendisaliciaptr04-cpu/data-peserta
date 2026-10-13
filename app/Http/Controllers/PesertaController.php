<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    // Menampilkan data peserta dan fitur pencarian
    public function index(Request $request)
    {
        $search = $request->search;

        $pesertas = Peserta::with('skema')
            ->when($search, function ($query, $search) {
                $query->where(function ($q) use ($search) {
                    $q->where('nama', 'like', '%' . $search . '%')
                        ->orWhere('nomor_peserta', 'like', '%' . $search . '%');
                });
            })
            ->get();

        return view('peserta.index', compact('pesertas', 'search'));
    }

    // Menampilkan form tambah peserta
    public function create()
    {
        $skemas = Skema::all();

        return view('peserta.create', compact('skemas'));
    }

    // Menyimpan data peserta baru
    public function store(Request $request)
    {
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
            'no_hp.required' => 'Nomor telepon wajib diisi.',
            'no_hp.digits_between' => 'Nomor telepon harus terdiri dari 11 sampai 13 angka tanpa huruf atau simbol.',
            'skema_id.required' => 'Skema sertifikasi wajib dipilih.',
            'skema_id.exists' => 'Skema sertifikasi tidak valid.',
        ]);

        Peserta::create($request->only([
            'nomor_peserta',
            'nik',
            'nama',
            'email',
            'no_hp',
            'skema_id',
        ]));

        return redirect()->route('peserta.index');
    }

    // Menampilkan detail peserta
    public function show(Peserta $pesertum)
    {
        $pesertum->load('skema');

        return view('peserta.show', compact('pesertum'));
    }

    // Menampilkan form edit peserta
    public function edit(Peserta $pesertum)
    {
        $skemas = Skema::all();

        return view('peserta.edit', [
            'peserta' => $pesertum,
            'skemas' => $skemas,
        ]);
    }

    // Memperbarui data peserta
    public function update(Request $request, Peserta $pesertum)
    {
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
            'no_hp.required' => 'Nomor telepon wajib diisi.',
            'no_hp.digits_between' => 'Nomor telepon harus terdiri dari 11 sampai 13 angka tanpa huruf atau simbol.',
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

        return redirect()->route('peserta.index');
    }

    // Menghapus data peserta
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();

        return redirect()->route('peserta.index');
    }
}