<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\AboutItem;
use App\Models\Content;

class AboutController extends Controller
{
    public function index(): View
    {
         // Ambil item yang aktif, urutkan, dan key berdasarkan slug
         $aboutItems = AboutItem::where('is_active', true)
         ->orderBy('order')
         ->get()
         ->keyBy('slug'); // Penting untuk akses mudah di view


          // Kirim data ke view
        return view('about.index', compact('aboutItems'));
    }

    /**
     * Menampilkan halaman "Sejarah".
     */
    public function sejarah(): View
    {
        $content = Content::where('slug', 'sejarah')->firstOrFail(); // Ambil data dg slug 'sejarah'

        // Proses body untuk paragraf HTML
        $paragraphs = explode("\n\n", htmlspecialchars($content->body)); // Pisahkan per 2 newline & escape
        $processedBody = '';
        foreach ($paragraphs as $p) {
            if (trim($p)) { // Hanya proses jika paragraf tidak kosong
                $processedBody .= "<p>" . nl2br(trim($p)) . "</p>"; // nl2br untuk handle single newline jika ada
            }
        }


        return view('about.sejarah', [
            'title' => $content->title,
            'body' => new HtmlString($processedBody) // Kirim sebagai HTML yang sudah diproses
        ]);
    }

    /**
     * Menampilkan halaman "Visi & Misi".
     */
    public function visiMisi(): View
    {
        $content = Content::where('slug', 'visi-misi')->firstOrFail();
        //     // Proses body jika perlu (sama seperti sejarah)
        //     return view('about.visi-misi', [
        //          'title' => $content->title,
        //          'body' => new HtmlString(nl2br(e($content->body))) // Atau cara simpel jika paragraf tidak kompleks
        //     ]);
        return view('about.visi_misi');
    }

    /**
     * Menampilkan halaman "Daftar Dosen".
     */
    public function daftarDosen(): View
    {
        return view('about.daftar_dosen');
    }

    /**
     * Menampilkan halaman "Daftar Alumni".
     */
    public function daftarAlumni(): View
    {
        return view('about.daftar_alumni');
    }

    /**
     * Menampilkan halaman "Daftar TA".
     */
    public function daftarTA(): View
    {
        return view('about.daftar_ta');
    }

        /**
     * Menampilkan halaman "Apa Kata Alumni".
     */
    public function apa_kata_alumni(): View
    {
        return view('about.apa_kata_alumni');
    }

}

