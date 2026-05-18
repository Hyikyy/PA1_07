<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Detail Galeri</title>
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

            <!-- Konten Detail Galeri -->
            <div class="container-fluid">
                <h1>Detail Galeri</h1>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{ $galeri->judul }}</h5>
                        <img src="{{ asset('storage/' . $galeri->gambar) }}" alt="{{ $galeri->judul }}" width="200">
                        <br><br>  <!-- Spasi tambahan -->
                        <a href="{{ route('admin.galeri.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- Akhir Konten Detail Galeri -->

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