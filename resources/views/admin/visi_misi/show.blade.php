<!doctype html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Detail Visi Misi</title>
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
            <h1>Detail Visi & Misi</h1>

            <div class="card">
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Visi:</strong>
                        <ol style="list-style-type: decimal; padding-left: 20px;">
                            @php
                                $visi = $visiMisi->visi;
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
                    </div>

                    <div class="mb-3">
                        <strong>Misi:</strong>
                        <ol style="list-style-type: decimal; padding-left: 20px;">
                            @php
                                $misi = $visiMisi->misi;
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
                    </div>

                    <a href="{{ route('admin.visi_misi.index') }}" class="btn btn-secondary">Kembali</a>
                </div>
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