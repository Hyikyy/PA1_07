<!doctype html>
<html lang="en">

<head>
  @include('admin.head')
</head>

<body>
  <!--  Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full"
      data-sidebar-position="fixed" data-header-position="fixed">

    <!-- App Topstrip - DIHAPUS -->
    <!-- Sidebar Start -->
    @include('admin.sidebar')
    <!--  Sidebar End -->
    <!--  Main wrapper -->
    <div class="body-wrapper">
      <!--  Header Start -->
      @include('admin.header')
      <!--  Header End -->
<br><br>
        <!-- Konten Visi Misi -->
        <div class="container-fluid">
            <h1>Visi dan Misi</h1>

            <a href="{{ route('admin.visi_misi.create') }}" class="btn btn-primary mb-3">Tambah Visi Misi</a>

            @if(session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
            @endif

            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                           
                            <th>Visi</th>
                            <th>Misi</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($visiMisi as $item)
                            <tr>
                               
                                <td>
                                    <ol style="list-style-type: decimal; padding-left: 20px;">
                                        @php
                                            $visi = $item->visi;
                                            $visi = str_replace(["\r\n", "\r"], "\n", $visi);
                                            $visiLines = explode("\n", $visi);
                                        @endphp
                                        @foreach($visiLines as $visiLine)
                                            @php
                                                $visiLine = trim($visiLine);
                                            @endphp
                                            @if(!empty($visiLine))
                                                <li>{{ $visiLine }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </td>
                                <td>
                                    <ol style="list-style-type: decimal; padding-left: 20px;">
                                        @php
                                            $misi = $item->misi;
                                            $misi = str_replace(["\r\n", "\r"], "\n", $misi);
                                            $misiLines = explode("\n", $misi);
                                        @endphp
                                        @foreach($misiLines as $misiLine)
                                            @php
                                                $misiLine = trim($misiLine);
                                            @endphp
                                            @if(!empty($misiLine))
                                                <li>{{ $misiLine }}</li>
                                            @endif
                                        @endforeach
                                    </ol>
                                </td>
                                <td>
                                    <a href="{{ route('admin.visi_misi.show', $item->id) }}" class="btn btn-sm btn-info">Lihat</a>
                                    <a href="{{ route('admin.visi_misi.edit', $item->id) }}" class="btn btn-sm btn-warning">Edit</a>
                                    <form action="{{ route('admin.visi_misi.destroy', $item->id) }}" method="POST" style="display: inline-block;">
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
        <!-- Akhir Konten Visi Misi -->

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