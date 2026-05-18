  <!doctype html>
  <html lang="en">

  <head>
    @include('admin.head')
    <title>Daftar Dosen</title>
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
        <div class="container-fluid">
          <!-- Konten Dosen -->
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Daftar Dosen</h5>
              <a href="{{ route('admin.dosens.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>

              @if ($message = Session::get('success'))
                <div class="alert alert-success">
                  <p>{{ $message }}</p>
                </div>
              @endif

              <div class="table-responsive">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama</th>
                      <th>Nama Jabatan</th>
                      <th>Gambar</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($dosens as $dosen)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $dosen->nama }}</td>
                        <td>{{ $dosen->nama_jabatan }}</td>
                        <td>
                          @if ($dosen->gambar)
                            <img src="{{ asset('storage/images/' . $dosen->gambar) }}" alt="{{ $dosen->nama }}" width="100">
                          @else
                            Tidak Ada Gambar
                          @endif
                        </td>
                        <td>
                          <a href="{{ route('admin.dosens.edit', $dosen->id) }}" class="btn btn-sm btn-warning">Edit</a>
                          <form action="{{ route('admin.dosens.destroy', $dosen->id) }}" method="POST" style="display: inline-block;">
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
          </div>
          <!-- Akhir Konten Dosen -->
        </div>
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