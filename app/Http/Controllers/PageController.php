<?php

namespace App\Http\Controllers;

use App\Models\StrukturOrganisasi;
use Illuminate\Http\Request;
use App\Models\Galeri;

class PageController extends Controller
{
    /**
     * Menampilkan halaman struktur organisasi publik.
     *
     * @return \Illuminate\View\View
     */
    public function showStrukturOrganisasi() // Atau nama method Anda
    {
        // 1. Ambil data dari database, urutkan berdasarkan kolom 'urutan'
        // GANTI 'AnggotaStruktur' jika nama model Anda berbeda
        $dataAnggota = StrukturOrganisasi::orderBy('urutan', 'asc')->get();

        // 2. Kirim data ke view 'struktur.blade.php' dengan nama variabel 'anggotas'
        return view('struktur', [
            'anggotas' => $dataAnggota  // <-- PASTIKAN KUNCI ARRAY ADALAH 'anggotas'
        ]);

        // Alternatif menggunakan compact():
        // $anggotas = AnggotaStruktur::orderBy('urutan', 'asc')->get();
        // return view('struktur', compact('anggotas')); // <-- PASTIKAN NAMA VARIABELNYA 'anggotas'
    }

    public function index() // <-- Pastikan nama method ini sesuai dengan yang di route
    {
        // 1. AMBIL DATA ANGGOTA DARI DATABASE
        //    Pastikan Model 'StrukturOrganisasi' ada dan kolom 'urutan' ada di tabel
        $dataAnggota = StrukturOrganisasi::orderBy('urutan', 'asc')->get();

        $galeriItemsHomepage = Galeri::latest()->take(6)->get();

        // Ambil semua kategori unik untuk filter (jika Anda masih ingin menampilkan filter di homepage)
        $kategoriFiltersHomepage = Galeri::select('kategori')->distinct()->pluck('kategori');


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


    public function showGaleri() // Ganti nama method jika perlu (sesuaikan dengan route)
    {
        // Ambil semua item galeri, urutkan (misal berdasarkan terbaru)
        $galeriItems = Galeri::latest()->get();

        // Ambil daftar kategori unik yang ada di item galeri untuk filter
        $kategoriFilters = Galeri::select('kategori')->distinct()->pluck('kategori');

        // Kirim data ke view 'galeri.blade.php'
        return view('galeri', compact('galeriItems', 'kategoriFilters'));
        // 'galeri' adalah nama file view: resources/views/galeri.blade.php
    }

}
