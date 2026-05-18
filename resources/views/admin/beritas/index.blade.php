<!doctype html>
<html lang="en">

<head>
  @include('admin.head')
  <title>Daftar Berita</title>
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">

      <!--  App Topstrip - DIHAPUS -->
    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.header')
      <!--  Header End -->
<br><br>
        <!-- Konten Berita -->
        <div class="container-fluid">
            <h1>Daftar Berita</h1>

            <a href="{{ route('admin.beritas.create') }}" class="btn btn-primary mb-3">Tambah Berita</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Judul</th>
                            <th>Tanggal</th>
                            <th>Gambar</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($beritas as $berita)
                            <tr>
                                <td>{{ $berita->judul }}</td>
                                <td>{{ $berita->tanggal }}</td>
                                <td>
                                    @if($berita->gambar)
                                        <img src="{{ asset('storage/' . $berita->gambar) }}" alt="{{ $berita->judul }}" width="50">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>{{ $berita->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('admin.beritas.show', $berita->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="{{ route('admin.beritas.edit', $berita->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.beritas.destroy', $berita->id) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <!-- Akhir Konten Berita -->

    </div>
  </div>
  <script src="{{ asset('admin/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('admin/assets/js/sidebarmenu.js') }}"></script>
  <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>
  <script src="{{ asset('admin/assets/libs/apexcharts/dist/apexcharts.min.js') }}"></script>
  <script src="{{ asset('admin/assets/libs/simplebar/dist/simplebar.js') }}"></script>
  <script src="{{ asset('admin/assets/js/dashboard.js') }}"></script>
  <!-- solar icons -->
  <script src="https://cdn.jsdelivr.net/npm/iconify-icon@1.0.8/dist/iconify-icon.min.js"></script>
</body>

</html>