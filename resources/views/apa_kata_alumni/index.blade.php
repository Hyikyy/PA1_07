@extends('layouts.app')

@section('title', 'Apa Kata Alumni | Website Kami')
@section('description', 'Testimoni dan pesan dari alumni-alumni terbaik kami.')
@section('keywords', 'alumni, testimoni, apa kata alumni, pesan alumni')

@section('content')

<style>
    /* --- STYLE DASAR --- */
    .chat-item {
        background-color: #444544; /* Warna pesan WA */
        border-radius: 10px;
        padding: 20px; /* Tambah padding di dalam pesan */
        margin-bottom: 20px; /* Tambah spasi antar pesan */
        position: relative; /* Untuk style pseudo-element */
        box-shadow: 0 1px 1px rgba(0, 0, 0, 0.1);
        word-wrap: break-word; /* Agar teks panjang tidak keluar container */
        display: flex;
        align-items: flex-start; /* Agar avatar dan konten sejajar dari atas */
    }

    .chat-item:before {
        content: '';
        position: absolute;
        width: 0;
        height: 0;
        bottom: 0;
        left: -12px; /* Letakkan di luar container */
        border-style: solid;
        border-width: 12px 12px 0 0;
        border-color: #444544 transparent transparent transparent; /* Warna segitiga sama dengan background pesan */
        transform: rotate(270deg);
    }

    .chat-avatar {
        width: 70px; /* Perbesar ukuran avatar */
        height: 70px; /* Perbesar ukuran avatar */
        border-radius: 50%;
        overflow: hidden;
        margin-right: 15px; /* Tambah jarak avatar dan konten */
    }

    .chat-avatar img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }

    .chat-bubble {
        flex-grow: 1; /* Agar bubble menggunakan sisa ruang */
    }

    .chat-bubble h4 {
        font-size: 18px; /* Perbesar ukuran nama */
        font-weight: bold;
        color: #fff; /* Nama Putih */
        margin-bottom: 8px; /* Tambah spasi bawah nama */
    }

    .chat-bubble span {
        font-size: 13px; /* Perbesar ukuran angkatan */
        color: #ffffff; /* Putih */
        margin-bottom: 12px; /* Tambah spasi bawah angkatan */
        display: block; /* Agar span berada di baris baru */
    }

    .chat-message p {
        margin-bottom: 8px; /* Tambah spasi bawah setiap paragraf */
        font-size: 15px; /* Perbesar ukuran teks pesan */
        line-height: 1.6; /* Atur line height agar teks lebih mudah dibaca */
        color: #fff; /* Putih */
    }

    .chat-message p b {
        color: #fff; /* Putih */
    }

    .chat-read-more {
        display: inline-block;
        padding: 10px 15px; /* Perbesar ukuran tombol */
        background-color: #007bff;
        color: #fff;
        text-decoration: none;
        border-radius: 5px;
        font-size: 14px; /* Perbesar ukuran teks tombol */
        transition: background-color 0.3s;
    }

    .chat-read-more:hover {
        background-color: #0056b3;
    }

    /*Style untuk Section header agar center*/
    .section-header {
        text-align: center;
        margin-bottom: 40px; /* Tambah spasi bawah header */
    }

    .section-header h2 {
        font-size: 28px; /* Perbesar ukuran judul header */
        font-weight: bold;
        color: #333;
    }

    .section-header p {
        font-size: 17px; /* Perbesar ukuran deskripsi header */
        color: #555;
    }

    /* RESPONSIVE */
    @media (max-width: 768px) {
        .col-xl-4 {
            width: 100%; /* Full width di layar kecil */
        }

        .chat-avatar {
            width: 60px;
            height: 60px;
            margin-right: 10px;
        }

        .chat-bubble h4 {
            font-size: 16px;
        }

        .chat-bubble span {
            font-size: 12px;
        }

        .chat-message p {
            font-size: 14px;
        }

    }
</style>

<main id="main" style="padding-top: 80px; padding-bottom: 50px;">
    <!-- ======= Apa Kata Alumni Section ======= -->
    <section id="ApaKataAlumni" class="team apa-kata-alumni-chat">
        <div class="container" data-aos="fade-up">

            <div class="section-header">
                <h2 class="text-center">Pesan dan Testimoni Alumni</h2>
                <p class="text-center">Inspirasi dari alumni-alumni hebat kami.</p>
            </div>

            {{-- Menggunakan class .row untuk membungkus semua chat item --}}
            <div class="row gy-4"> {{-- gy-4 untuk gutter vertikal antar baris --}}
                @foreach($apaKataAlumni as $alumni)
                {{-- Setiap item chat akan mengambil setengah lebar di layar medium ke atas (col-md-6) --}}
                {{-- Di layar kecil (di bawah medium), akan mengambil lebar penuh (1 kolom) --}}
                <div class="col-lg-6 col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <div class="chat-item">
                        {{-- Hapus class 'member' jika hanya ingin styling chat --}}
                        <div class="chat-avatar">
                            @if($alumni->gambar)
                            <img src="{{ asset('storage/apa_kata_alumni/' . $alumni->gambar) }}" class="img-fluid" alt="{{ $alumni->nama }}">
                            @else
                            <img src="{{ asset('assets/img/no-image.png') }}" class="img-fluid" alt="Default Image">
                            @endif
                        </div>
                        <div class="chat-bubble">
                            <h4 class="alumni-name">{{ $alumni->nama }}</h4>
                            <span class="alumni-meta">Angkatan: {{ $alumni->angkatan }}</span>
                            <div class="chat-message">
                                <p><b>Pekerjaan:</b> {{ $alumni->pekerjaan }}</p>
                                <p class="main-testimonial-text"><b>Pesan: </b>{{ Str::limit($alumni->isi, 180) }}</p>
                                {{-- Sedikit dikurangi limitnya untuk layout 2 kolom --}}
                            </div>
                            <a href="{{ route('apa_kata_alumni.show', $alumni->id) }}" class="chat-read-more">Lihat Selengkapnya</a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Apa Kata Alumni Section -->

</main><!-- End #main -->

@endsection