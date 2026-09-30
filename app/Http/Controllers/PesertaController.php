<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Skema;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $pesertas = Peserta::with('skema')->get();

        return view('peserta.index', compact('pesertas'));
    }

    public function create()
    {
        $skemas = Skema::all();

        return view('peserta.create', compact('skemas'));
    }

    public function store(Request $request)
    {
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

    public function edit(Peserta $pesertum)
    {
        $skemas = Skema::all();

        return view('peserta.edit', [
            'peserta' => $pesertum,
            'skemas' => $skemas
        ]);
    }

    public function update(Request $request, Peserta $pesertum)
    {
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

    public function destroy(Peserta $pesertum)
    {
        $pesertum->delete();

        return redirect()->route('peserta.index');
    }
}