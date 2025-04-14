@extends('layouts.admin')

@section('title', 'Halaman Utama HIMATIF')
@section('description', 'Deskripsi halaman utama HIMATIF')
@section('keywords', 'himatif, itdel, teknologi informasi')

@section('content')
    <!-- Hero Section -->
    <section id="hero" class="hero section accent-background">

      <div class="container position-relative" data-aos="fade-up" data-aos-delay="100">
        <div class="row gy-5 justify-content-between">
          <div class="col-lg-6 order-2 order-lg-1 d-flex flex-column justify-content-center">
            <h2><span>Welcome to </span><span class="accent">HIMATIF</span></h2>
            <p>Sekilas Tentang Himpunan Mahasiswa Teknologi Informasi
                HIMATIF merupakan bagian dari organisasi kampus yang menjalankan peran
                serta tanggung jawabnya, dengan maksud untuk menggali, mengoptimalkan,
                dan mengembangkan sumber daya mahasiswa yang tersedia.
                Ini bertujuan agar mereka dapat memenuhi peran dan fungsinya sebagai mahasiswa</p>
            <div class="d-flex">
              <a href="#about" class="btn-get-started">Get Started</a>
            </div>
          </div>
          <div class="col-lg-5 order-1 order-lg-2">
            <img src="{{ asset('assets/img/himatif/himatif.jpg') }}" class="img-fluid" alt="">
          </div>
        </div>
      </div>

           <!-- Kalender Section -->
    <section id="calendar" class="calendar section">
        <div class="container">
            <div class="section-title" data-aos="fade-up">
                <h2>Kalender Kegiatan HIMATIF</h2>
                <p>Jadwal kegiatan dan acara terbaru dari HIMATIF.</p>
            </div>
            <div class="calendar-container" data-aos="fade-up" data-aos-delay="200">
                <div class="calendar-header">
                    <button id="prev-month" class="calendar-nav"><</button>
                    <h3 id="current-month-year" class="calendar-nav"></h3>
                    <a href ="#"></a>
                    <button id="next-month" class="calendar-nav">></button>
                </div>
                <table id="calendar-table">
                    <thead>
                        <tr>
                            <th>Min</th>
                            <th>Sen</th>
                            <th>Sel</th>
                            <th>Rab</th>
                            <th>Kam</th>
                            <th>Jum</th>
                            <th>Sab</th>
                        </tr>
                    </thead>
                    <tbody id="calendar-body">
                    </tbody>
                </table>
            </div>
        </div>
    </section>
    <!-- /Kalender Section -->
    @push('scripts')
    <script src="{{ asset('assets/js/calendar.js') }}"></script>
    @endpush

    <section id="about" class="about section">
    <!-- ... kode About Section Anda ... -->


    <!-- About Section -->
    <section id="about" class="about section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>About Us<br></h2>
        <p>Kepengurusan Himatif Pada Tahun 2024/2025</p>

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

    @include('partials._struktur_section', ['anggotas' => $anggotas])

      <!-- Galeri Section -->
    <section id="galeri" class="galeri section">

        <!-- Section Title -->
        <div class="container section-title" data-aos="fade-up">
          <h2>Galeri</h2>
        </div><!-- End Section Title -->

        <div class="container">

          <div class="isotope-layout" data-default-filter="*" data-layout="masonry" data-sort="original-order">

            <ul class="galeri-filters isotope-filters" data-aos="fade-up" data-aos-delay="100">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-graduation">Graduation</li>
              <li data-filter=".filter-kaderisasi">Kaderisasi</li>
              <li data-filter=".filter-welpart">Welcoming Party</li>
              <li data-filter=".filter-bukber">Bukber</li>
              <li data-filter=".filter-nobar">Nobar</li>
            </ul><!-- End galeri Filters -->

            <div class="row gy-4 isotope-container" data-aos="fade-up" data-aos-delay="200">

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-graduation">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/grad_21.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/grad_21.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Graduation Angkatan 2021</a></h4>
                    <p>A sweet end to a long endeavor. This is the beginning of a new journey that is more challenging and full of blessings. May your knowledge and experience continue to inspire many people.
                        Continue to shine in the new world that awaits you!</p>
                  </div>
                </div>
              </div><!-- Endgaleri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-kaderisasi">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/kaderisasi_24.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/kaderisasi_24.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Kaderisasi Angkatan 2024</a></h4>
                    <p>Kaderisasi adalah kegiatan berharga untuk mempererat solidaritas, menumbuhkan semangat kolaborasi, serta mengenalkan budaya dan nilai-nilai kebersamaan dalam keluarga besar Himpunan Mahasiswa Teknologi Informasi.</p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-bukber">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/bukber_24.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/bukber_24.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Bukber Tahun 2024</a></h4>
                    <p>Keseruan, kebersamaan, dan kehangatan terasa di BUKBER HIMATIF 2025! Acara ini sukses mempererat silaturahmi, berbagi cerita, dan menikmati hidangan bersama.
                        Terima kasih untuk semua yang telah hadir dan membuat momen ini begitu berkesan!</p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-welpart">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/welpart_24.JPG') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/welpart_24.JPG') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Welcoming Party 2024</a></h4>
                    <p>Semoga setiap momen yang terukir menjadi kenangan berharga, mempererat solidaritas, dan menumbuhkan semangat kolaborasi di Himpunan Mahasiswa Teknologi Informasi.
                        Bersiaplah untuk melangkah lebih jauh, belajar bersama, dan tumbuh sebagai satu kesatuan.</p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-nobar">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/nobar_24.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/nobar_24.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Nobar 2024</a></h4>
                    <p>HIMATIF baru saja melaksanakan kegiatan Screen Together!
                        Acara nonton bareng ini menjadi momen seru untuk berkumpul, berbagi tawa, dan menikmati film Extreme Job bersama-sama.
                        Terima kasih kepada semua yang sudah hadir dan membuat acara ini semakin meriah! </p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-graduation">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/portfolio/product-2.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/portfolio/product-2.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Graduation Angkatan 2020</a></h4>
                    <p>Lorem ipsum, dolor sit amet consectetur</p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-kaderisasi">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/kaderisasi 2023.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/kaderisasi 2023.jpg') }}"class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Kaderisasi Angkatan 2023</a></h4>
                    <p>Semoga ilmu dan karakter yang dibangun dapat menjadikan pemimpin yang hebat dimasa depan nanti dan dapat berguna,
                        tetap semangat untuk semua Mahasiswa D3 Teknologi Informasi 2023</p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-welpart">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/welpart_23.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/welpart_23.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Welcoming Party 2023</a></h4>
                    <p>Suasana penuh keceriaan dan persahabatan meriah di Welcoming Party Angkatan 21, 22, 23! Mari bersama-sama merayakan awal perjalanan bersama, menciptakan kenangan indah, dan mengukir kisah tak terlupakan.</p>
                  </div>
                </div>
              </div><!-- End galeri Item -->

              <div class="col-lg-4 col-md-6 galeri-item isotope-item filter-nobar">
                <div class="galeri-content h-100">
                  <a href="{{ asset('assets/img/himatif/nobar_23.jpg') }}" data-gallery="galeri-gallery-app" class="glightbox"><img src="{{ asset('assets/img/himatif/nobar_23.jpg') }}" class="img-fluid" alt=""></a>
                  <div class="galeri-info">
                    <h4><a href="galeri-details.html" title="More Details">Nobar 2023</a></h4>
                    <p>onton bareng HIMATIF bukan cuma soal film, tapi soal momen-momen kebersamaan yang nggak terlupakan.
                        Setiap momen itu bikin kita semakin akrab dan ga sabar nungguin buat nonton bareng lagi!</p>
                  </div>
                </div>
              </div><!-- End Portfolio Item -->



            </div><!-- End galeri Container -->

          </div>

        </div>

    </section><!-- /Galeri Section -->




    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section">

      <!-- Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 40
                },
                "1200": {
                  "slidesPerView": 3,
                  "spaceBetween": 10
                }
              }
            }
          </script>
        </div>
      </div>

    </section><!-- /Testimonials Section -->


    <!-- Recent Posts Section -->
    <section id="recent-posts" class="recent-posts section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Recent Blog Posts</h2>
      </div><!-- End Section Title -->

      <div class="row gy-4">

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
          <article>

            <div class="post-img">
              <img src="assets\img\himatif\bukber_24.jpg"alt="" class="img-fluid">
            </div>

            <p class="post-category">Buka Bareng</p>

            <h2 class="title">
              <a href="blog-details.html">Buka Puasa Bersama D3 Teknologi Informasi! </a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">11 Maret, 2025</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
          <article>

            <div class="post-img">
              <img src="assets\img\himatif\welpart_24.JPG" alt="" class="img-fluid">
            </div>

            <p class="post-category">Welcoming Party</p>

            <h2 class="title">
              <a href="blog-details.html">Welcoming Party D3 Teknologi Informasi! </a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01">1 Februari, 2025</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

        <div class="col-xl-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
          <article>

            <div class="post-img">
              <img src="assets\img\himatif\nobar_24.jpg"" alt="" class="img-fluid">
            </div>

            <p class="post-category">Screen Together</p>

            <h2 class="title">
              <a href="blog-details.html">Screen Together D3 Teknologi Informasi!</a>
            </h2>

            <div class="d-flex align-items-center">
              <div class="post-meta">
                <p class="post-date">
                  <time datetime="2022-01-01"> 6 Desember, 2024</time>
                </p>
              </div>
            </div>

          </article>
        </div><!-- End post list item -->

      </div><!-- End recent posts list -->

    </div>

    </section><!-- /Recent Posts Section -->
    </section>
