<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Galeri;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class GaleriController extends Controller
{
     // Mendefinisikan kategori yang tersedia (bisa juga diambil dari DB jika lebih kompleks)
     private function getKategoriOptions() {
        return [
            'graduation' => 'Graduation',
            'kaderisasi' => 'Kaderisasi',
            'welpart' => 'Welcoming Party',
            'bukber' => 'Bukber',
            'nobar' => 'Nobar',
            // Tambahkan kategori lain jika perlu
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $galeriItems = Galeri::latest()->paginate(10); // Ambil data terbaru, paginasi
        return view('admin.galeri.index', compact('galeriItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoriOptions = $this->getKategoriOptions();
        return view('admin.galeri.create', compact('kategoriOptions'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:'.implode(',', array_keys($this->getKategoriOptions())), // Validasi kategori
            'deskripsi' => 'nullable|string',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240', // Validasi gambar
        ]);

        // Proses Upload Gambar
        $pathGambar = null;
        if ($request->hasFile('gambar')) {
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            // Simpan di folder 'public/galeri'
            // Pastikan Anda sudah menjalankan `php artisan storage:link`
            $pathGambar = $request->file('gambar')->storeAs('public/galeri', $namaFile);
            // Dapatkan path yang relatif terhadap storage/app/public
            $pathGambar = str_replace('public/', '', $pathGambar); // Hasilnya akan seperti 'galeri/namafile.jpg'
        }

        Galeri::create([
            'judul' => $request->judul,
            'kategori' => $request->kategori,
            'deskripsi' => $request->deskripsi,
            'gambar' => $pathGambar, // Simpan path relatif
        ]);

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Item galeri berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Galeri $galeri)
    {
        return redirect()->route('admin.galeri.edit', $galeri->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Galeri $galeri)
    {
        $kategoriOptions = $this->getKategoriOptions();
        return view('admin.galeri.edit', [
            'galeri' => $galeri,
            'kategoriOptions' => $kategoriOptions
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Galeri $galeri)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'kategori' => 'required|string|in:'.implode(',', array_keys($this->getKategoriOptions())),
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:10240', // Gambar opsional saat update
        ]);

        $dataToUpdate = $request->only(['judul', 'kategori', 'deskripsi']);

        // Proses Upload Gambar Baru (jika ada)
        if ($request->hasFile('gambar')) {
            // Hapus gambar lama jika ada
            if ($galeri->gambar) {
                Storage::delete('public/' . $galeri->gambar);
            }

            // Upload gambar baru
            $namaFile = time() . '_' . $request->file('gambar')->getClientOriginalName();
            $pathGambar = $request->file('gambar')->storeAs('public/galeri', $namaFile);
            $dataToUpdate['gambar'] = str_replace('public/', '', $pathGambar); // Simpan path relatif baru
        }

        $galeri->update($dataToUpdate);

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Item galeri berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Galeri $galeri)
    {
         // Hapus file gambar terkait jika ada
         if ($galeri->gambar) {
            Storage::delete('public/' . $galeri->gambar);
        }

        // Hapus data dari database
        $galeri->delete();

        return redirect()->route('admin.galeri.index')
                         ->with('success', 'Item galeri berhasil dihapus.');
    }


    public function showGaleri() // Atau nama method Anda
    {
        // 1. Ambil data dari database, urutkan berdasarkan kolom 'urutan'
        // GANTI 'AnggotaStruktur' jika nama model Anda berbeda
        $dataGaleri = Galeri::orderBy('urutan', 'asc')->get();

        // 2. Kirim data ke view 'struktur.blade.php' dengan nama variabel 'anggotas'
        return view('galeri', [
            'galeriItems' => $galeriItems,
            'kategoriFilters' => $kategoriFilters  // <-- PASTIKAN KUNCI ARRAY ADALAH 'anggotas'
        ]);

        // Alternatif menggunakan compact():
        // $anggotas = AnggotaStruktur::orderBy('urutan', 'asc')->get();
        // return view('struktur', compact('anggotas')); // <-- PASTIKAN NAMA VARIABELNYA 'anggotas'
    }


}
