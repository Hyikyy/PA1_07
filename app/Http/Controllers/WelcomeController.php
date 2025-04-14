<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\StrukturOrganisasi;

class WelcomeController extends Controller
{
    public function index() // <-- Pastikan nama method ini sesuai dengan yang di route
    {
        // 1. AMBIL DATA ANGGOTA DARI DATABASE
        //    Pastikan Model 'StrukturOrganisasi' ada dan kolom 'urutan' ada di tabel
        $dataAnggota = StrukturOrganisasi::orderBy('urutan', 'asc')->get();

        // 2. KIRIM DATA KE VIEW 'welcome' DENGAN KEY 'anggotas'
        return view('welcome', [
            'anggotas' => $dataAnggota // <-- INI BAGIAN KRUSIAL
            // Anda bisa tambahkan data lain yang dibutuhkan halaman welcome di sini
            // 'beritaTerbaru' => Berita::latest()->take(3)->get(),
        ]);

        /*
        // Alternatif jika variabelnya sudah $anggotas:
        $anggotas = StrukturOrganisasi::orderBy('urutan', 'asc')->get();
        return view('welcome', compact('anggotas')); // <-- Pastikan nama variabel di compact() adalah 'anggotas'
        */
    }


}
