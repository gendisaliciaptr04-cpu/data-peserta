<?php
namespace App\Http\Controllers;
// Menggunakan model Skema
use App\Models\Skema;
// Menggunakan Request untuk mengambil data form
use Illuminate\Http\Request;
// Controller untuk mengatur data skema
class SkemaController extends Controller
{
    // Menampilkan semua data skema
    public function index()
    {
        // Mengambil seluruh data skema
        $skemas = Skema::all();

        // Menampilkan halaman skema
        return view(
            'skema.index',
            compact('skemas')
        );
    }
    // Menampilkan form tambah skema
    public function create()
    {
        return view('skema.create');
    }
    // Menyimpan skema baru
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);
        // Menyimpan data skema
        Skema::create($request->all());
        // Kembali ke halaman skema
        return redirect()->route('skema.index');
    }
    // Menampilkan detail skema
    public function show(Skema $skema)
    {
        // Menampilkan halaman detail skema
        return view(
            'skema.show',
            compact('skema')
        );
    }
    // Menampilkan form edit skema
    public function edit(Skema $skema)
    {
        return view(
            'skema.edit',
            compact('skema')
        );
    }
    // Memperbarui data skema
    public function update(
        Request $request,
        Skema $skema
    ) {
        // Validasi data
        $request->validate([
            'kode' => 'required',
            'nama' => 'required',
            'deskripsi' => 'nullable',
        ]);
        // Mengubah data skema
        $skema->update($request->all());
        // Kembali ke halaman skema
        return redirect()->route('skema.index');
    }
    // Menghapus data skema
    public function destroy(Skema $skema)
    {
        // Menghapus data skema
        $skema->delete();
        // Kembali ke halaman skema
        return redirect()->route('skema.index');
    }
}