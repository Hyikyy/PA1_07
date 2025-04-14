<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\StrukturOrganisasi;

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

        // Ambil data lain untuk dashboard jika ada
        // $jumlahEvent = Event::count();
        // $beritaTerbaru = Berita::latest()->take(3)->get();

        // Kirim semua data ke view dashboard
        return view('admin.dashboard', [ // Sesuaikan nama view jika perlu (misal 'dashboard' saja)
            'anggotas' => $anggotas,
            // 'jumlahEvent' => $jumlahEvent,
            // 'beritaTerbaru' => $beritaTerbaru,
            // ... data lainnya
        ]);
    
    }
}
