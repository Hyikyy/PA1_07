<!doctype html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Detail Data Keuangan</title>
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
            <!-- Konten Keuangan -->
            <div class="container-fluid">
                <h1>Detail Data Keuangan</h1>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">Pemasukan: {{ number_format($keuangan->pemasukan, 2, ',', '.') }}</h5>
                        <p class="card-text"><strong>Pengeluaran:</strong> {{ number_format($keuangan->pengeluaran, 2, ',', '.') }}</p>
                        <p class="card-text"><strong>Saldo:</strong> {{ number_format($keuangan->saldo, 2, ',', '.') }}</p>
                        <p class="card-text"><strong>Laporan:</strong> {{ $keuangan->laporan }}</p>

                        <a href="{{ route('admin.keuangan.index') }}" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
            <!-- Akhir Konten Keuangan -->

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