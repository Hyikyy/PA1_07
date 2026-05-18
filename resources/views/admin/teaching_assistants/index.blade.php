<!doctype html>
<html lang="en">

<head>
  @include('admin.head')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">

    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.header')
      <!--  Header End -->
<br><br>
        <!-- Konten Asisten Dosen -->
        <div class="container-fluid">
            <h1>Daftar Asisten Dosen</h1>

            <a href="{{ route('admin.teaching_assistants.create') }}" class="btn btn-primary mb-3">Tambah Asisten Dosen</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Jabatan</th>
                            <th>Gambar</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachingAssistants as $teachingAssistant)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $teachingAssistant->nama }}</td>
                                <td>{{ $teachingAssistant->nama_jabatan }}</td>
                                <td>
                                    @if($teachingAssistant->gambar)
                                        <img src="{{ asset('storage/teaching_assistants/' . $teachingAssistant->gambar) }}" alt="{{ $teachingAssistant->nama }}" width="50">
                                    @else
                                        Tidak ada gambar
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.teaching_assistants.edit', $teachingAssistant->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.teaching_assistants.destroy', $teachingAssistant->id) }}" method="POST" style="display: inline-block;">
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
        <!-- Akhir Konten Asisten Dosen -->

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