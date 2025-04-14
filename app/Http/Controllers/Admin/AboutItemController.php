<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AboutItem;
use Illuminate\Http\Request;

class AboutItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Ambil semua item, urutkan berdasarkan 'order'
         $aboutItems = AboutItem::orderBy('order')->get();
         // Tampilkan view admin index dengan data item
         return view('admin.about_item.index', compact('aboutItems'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.about_item.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'key' => 'required|string|max:50|unique:about_items,key',
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'icon_class' => 'required|string|max:100',
            'route_name' => 'required|string|max:100', // Anda bisa tambahkan validasi route exists jika perlu
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active'); // Pastikan boolean

        AboutItem::create($validated);

        return redirect()->route('admin.about_item.index')
                         ->with('success', 'About Item berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(AboutItem $aboutItem)
    {
        return redirect()->route('admin.about_item.edit', $aboutItem);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(AboutItem $aboutItem)
    {
        return view('admin.about_item.edit', compact('about_item'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, AboutItem $aboutItem)
    {
        $validated = $request->validate([
            // Pastikan key unik, tapi abaikan item saat ini
            'key' => [
                'required',
                'string',
                'max:50',
                Rule::unique('about_item')->ignore($aboutItem->id),
            ],
            'title' => 'required|string|max:255',
            'summary' => 'required|string',
            'icon_class' => 'required|string|max:100',
            'route_name' => 'required|string|max:100',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->boolean('is_active'); // Pastikan boolean

        $aboutItem->update($validated);

        return redirect()->route('admin.about_item.index')
                         ->with('success', 'About Item berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(AboutItem $aboutItem)
    {
        $aboutItem->delete();

        return redirect()->route('admin.about_item.index')
                         ->with('success', 'About Item berhasil dihapus.');
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
        return view('admin.about_item.index', compact('about_item')); // Pastikan nama view sesuai
    }
}
