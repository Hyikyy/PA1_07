@extends('layouts.admin') {{-- PASTIKAN INI ADALAH LAYOUT ADMIN ANDA --}}

@section('title', 'Kelola Struktur Organisasi (Pratinjau)')

@section('content')
<div class="container-fluid">
    <h1>Struktur Organisasi</h1>
    <p class="mb-3">Halaman ini menampilkan pratinjau bagaimana struktur akan terlihat di halaman publik, dengan tambahan tombol aksi admin.</p>
    <a href="{{ route('admin.struktur.create') }}" class="btn btn-primary mb-4">Tambah Anggota Baru</a>

    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    {{-- Meniru struktur dari halaman publik --}}
    <div class="struktur-preview-admin"> {{-- Tambahkan class wrapper jika perlu styling khusus admin --}}

        {{-- Opsional: Tambahkan judul section jika diinginkan --}}
        {{-- <div class="section-title mb-4">
            <h2>Pratinjau Struktur</h2>
            <p>Kepengurusan Himatif Pada Tahun 2024/2025 (Data dari Database)</p>
        </div> --}}

        <div class="row gy-4">

            @forelse ($anggotas->sortBy('urutan') as $anggota) {{-- Urutkan berdasarkan kolom 'urutan' --}}
                <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="{{ ($loop->index % 4 + 1) * 100 }}"> {{-- Sesuaikan delay jika perlu --}}
                    <div class="member card shadow-sm w-100"> {{-- Gunakan class card bootstrap untuk dasar styling --}}
                        @if($anggota->foto)
                            {{-- Gunakan asset('storage/...') untuk mengakses file di public/storage --}}
                            <img src="{{ asset('storage/' . $anggota->foto) }}" class="card-img-top" alt="{{ $anggota->nama }}" style="height: 250px; object-fit: cover;"> {{-- Atur style gambar --}}
                        @else
                            <div class="card-img-top d-flex align-items-center justify-content-center bg-light" style="height: 250px;">
                                <span class="text-muted">Tanpa Foto</span>
                            </div>
                        @endif

                        <div class="card-body text-center">
                            <h4 class="card-title h5">{{ $anggota->nama }}</h4>
                            <span class="card-text d-block mb-2">{{ $anggota->jabatan }}</span>
                            <p class="card-text text-muted small">Urutan: {{ $anggota->urutan }}</p> {{-- Tampilkan urutan untuk info admin --}}

                            {{-- Tombol Aksi Admin --}}
                            <div class="admin-actions mt-3">
                                <a href="{{ route('admin.struktur.edit', $anggota->id) }}" class="btn btn-sm btn-warning me-1">
                                    <i class="fas fa-edit"></i> Edit {{-- Ganti dengan ikon jika layout admin Anda menggunakan Font Awesome atau setara --}}
                                </a>
                                <form action="{{ route('admin.struktur.destroy', $anggota->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota {{ $anggota->nama }}?')">
                                        <i class="fas fa-trash"></i> Hapus {{-- Ganti dengan ikon jika layout admin Anda menggunakan Font Awesome atau setara --}}
                                    </button>
                                </form>
                            </div>
                             {{-- Akhir Tombol Aksi Admin --}}

                             {{-- Jika Anda menambahkan field social media di database, tampilkan di sini
                             <div class="social mt-3">
                                 <a href="{{ $anggota->twitter ?? '#' }}"><i class="bi bi-twitter-x"></i></a>
                                 <a href="{{ $anggota->facebook ?? '#' }}"><i class="bi bi-facebook"></i></a>
                                 <a href="{{ $anggota->instagram ?? '#' }}"><i class="bi bi-instagram"></i></a>
                                 <a href="{{ $anggota->linkedin ?? '#' }}"><i class="bi bi-linkedin"></i></a>
                             </div>
                             --}}
                        </div>
                    </div>
                </div><!-- End Struktur Member Card -->
            @empty
                <div class="col-12">
                    <div class="alert alert-warning text-center">
                        Belum ada data anggota struktur organisasi. Silakan tambahkan anggota baru.
                    </div>
                </div>
            @endforelse

        </div> {{-- End .row --}}

    </div> {{-- End .struktur-preview-admin --}}

</div>
@endsection

@push('styles')
{{-- Tambahkan CSS kustom di sini jika diperlukan untuk menyesuaikan tampilan kartu di admin --}}
<style>
    .member.card {
        transition: transform .2s ease-in-out;
        border: none; /* Hapus border default card */
    }
    .member.card:hover {
        transform: translateY(-5px);
        box-shadow: 0 .5rem 1rem rgba(0,0,0,.15)!important; /* Tingkatkan shadow saat hover */
    }
    .admin-actions .btn {
        /* Styling tambahan untuk tombol admin jika perlu */
    }
    /* Pastikan layout admin Anda memuat Bootstrap 5 agar class seperti gy-4, card, dll berfungsi */
</style>
{{-- Jika layout admin Anda belum memuat Font Awesome, Anda bisa menambahkannya --}}
{{-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" /> --}}
@endpush

@push('scripts')
{{-- Jika layout admin Anda belum memuat Bootstrap JS (untuk alert dismiss) --}}
{{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script> --}}

{{-- Jika Anda menggunakan AOS (Animate On Scroll) di halaman publik dan ingin efeknya terlihat di admin (opsional) --}}
{{-- Pastikan AOS diinisialisasi di layout admin Anda atau tambahkan script init di sini --}}
{{-- <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
  AOS.init({
      duration: 1000, // durasi animasi
      once: true // animasi hanya terjadi sekali
  });
</script> --}}
@endpush
