@extends('layouts.app')

@section('title', 'Visi dan Misi')
@section('description', 'Visi dan Misi HIMATIF')
@section('keywords', 'visi, misi, himatif')

@section('content')

    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <div class="breadcrumbs">
            <div class="container">
                <div class="d-flex justify-content-between align-items-center">
                    <h2>Visi dan Misi</h2>
                    <ol>
                        <li><a href="{{ route('welcome') }}">Beranda</a></li>
                        <li>Visi dan Misi</li>
                    </ol>
                </div>
            </div>
        </div><!-- End Breadcrumbs -->

        <!-- ======= Visi Misi Section ======= -->
        <section id="visi-misi" class="team">
            <div class="container" data-aos="fade-up">

                <div class="section-header">
                    <h2 class="text-center fw-bold" style="color: black;">Visi dan Misi HIMATIF</h2>  <!-- Tambahkan fw-bold dan style -->
                    <p class="text-center">Berikut adalah visi dan misi Himpunan Mahasiswa Teknologi Informasi.</p>
                </div>

                <div class="row">
                    <div class="col-md-12" data-aos="fade-up" data-aos-delay="100">
                        <div class="card" style="border: 1px solid #343a40;">  <!-- Tambahkan style border -->
                            <div class="card-body">
                                <h5 class="card-title">Visi</h5>
                                @if(count($visiMisi) > 0)
                                    <ol style="list-style-type: decimal; padding-left: 20px;">
                                        @php
                                            $visi = $visiMisi[0]->visi;
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
                                @else
                                    Belum ada visi yang ditetapkan.
                                @endif

                                <hr>  <!-- Garis pemisah -->

                                <h5 class="card-title">Misi</h5>
                                <ol style="list-style-type: decimal; padding-left: 20px;">
                                    @if(count($visiMisi) > 0)
                                        @php
                                            $misi = $visiMisi[0]->misi;
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
                                    @else
                                        Belum ada misi yang ditetapkan.
                                    @endif
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Visi Misi Section -->

    </main><!-- End #main -->

@endsection