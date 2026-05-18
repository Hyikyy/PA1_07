@extends('layouts.app')

@section('title', 'Struktur Organisasi')
@section('description', 'Struktur Organisasi HIMATIF')
@section('keywords', 'struktur, organisasi, himatif')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Struktur Organisasi</h2>
          <ol>
            <li><a href="{{ route('welcome') }}">Beranda</a></li>
            <li>Struktur Organisasi</li>
          </ol>
        </div>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Struktur Organisasi Section ======= -->
    <section id="struktur-organisasi" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 class="text-center fw-bold" style="color: black;">Struktur Organisasi HIMATIF</h2>
          <p class="text-center">Berikut adalah struktur organisasi Himpunan Mahasiswa Teknik Informatika. Setiap anggota memiliki peran penting dalam menjalankan roda organisasi dan mencapai tujuan bersama.</p>
        </div>

        <div class="row gy-4">

          @foreach($strukturOrganisasi as $item)
            <div class="col-xl-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
              <div class="member" style="background-color: #2b2b2b; color: white;">
                @if($item->gambar)
                  <img src="{{ asset('storage/struktur_organisasi/' . $item->gambar) }}" class="img-fluid" alt="{{ $item->nama_anggota }}">
                @else
                  <img src="{{ asset('assets/img/team/team-1.jpg') }}" class="img-fluid" alt="Default Image">
                @endif
                <h4 style="color: white;">{{ $item->nama_anggota }}</h4>
                <span style="color: white;">{{ $item->nama_jabatan }}</span>
                <p style="color: white;">
                  {{ $item->deskripsi_jabatan }}
                </p>
                <div class="social">
                  <a href="#"><i class="bi bi-twitter" style="color: #1DA1F2;"></i></a>
                  <a href="#"><i class="bi bi-facebook" style="color: #1877F2;"></i></a>
                  <a href="#"><i class="bi bi-instagram" style="color: #E4405F;"></i></a>
                  <a href="#"><i class="bi bi-linkedin" style="color: #0A66C2;"></i></a>
                </div>
              </div>
            </div><!-- End Team Member -->
          @endforeach

        </div>

      </div>
    </section><!-- End Struktur Organisasi Section -->

  </main><!-- End #main -->

@endsection