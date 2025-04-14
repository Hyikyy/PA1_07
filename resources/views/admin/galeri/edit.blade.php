@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('title', 'Edit Item Galeri: ' . $galeri->judul)

@section('content')
<div class="container-fluid">
    <h1>Edit Item Galeri: {{ $galeri->judul }}</h1>

    {{-- Menampilkan Pesan Error Validasi --}}
    @if ($errors->any())
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>Oops! Terjadi kesalahan:</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-body">
             {{-- Form mengarah ke route update, gunakan multipart dan method PUT/PATCH --}}
            <form action="{{ route('admin.galeri.update', $galeri->id) }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- Token Keamanan Laravel --}}
                @method('PUT') {{-- Method Spoofing untuk Update --}}

                {{-- Input Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                    {{-- Gunakan old() sebagai fallback jika validasi gagal --}}
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul', $galeri->judul) }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Kategori --}}
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="" disabled>-- Pilih Kategori --</option>
                        @foreach ($kategoriOptions as $key => $value)
                            <option value="{{ $key }}" {{ old('kategori', $galeri->kategori) == $key ? 'selected' : '' }}>{{ $value }}</option>
                        @endforeach
                    </select>
                    <div class="form-text">Ini akan digunakan untuk filter di halaman publik.</div>
                    @error('kategori')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Deskripsi --}}
                <div class="mb-3">
                    <label for="deskripsi" class="form-label">Deskripsi (Opsional)</label>
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $galeri->deskripsi) }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Gambar --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label">Ganti Gambar (Opsional)</label>
                    {{-- Tampilkan Gambar Lama --}}
                     @if($galeri->gambar)
                        <img id="gambar-preview" src="{{ asset('storage/' . $galeri->gambar) }}" alt="Gambar {{ $galeri->judul }}" class="img-thumbnail mb-2 d-block" style="max-height: 200px;">
                     @else
                         <img id="gambar-preview" src="#" alt="Preview Gambar" class="img-thumbnail mb-2 d-none" style="max-height: 200px;">
                        <p class="text-muted small">Belum ada gambar.</p>
                     @endif
                    {{-- Input File Baru --}}
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" onchange="previewImage(event)">
                    <div class="form-text">Kosongkan jika tidak ingin mengganti gambar. Format: JPG, PNG, GIF, SVG, WEBP. Maks: 2MB.</div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>
                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-sync-alt me-1"></i> Update Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
{{-- Script simple untuk preview gambar --}}
<script>
    function previewImage(event) {
        var reader = new FileReader();
        var output = document.getElementById('gambar-preview');
        reader.onload = function(){
            output.src = reader.result;
            output.classList.remove('d-none'); // Tampilkan preview
            output.classList.add('d-block');
        };
         if (event.target.files[0]) {
             reader.readAsDataURL(event.target.files[0]);
         }
         // Jika di edit, jangan sembunyikan jika user batal memilih file baru
         // Biarkan gambar lama tetap terlihat jika field file kosong
    }

     // Pastikan preview tampil saat halaman load jika sudah ada gambar
    document.addEventListener('DOMContentLoaded', function() {
         var output = document.getElementById('gambar-preview');
         if (output.src && output.src !== '#' && !output.src.includes('blob:')) { // Cek jika sudah ada src valid (bukan placeholder atau blob baru)
              output.classList.remove('d-none');
              output.classList.add('d-block');
         } else if (!output.src || output.src === '#') {
             output.classList.add('d-none'); // Sembunyikan jika tidak ada src awal
         }
    });
</script>
@endpush
