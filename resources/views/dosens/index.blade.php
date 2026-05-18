@extends('layouts.app')

@section('title', 'Daftar Dosen & Asisten Dosen | Website Kami')
@section('description', 'Daftar lengkap dosen dan asisten dosen terbaik di website kami.')
@section('keywords', 'dosen, daftar dosen, pengajar, asisten dosen')

@section('content')

  <main id="main">

    <!-- ======= Breadcrumbs ======= -->
    <div class="breadcrumbs">
      <div class="container">
        <div class="d-flex justify-content-between align-items-center">
          <h2>Daftar Dosen & Asisten Dosen</h2>
          <ol>
            <li><a href="{{ route('welcome') }}">Beranda</a></li>
            <li>Daftar Dosen & Asisten Dosen</li>
          </ol>
        </div>
      </div>
    </div><!-- End Breadcrumbs -->

    <!-- ======= Sejarah Section ======= -->
    <section id="sejarah" class="inner-page">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 class="text-center fw-bold">Sejarah HIMATIF</h2>
          <p class="text-center">Perjalanan panjang yang membentuk HIMATIF menjadi organisasi yang solid dan berprestasi.</p>
        </div>

        <!-- Gambar HIMATIF (Lingkaran) -->
        <div class="row justify-content-center">
          <div class="col-lg-4">
            <div class="text-center mb-4">
              <img src="{{ asset('assets/img/himatif/himatif.jpg') }}" alt="Logo HIMATIF" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover;">
            </div>
          </div>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-8">
            <div class="sejarah-content">
              <p>
                HIMATIF (Himpunan Mahasiswa Teknologi Informasi) Institut Teknologi Del didirikan pada tanggal [Tanggal Pendirian] dengan tujuan utama untuk menjadi wadah bagi mahasiswa Program Studi S1 Teknologi Informasi dalam mengembangkan potensi akademik, non-akademik, serta karakter kepemimpinan.
              </p>
              <p>
                Sejak awal berdirinya, HIMATIF telah berkomitmen untuk menyelenggarakan berbagai kegiatan yang positif dan bermanfaat, baik bagi anggotanya maupun bagi masyarakat luas. Kegiatan-kegiatan tersebut mencakup seminar teknologi, workshop, pelatihan soft skill, bakti sosial, serta berbagai kompetisi yang mengasah kemampuan mahasiswa di bidang IT.
              </p>
              <p>
                Dalam perjalanannya, HIMATIF terus beradaptasi dengan perkembangan zaman dan teknologi. Kami berusaha untuk selalu relevan dan inovatif dalam setiap program kerja yang kami rancang. Dukungan dari pihak program studi, dosen, alumni, serta seluruh mahasiswa IT Del menjadi pilar penting dalam setiap pencapaian HIMATIF.
              </p>
              <p>
                Kami bercita-cita untuk terus mencetak generasi penerus bangsa yang tidak hanya unggul dalam penguasaan teknologi informasi, tetapi juga memiliki integritas, etos kerja yang tinggi, dan kepedulian sosial. HIMATIF IT Del akan terus bergerak maju, berkontribusi, dan menginspirasi.
              </p>
              {{-- Tambahkan lebih banyak paragraf atau poin sejarah sesuai kebutuhan --}}
            </div>
          </div>
        </div>

      </div>
    </section><!-- End Sejarah Section -->

    <!-- ======= Dosen Section ======= -->
    <section id="Dosen" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 class="text-center fw-bold">Dosen Pengajar HIMATIF</h2>
          <p class="text-center">Kenali dosen-dosen berdedikasi yang membimbing HIMATIF.</p>
        </div>

        <div class="row">
          @foreach($dosens as $dosen)
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  @if($dosen->gambar)
                    <img src="{{ asset('storage/images/' . $dosen->gambar) }}" class="img-fluid" alt="{{ $dosen->nama }}">
                  @else
                    <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" alt="Default Image">
                  @endif
                </div>
                <h4 style="color: black;">{{ $dosen->nama }}</h4>
                <span>{{ $dosen->nama_jabatan }}</span>
                <p>{{ Str::limit($dosen->deskripsi_jabatan, 50) }}</p>
                <a href="{{ route('dosen.show', $dosen->id) }}" class="btn btn-primary">Lihat Detail</a>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Dosen Section -->

     <!-- ======= Asisten Dosen Section ======= -->
    <section id="AsistenDosen" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 class="text-center fw-bold">Teaching Assistant</h2>
          <p class="text-center">Para asisten dosen yang membantu kelancaran kegiatan akademik.</p>
        </div>

        <div class="row">
          @foreach($teachingAssistants as $assistant)
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  @if($assistant->gambar)
                    <img src="{{ asset('storage/teaching_assistants/' . $assistant->gambar) }}" class="img-fluid" alt="{{ $assistant->nama }}">
                  @else
                    <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" alt="Default Image">
                  @endif
                </div>
                <h4 style="color: black;">{{ $assistant->nama }}</h4>
                <span>{{ $assistant->nama_jabatan }}</span>
                <p>{{ Str::limit($assistant->deskripsi_jabatan, 50) }}</p>
                <a href="{{ route('asisten.show', $assistant->id) }}" class="btn btn-primary">Lihat Detail</a>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Asisten Dosen Section -->

    <!-- ======= Alumni Section ======= -->
    <section id="Alumni" class="team">
      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2 class="text-center fw-bold">Alumni HIMATIF</h2>
          <p class="text-center">Alumni-alumni berprestasi dari HIMATIF.</p>
        </div>

        <div class="row">
          @foreach($alumnis as $alumni)
            <div class="col-xl-3 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
              <div class="member">
                <div class="member-img">
                  @if($alumni->gambar)
                    <img src="{{ asset('storage/' . $alumni->gambar) }}" class="img-fluid" alt="{{ $alumni->nama }}">
                  @else
                    <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" alt="Default Image">
                  @endif
                </div>
                <h4 style="color: black;">{{ $alumni->nama }}</h4>
                <span>{{ $alumni->nama_cantik }}</span>
                <p>{{ Str::limit($alumni->deskripsi, 50) }}</p>
                <a href="{{ route('alumni.show', $alumni->id) }}" class="btn btn-primary">Lihat Detail</a>
              </div>
            </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Alumni Section -->

  </main><!-- End #main -->
  <style>
    .sejarah-content p {
      text-align: justify; /* Membuat teks rata kanan-kiri */
      margin-bottom: 15px; /* Menambah jarak antar paragraf */
      line-height: 1.6; /* Meningkatkan keterbacaan dengan mengatur tinggi baris */
      font-size: 1rem; /* Ukuran font yang diubah */
    }
  </style>

@endsection