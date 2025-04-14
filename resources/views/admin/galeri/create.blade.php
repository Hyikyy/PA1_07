@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('title', 'Tambah Item Galeri Baru')

@section('content')
<div class="container-fluid">
    <h1>Tambah Item Galeri Baru</h1>

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
            <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- Token Keamanan Laravel --}}

                {{-- Input Judul --}}
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" id="judul" name="judul" value="{{ old('judul') }}" required>
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Kategori --}}
                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori <span class="text-danger">*</span></label>
                    <select class="form-select @error('kategori') is-invalid @enderror" id="kategori" name="kategori" required>
                        <option value="" disabled selected>-- Pilih Kategori --</option>
                        @foreach ($kategoriOptions as $key => $value)
                            <option value="{{ $key }}" {{ old('kategori') == $key ? 'selected' : '' }}>{{ $value }}</option>
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
                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                    @error('deskripsi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Input Gambar --}}
                <div class="mb-3">
                    <label for="gambar" class="form-label">Upload Gambar <span class="text-danger">*</span></label>
                     <img id="gambar-preview" src="#" alt="Preview Gambar" class="img-thumbnail mb-2 d-none" style="max-height: 200px;">
                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" id="gambar" name="gambar" required onchange="previewImage(event)">
                    <div class="form-text">Format: JPG, PNG, GIF, SVG, WEBP. Maks: 2MB.</div>
                    @error('gambar')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <hr>
                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Item
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
        reader.onload = function(){
            var output = document.getElementById('gambar-preview');
            output.src = reader.result;
            output.classList.remove('d-none'); // Tampilkan preview
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        } else {
             output.classList.add('d-none'); // Sembunyikan jika tidak ada file
             output.src = '#'; // Reset src
        }
    }
</script>
@endpush
