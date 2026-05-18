<!doctype html>
<html lang="en">

<head>
  @include('admin.head')
  <title>Daftar Agenda</title>
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
    <div class  ="body-wrapper">
      <!--  Header Start -->
      @include('admin.header')
      <!--  Header End -->
<br><br>
        <!-- Konten Agenda -->
        <div class="container-fluid">
            <h1>Daftar Agenda</h1>

            <a href="{{ route('admin.agendas.create') }}" class="btn btn-primary mb-3">Tambah Agenda</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Nama Kegiatan</th>
                            <th>Tanggal Kegiatan</th>
                            <th>Deskripsi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($agendas as $agenda)
                            <tr>
                                <td>{{ $agenda->nama_kegiatan }}</td>
                                <td>{{ $agenda->tanggal_kegiatan }}</td>
                                <td>{{ $agenda->deskripsi }}</td>
                                <td>
                                    <a href="{{ route('admin.agendas.show', $agenda->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="{{ route('admin.agendas.edit', $agenda->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.agendas.destroy', $agenda->id) }}" method="POST" style="display: inline-block;">
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
        <!-- Akhir Konten Agenda -->

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