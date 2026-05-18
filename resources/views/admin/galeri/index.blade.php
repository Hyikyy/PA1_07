  <!doctype html>
  <html lang="en">

  <head>
    @include('admin.head')
    <title>Daftar Galeri</title>
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
          <!-- Konten Galeri -->
          <div class="container-fluid">
              <h1>Daftar Galeri</h1>

              <a href="{{ route('admin.galeri.create') }}" class="btn btn-primary mb-3">Tambah Galeri</a>

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
                              <th>Gambar</th>
                              <th>Aksi</th>
                          </tr>
                      </thead>
                      <tbody>
                          @foreach($galeris as $galeri)
                              <tr>
                                  <td>{{ $galeri->judul }}</td>
                                  <td>
                                      <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" width="50">
                                  </td>
                                  <td>
                                      <a href="{{ route('admin.galeri.show', $galeri->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                      <a href="{{ route('admin.galeri.edit', $galeri->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                      <form action="{{ route('admin.galeri.destroy', $galeri->id) }}" method="POST" style="display: inline-block;">
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
          <!-- Akhir Konten Galeri -->

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