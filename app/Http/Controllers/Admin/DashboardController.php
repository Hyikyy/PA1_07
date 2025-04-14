<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\StrukturOrganisasi;
use App\Models\Galeri;
use App\Models\Blog;

class DashboardController extends Controller
{
     /**
     * Menampilkan halaman dashboard admin.
     *
     * @return \Illuminate\View\View
     */
    public function index(): View
    {

        // Ambil data anggota struktur
        $anggotas = StrukturOrganisasi::orderBy('urutan', 'asc')->get();

        $galeriItems = Galeri::latest()->take(6)->get();

        // Ambil semua kategori unik untuk filter (jika Anda masih ingin menampilkan filter di homepage)
        $kategoriFilters = Galeri::select('kategori')->distinct()->pluck('kategori');

        $recentBlogs = Blog::latest()->take(5)->get();

        // $aboutItems = \App\Models\AboutItem::where('is_active', true)->orderBy('order')->get();
        // return view('about.index', compact('aboutItems'));
        // Ambil data lain untuk dashboard jika ada
        // $jumlahEvent = Event::count();
        // $beritaTerbaru = Berita::latest()->take(3)->get();

        // Kirim semua data ke view dashboard
        return view('admin.dashboard', [ // Sesuaikan nama view jika perlu (misal 'dashboard' saja)
            'anggotas' => $anggotas,
            'galeriItems' => $galeriItems, // <-- INI BAGIAN KRUSIAL
            'kategoriFilters' => $kategoriFilters,
            'recentBlogs' => $recentBlogs,
            // 'aboutItems' => $aboutItems
            // 'jumlahEvent' => $jumlahEvent,
            // 'beritaTerbaru' => $beritaTerbaru,
            // ... data lainnya
        ]);

    }

    public function showAbout()
    {
        // Ambil semua item yang aktif dari database
        // Gunakan keyBy('key') untuk membuat array asosiatif dengan 'key' sebagai kuncinya
        $aboutItems = AboutItem::where('is_active', true)
                               ->orderBy('id') // Atau order berdasarkan kriteria lain jika perlu
                               ->get()
                               ->keyBy('key');

        // Kirim data ke view
        return view('public.about', compact('aboutItems')); // Pastikan nama view sesuai
    }

}
