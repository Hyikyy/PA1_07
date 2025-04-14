<?php

namespace App\Http\Controllers\Admin;

use App\Models\Sejarah;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;


class SejarahController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sejarahs = Sejarah::all(); // Ambil semua data sejarah dari database
        return view('admin.sejarah.index', compact('sejarahs')); // Kirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sejarah.create'); // Tampilkan form untuk membuat data baru
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
            // tambahkan validasi untuk field lainnya
        ]);

        Sejarah::create($request->all());

        return redirect()->route('sejarah.index') // Redirect ke halaman index
                         ->with('success','Sejarah berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return view('admin.sejarah.show',compact('sejarah'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('admin.sejarah.edit',compact('sejarah'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'judul' => 'required',
            'konten' => 'required',
        ]);

        $sejarah->update($request->all());

        return redirect()->route('sejarah.index')
                         ->with('success','Sejarah berhasil diupdate');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $sejarah->delete();

        return redirect()->route('sejarah.index')
                         ->with('success','Sejarah berhasil dihapus');
    }
}
