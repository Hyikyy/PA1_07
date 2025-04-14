@extends('layouts.app')

@section('title', 'Halaman Utama HIMATIF')
@section('description', 'Deskripsi halaman utama HIMATIF')
@section('keywords', 'himatif, itdel, teknologi informasi')

@section('content')

    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">
           <!-- About Section -->
    <section id="about" class="about section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>About Us<br></h2>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="row gy-4">

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="service-item  position-relative">
                <div class="icon">
                  <i class="bi bi-pen"></i>
                </div>
                <h3>Sejarah</h3>
                <p>Program Studi Teknologi Informasi Diploma Tiga adalah salah satu dari 3 (tiga)
                  program studi yang dikelola oleh Institut Teknologi Del (IT Del) yang berdiri pada
                  tahun 2001 sesuai SK No. 222/D/O/2001 tertanggal 28 September 2001 dengan nama Program Studi
                  Teknologi Informasi. Program studi ini berlokasi di Jl.</p>
                <a href="{{ route('sejarah') }}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-eye"></i>
                </div>
                <h3>Visi & Misi</h3>
                <p>Program Studi Teknologi Informasi Diploma Tiga adalah salah satu dari 3 (tiga)
                  program studi yang dikelola oleh Institut Teknologi Del (IT Del) yang berdiri pada
                  tahun 2001 sesuai SK No. 222/D/O/2001 tertanggal 28 September 2001 dengan nama Program Studi
                  Teknologi Informasi. Program studi ini berlokasi di Jl.
                </p>
                <a href="{{ route('visi_misi') }}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-person"></i>
                </div>
                <h3>Nama Dosen</h3>
                <p>Ut excepturi voluptatem nisi sed. Quidem fuga consequatur. Minus ea aut. Vel qui id voluptas adipisci eos earum corrupti.</p>
                <a href="{{ route('daftar_dosen') }}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="400">
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-people"></i>
                </div>
                <h3>Nama TA</h3>
                <p>Non et temporibus minus omnis sed dolor esse consequatur. Cupiditate sed error ea fuga sit provident adipisci neque.</p>
                <a href="{{ route('daftar_TA') }}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="500">
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-card-list"></i>
                </div>
                <h3>Daftar Alumni</h3>
                <p>Cumque et suscipit saepe. Est maiores autem enim facilis ut aut ipsam corporis aut. Sed animi at autem alias eius labore.</p>
                <a href="{{ route('daftar_alumni') }}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="600">
              <div class="service-item position-relative">
                <div class="icon">
                  <i class="bi bi-chat-square-text"></i>
                </div>
                <h3>Apa Kata alumni</h3>
                <p>Hic molestias ea quibusdam eos. Fugiat enim doloremque aut neque non et debitis iure. Corrupti recusandae ducimus enim.</p>
                <a href="{{ route('apa_kata_alumni') }}" class="readmore stretched-link">Read more <i class="bi bi-arrow-right"></i></a>
              </div>
            </div><!-- End Service Item -->

          </div>

        </div>

      </section><!-- /About Section -->

    </section><!-- /Hero Section -->

