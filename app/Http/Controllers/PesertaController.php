<?php
namespace App\Http\Controllers;
// Menggunakan model Peserta
use App\Models\Peserta;
// Menggunakan model Skema
use App\Models\Skema;
// Menggunakan Request untuk mengambil data dari form
use Illuminate\Http\Request;
// Controller untuk mengatur seluruh proses data peserta
class PesertaController extends Controller
{
    // Menampilkan seluruh data peserta
    public function index(Request $request)
    {
        // Mengambil kata pencarian dari URL
        $search = $request->search;
        // Mengambil data peserta sekaligus relasi skemanya
        $pesertas = Peserta::with('skema')
            // Menjalankan pencarian hanya jika ada kata pencarian
            ->when($search, function ($query, $search) {
                // Mencari berdasarkan nama peserta
                $query->where('nama', 'like', '%' . $search . '%')

                    // Atau mencari berdasarkan nomor peserta
                    ->orWhere(
                        'nomor_peserta',
                        'like',
                        '%' . $search . '%'
                    );
            })

            // Mengambil hasil data
            ->get();
        // Mengirim data peserta dan pencarian ke halaman index
        return view(
            'peserta.index',
            compact('pesertas', 'search')
        );
    }
    // Menampilkan form tambah peserta
    public function create()
    {
        // Mengambil semua data skema
        $skemas = Skema::all();
        // Menampilkan halaman tambah peserta
        return view(
            'peserta.create',
            compact('skemas')
        );
    }
    // Menyimpan peserta baru ke database
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
        // Menyimpan data peserta
        Peserta::create($request->all());
        // Kembali ke halaman data peserta
        return redirect()->route('peserta.index');
    }
    // Menampilkan detail peserta
    public function show(Peserta $pesertum)
    {
        // Mengambil data skema milik peserta
        $pesertum->load('skema');
        // Menampilkan halaman detail
        return view(
            'peserta.show',
            compact('pesertum')
        );
    }
    // Menampilkan form edit peserta
    public function edit(Peserta $pesertum)
    {
        // Mengambil semua skema untuk pilihan dropdown
        $skemas = Skema::all();
        // Mengirim data peserta dan skema ke halaman edit
        return view('peserta.edit', [
            'peserta' => $pesertum,
            'skemas' => $skemas
        ]);
    }
    // Memperbarui data peserta
    public function update(
        Request $request,
        Peserta $pesertum
    ) {
        // Validasi data
        $request->validate([
            'nomor_peserta' => 'required',
            'nama' => 'required',
            'email' => 'required|email',
            'no_hp' => 'required',
            'skema_id' => 'required',
        ]);

        // Mengubah data peserta
        $pesertum->update($request->all());
        // Kembali ke halaman peserta
        return redirect()->route('peserta.index');
    }
    // Menghapus data peserta
    public function destroy(Peserta $pesertum)
    {
        // Menghapus data peserta dari database
        $pesertum->delete();
        // Kembali ke halaman peserta
        return redirect()->route('peserta.index');
    }
}