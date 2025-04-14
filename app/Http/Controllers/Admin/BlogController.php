<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\Storage;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::latest()->paginate(10); // Ambil semua blog, paginasi 10 per halaman
        return view('admin.blog.index', compact('blogs')); // Kirim data ke view admin
    }

     /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.blog.create'); // Tampilkan form tambah
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10024', // Validasi gambar
        ]);

        $imagePath = null;
        // 2. Handle File Upload (jika ada)
        if ($request->hasFile('image')) {
            // Simpan gambar ke storage/app/public/blog_images
            // Nama file unik untuk menghindari konflik
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        // 3. Simpan Data ke Database
        Blog::create([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'image_path' => $imagePath, // Simpan path gambar
            // 'user_id' => auth()->id(), // Jika menyimpan user_id
        ]);

        // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.blog.index')
                         ->with('success', 'Postingan blog berhasil ditambahkan.');
    }

    /**
     * Display the specified resource. (Opsional untuk admin)
     */
    public function show(Blog $blog)
    {
         return view('admin.blog.show', compact('blog')); // Tampilkan detail di admin
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog) // Route model binding otomatis inject $blog
    {
        return view('admin.blog.edit', compact('blog')); // Tampilkan form edit dengan data $blog
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
         // 1. Validasi Input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'category' => 'nullable|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:10024', // Validasi gambar (opsional saat update)
        ]);

        $imagePath = $blog->image_path; // Path gambar lama
        // 2. Handle File Upload (jika ada gambar baru)
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada
            if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
                Storage::disk('public')->delete($blog->image_path);
            }
            // Simpan gambar baru
            $imagePath = $request->file('image')->store('blog_images', 'public');
        }

        // 3. Update Data di Database
        $blog->update([
            'title' => $validated['title'],
            'content' => $validated['content'],
            'category' => $validated['category'],
            'image_path' => $imagePath, // Simpan path gambar (bisa jadi yg lama atau baru)
        ]);

         // 4. Redirect dengan pesan sukses
        return redirect()->route('admin.blog.index')
                         ->with('success', 'Postingan blog berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        // 1. Hapus gambar dari storage jika ada
        if ($blog->image_path && Storage::disk('public')->exists($blog->image_path)) {
            Storage::disk('public')->delete($blog->image_path);
        }

        // 2. Hapus data dari database
        $blog->delete();

        // 3. Redirect dengan pesan sukses
        return redirect()->route('admin.blog.index')
                         ->with('success', 'Postingan blog berhasil dihapus.');
    }

    public function showBlog() // Atau nama method Anda
    {
        // 1. Ambil data dari database, urutkan berdasarkan kolom 'urutan'
        // GANTI 'AnggotaStruktur' jika nama model Anda berbeda
        $recentBlogs = Blog::orderBy('urutan', 'asc')->get();

        // 2. Kirim data ke view 'struktur.blade.php' dengan nama variabel 'anggotas'
        return view('blog', [
            'recentBlogs' => $recentBlogs

        ]);

        // Alternatif menggunakan compact():
        // $anggotas = AnggotaStruktur::orderBy('urutan', 'asc')->get();
        // return view('struktur', compact('anggotas')); // <-- PASTIKAN NAMA VARIABELNYA 'anggotas'
    }

}
