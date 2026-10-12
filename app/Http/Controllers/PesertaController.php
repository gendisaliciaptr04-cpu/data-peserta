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
                $query->where('nama', 'like', '%' . $search . '%')
                      ->orWhere('nomor_peserta', 'like', '%' . $search . '%');
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
        // Validasi data sebelum disimpan
        $request->validate([
            'nomor_peserta' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'skema_id' => 'required',
        ]);

        Peserta::create($request->all());

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
            'skemas' => $skemas
        ]);
    }

    // Mengubah data peserta
    public function update(Request $request, Peserta $pesertum)
    {
        // Validasi data sebelum diperbarui
        $request->validate([
            'nomor_peserta' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'skema_id' => 'required',
        ]);

        $pesertum->update($request->all());

        return redirect()->route('peserta.index');
    }

    // Menghapus data peserta
    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();

        return redirect()->route('peserta.index');
    }
}