@extends('layouts.app')

@section('title', '📸 Jelajahi Indahnya Dunia Informatika | Galeri HIMATIF')
@section('description', 'Galeri Foto HIMATIF: Abadikan momen-momen seru dan inspiratif dari kegiatan kami.')
@section('keywords', 'galeri, foto, himatif, kegiatan, informatika')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Galeri</h2>
          <ol>
            <li><a href="{{ route('welcome') }}">Beranda</a></li>
            <li>Galeri</li>
          </ol>
        </div>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Galeri Section ======= -->
    <section id="galeri" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 class="text-center fw-bold" style="color: black;">Jejak Digital HIMATIF: Galeri Kegiatan Kami</h2>
          <p class="text-center">Telusuri berbagai momen berharga yang telah kami ukir dalam setiap langkah.</p>
        </div>

        <div class="row gy-4">

          @foreach($galeris as $galeri)
            <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100"> <!-- Hapus d-flex dan align-items-stretch -->
              <div class="member">
                <div class="image-container">
                  @if($galeri->gambar)
                    <img src="{{ asset('storage/' . $galeri->gambar) }}" class="img-fluid galeri-image" alt="{{ $galeri->judul }}">
                  @else
                    <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid galeri-image" alt="Default Image">
                  @endif
                </div>
                <h4 style="color: black;">{{ $galeri->judul }}</h4>
              </div>
            </div><!-- End Galeri Item -->
          @endforeach

        </div>

      </div>
    </section><!-- End Galeri Section -->

  </main><!-- End #main -->

  <style>
    /* Style untuk Card foto*/
    .member {
      border-radius: 10px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
      overflow: hidden; 
      border: 1px solid #ddd; /*tampilan lebih rapi*/
      display: flex; 
      flex-direction: column; /* Atur elemen secara vertikal */
      height: auto; /* tinggi menyesuaikan konten */
    }

    /* Style untuk Pembungkus Gambar */
    .member .image-container {
      width: 100%; 
      display: flex; 
      align-items: center; 
      justify-content: center; 
    }

    /* Style untuk Gambar */
    .member .image-container img.galeri-image {
      max-width: 100%; /* Gambar tidak melebihi lebar container */
      max-height: 400px; 
      object-fit: contain; 
      display: block; 
    }

    /* Style Judul */
    .member h4 {
      padding: 10px;
      margin-top: 10px;
      text-align: center;
    }

    /* Responsive design untuk gambar potret */
    @media (max-width: 768px) {
      .member .image-container img.galeri-image {
        max-height: 300px; /* Tinggi maksimum lebih kecil di mobile */
      }
    }
  </style>

@endsection