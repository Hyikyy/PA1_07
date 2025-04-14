<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class AboutController extends Controller
{
    public function index(): View
    {
        return view('about.index');
    }

    /**
     * Menampilkan halaman "Sejarah".
     */
    public function sejarah(): View
    {
        return view('about.sejarah');
    }

    /**
     * Menampilkan halaman "Visi & Misi".
     */
    public function visiMisi(): View
    {
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

