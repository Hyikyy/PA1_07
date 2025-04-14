@extends('layouts.admin') {{-- Sesuaikan dengan layout admin Anda --}}

@section('title', 'Manajemen Galeri')

@section('content')
<div class="container-fluid">
    <h1>Manajemen Galeri</h1>
    <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">
        <br><br>
        <i class="fas fa-plus me-1"></i> Tambah Item Galeri Baru
    </a>

    {{-- Tampilkan Pesan Sukses --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Daftar Item Galeri</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Gambar</th>
                            <th>Judul</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($galeriItems as $item)
                            <tr>
                                <td>
                                    @if($item->gambar)
                                        <img src="{{ asset('storage/' . $item->gambar) }}" alt="{{ $item->judul }}" style="max-height: 60px;">
                                    @else
                                        (Tidak ada gambar)
                                    @endif
                                </td>
                                <td>{{ $item->judul }}</td>
                                <td>{{ $item->kategori }}</td>
                                <td>
                                    <a href="{{ route('admin.galeri.edit', $item->id) }}" class="btn btn-sm btn-warning me-1" title="Edit">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    {{-- Tombol Hapus dengan Konfirmasi --}}
                                    <button type="button" class="btn btn-sm btn-danger" title="Hapus"
                                            onclick="if(confirm('Apakah Anda yakin ingin menghapus item ini?')) { document.getElementById('delete-form-{{ $item->id }}').submit(); }">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                    <form id="delete-form-{{ $item->id }}" action="{{ route('admin.galeri.destroy', $item->id) }}" method="POST" style="display: none;">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Belum ada item galeri.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
             {{-- Tampilkan Link Paginasi --}}
             <div class="d-flex justify-content-center">
                {{ $galeriItems->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Jika menggunakan datatables, tambahkan scriptnya di push script --}}
