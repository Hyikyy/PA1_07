@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('title', 'Tambah Anggota Struktur Organisasi')

@section('content')
<div class="container-fluid">
    <h1>Tambah Anggota Baru</h1>

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
            {{-- Form mengarah ke route store, gunakan multipart untuk upload file --}}
            <form action="{{ route('admin.struktur.store') }}" method="POST" enctype="multipart/form-data">
                @csrf {{-- Token Keamanan Laravel --}}

                <div class="row">
                    <div class="col-md-8">
                        {{-- Input Nama --}}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Jabatan --}}
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan') }}" required>
                            @error('jabatan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        {{-- Input Urutan --}}
                        <div class="mb-3">
                            <label for="urutan" class="form-label">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('urutan') is-invalid @enderror" id="urutan" name="urutan" value="{{ old('urutan', 99) }}" required min="1">
                            <div class="form-text">Angka lebih kecil akan tampil lebih dulu.</div>
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                         {{-- Input Sosial Media --}}
                         <h5 class="mt-4">Link Sosial Media (Opsional)</h5>
                         <hr>
                         <div class="mb-3">
                             <label for="link_twitter" class="form-label"><i class="fab fa-twitter"></i> Twitter</label>
                             <input type="url" class="form-control @error('link_twitter') is-invalid @enderror" id="link_twitter" name="link_twitter" value="{{ old('link_twitter') }}" placeholder="https://twitter.com/username">
                             @error('link_twitter')
                                 <div class="invalid-feedback">{{ $message }}</div>
                             @enderror
                         </div>
                         <div class="mb-3">
                            <label for="link_facebook" class="form-label"><i class="fab fa-facebook"></i> Facebook</label>
                            <input type="url" class="form-control @error('link_facebook') is-invalid @enderror" id="link_facebook" name="link_facebook" value="{{ old('link_facebook') }}" placeholder="https://facebook.com/username">
                            @error('link_facebook')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="link_instagram" class="form-label"><i class="fab fa-instagram"></i> Instagram</label>
                            <input type="url" class="form-control @error('link_instagram') is-invalid @enderror" id="link_instagram" name="link_instagram" value="{{ old('link_instagram') }}" placeholder="https://instagram.com/username">
                            @error('link_instagram')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="link_linkedin" class="form-label"><i class="fab fa-linkedin"></i> LinkedIn</label>
                            <input type="url" class="form-control @error('link_linkedin') is-invalid @enderror" id="link_linkedin" name="link_linkedin" value="{{ old('link_linkedin') }}" placeholder="https://linkedin.com/in/username">
                            @error('link_linkedin')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                    </div>
                    <div class="col-md-4">
                        {{-- Input Foto --}}
                        <div class="mb-3">
                            <label for="foto" class="form-label">Foto Anggota</label>
                            {{-- Preview Image (Simple) --}}
                            <img id="foto-preview" src="{{ asset('assets/admin/img/default-avatar.png') }}" alt="Preview Foto" class="img-thumbnail mb-2" style="max-height: 200px; display: block;">
                            {{-- Input File --}}
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" onchange="previewImage(event)">
                            <div class="form-text">Format: JPG, PNG, WEBP. Maks: 2MB. Rekomendasi rasio 3:4 (Potrait).</div>
                            @error('foto')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>


                <hr>
                {{-- Tombol Aksi --}}
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.struktur.index') }}" class="btn btn-secondary me-2">Batal</a>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save me-1"></i> Simpan Anggota
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
            var output = document.getElementById('foto-preview');
            output.src = reader.result;
            output.style.display = 'block'; // Tampilkan img jika ada file dipilih
        };
        if (event.target.files[0]) {
            reader.readAsDataURL(event.target.files[0]);
        } else {
            // Opsional: Reset ke default jika file dibatalkan
             output.src = "{{ asset('assets/admin/img/default-avatar.png') }}"; // Ganti dengan path default Anda
        }
    }

    // Panggil previewImage saat halaman load jika ada old input file (meskipun ini sulit dilakukan dengan aman)
    // Lebih baik tidak usah menampilkan preview dari old input file.
    // Jika user kembali karena error, mereka harus memilih ulang file.
</script>
{{-- Jika menggunakan ikon FontAwesome, pastikan library dimuat --}}
@endpush
