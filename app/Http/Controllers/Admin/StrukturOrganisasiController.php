<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class StrukturOrganisasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Ambil semua data, urutkan berdasarkan 'urutan' atau 'created_at'
        $anggotas = StrukturOrganisasi::orderBy('urutan', 'asc')->orderBy('created_at', 'asc')->get();
         // Tampilkan view admin/struktur/index.blade.php dan kirim data anggotas
        return view('admin.struktur.index', compact('anggotas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         // Tampilkan view admin/struktur/create.blade.php
        return view('admin.struktur.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Validasi gambar
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer',
        ]);

        // 2. Proses Upload Gambar (jika ada)
        $pathFoto = null;
        if ($request->hasFile('foto')) {
            // Nama file unik: timestamp + nama asli
            $namaFile = time() . '_' . $request->file('foto')->getClientOriginalName();
            // Simpan di folder 'public/struktur_foto'
            // Pastikan Anda sudah menjalankan `php artisan storage:link`
            $pathFoto = $request->file('foto')->storeAs('public/struktur_foto', $namaFile);
            // Dapatkan path yang relatif terhadap storage/app/public
            $pathFoto = str_replace('public/', '', $pathFoto);
        }

        // 3. Simpan Data ke Database
        StrukturOrganisasi::create([
            'nama' => $request->nama,
            'jabatan' => $request->jabatan,
            'foto' => $pathFoto, // Simpan path relatif
            'twitter' => $request->twitter,
            'facebook' => $request->facebook,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'urutan' => $request->urutan ?? 0,
        ]);

        // 4. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.struktur.index')
                         ->with('success', 'Anggota berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(StrukturOrganisasi $struktur)
    {
        // Mungkin redirect ke edit atau tampilkan detail jika perlu
        return redirect()->route('admin.struktur.edit', $struktur->id);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StrukturOrganisasi $struktur)
    {
        //Kirim data $struktur ke view dengan nama 'anggota'
         return view('admin.struktur.edit', ['anggota' => $struktur]);
         // ATAU bisa juga seperti ini:
         // $anggota = $struktur;
         // return view('admin.struktur.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, StrukturOrganisasi $struktur)
    {
          // 1. Validasi Input
          $request->validate([
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048', // Gambar opsional saat update
            'twitter' => 'nullable|url|max:255',
            'facebook' => 'nullable|url|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'urutan' => 'nullable|integer',
        ]);

        $dataToUpdate = $request->only(['nama', 'jabatan', 'twitter', 'facebook', 'instagram', 'linkedin', 'urutan']);
        $dataToUpdate['urutan'] = $request->urutan ?? $struktur->urutan; // Jaga urutan lama jika tidak diisi

        // 2. Proses Upload Gambar Baru (jika ada)
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($struktur->foto) {
                Storage::delete('public/' . $struktur->foto);
            }

            // Upload foto baru
            $namaFile = time() . '_' . $request->file('foto')->getClientOriginalName();
            $pathFoto = $request->file('foto')->storeAs('public/struktur_foto', $namaFile);
            $dataToUpdate['foto'] = str_replace('public/', '', $pathFoto); // Simpan path relatif baru
        }

        // 3. Update Data di Database
        $struktur->update($dataToUpdate);

        // 4. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.struktur.index')
                         ->with('success', 'Anggota berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StrukturOrganisasi $struktur)
    {
        // 1. Hapus file foto terkait jika ada
        if ($struktur->foto) {
            Storage::delete('public/' . $struktur->foto);
        }

        // 2. Hapus data dari database
        $struktur->delete();

        // 3. Redirect ke halaman index dengan pesan sukses
        return redirect()->route('admin.struktur.index')
                         ->with('success', 'Anggota berhasil dihapus.');

    }


    public function showStrukturOrganisasi() // Atau nama method Anda
    {
        // 1. Ambil data dari database, urutkan berdasarkan kolom 'urutan'
        // GANTI 'AnggotaStruktur' jika nama model Anda berbeda
        $dataAnggota = AnggotaStruktur::orderBy('urutan', 'asc')->get();

        // 2. Kirim data ke view 'struktur.blade.php' dengan nama variabel 'anggotas'
        return view('struktur', [
            'anggotas' => $dataAnggota  // <-- PASTIKAN KUNCI ARRAY ADALAH 'anggotas'
        ]);

        // Alternatif menggunakan compact():
        // $anggotas = AnggotaStruktur::orderBy('urutan', 'asc')->get();
        // return view('struktur', compact('anggotas')); // <-- PASTIKAN NAMA VARIABELNYA 'anggotas'
    }
}
