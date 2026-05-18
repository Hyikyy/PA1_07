<!doctype html>
<html lang="en">

<head>
    @include('admin.head')
    <title>Tambah Data Keuangan</title>
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
                <h1>Tambah Data Keuangan</h1>

                <div class="card">
                    <div class="card-body">
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        <form action="{{ route('admin.keuangan.store') }}" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label for="pemasukan" class="form-label">Pemasukan</label>
                                <input type="number" class="form-control" id="pemasukan" name="pemasukan"
                                    value="{{ old('pemasukan') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="pengeluaran" class="form-label">Pengeluaran</label>
                                <input type="number" class="form-control" id="pengeluaran" name="pengeluaran"
                                    value="{{ old('pengeluaran') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="saldo" class="form-label">Saldo</label>
                                <input type="number" class="form-control" id="saldo" name="saldo"
                                    value="{{ old('saldo') }}" required>
                            </div>

                            <div class="mb-3">
                                <label for="laporan" class="form-label">Laporan</label>
                                <textarea class="form-control" id="laporan" name="laporan" rows="3">{{ old('laporan') }}</textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                            <a href="{{ route('admin.keuangan.index') }}" class="btn btn-secondary">Batal</a>
                        </form>
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