<?php

namespace App\Http\Controllers;

use App\Models\Skema;
use Illuminate\Http\Request;

class SkemaController extends Controller
{
    // Menampilkan semua data skema
    public function index()
    {
        $skemas = Skema::all();

        return view('skema.index', compact('skemas'));
    }

    // Menampilkan form tambah skema
    public function create()
    {
        return view('skema.create');
    }

    // Menyimpan data skema baru
    public function store(Request $request)
    {
        // Validasi data sebelum disimpan
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        Skema::create($request->all());

        return redirect()->route('skema.index');
    }

    // Menampilkan detail skema
    public function show(Skema $skema)
    {
        return view('skema.show', compact('skema'));
    }

    // Menampilkan form edit skema
    public function edit(Skema $skema)
    {
        return view('skema.edit', compact('skema'));
    }

    // Mengubah data skema
    public function update(Request $request, Skema $skema)
    {
        // Validasi data sebelum diperbarui
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);

        $skema->update($request->all());

        return redirect()->route('skema.index');
    }

    // Menghapus data skema
    public function destroy(Skema $skema)
    {
        $skema->delete();

        return redirect()->route('skema.index');
    }
}