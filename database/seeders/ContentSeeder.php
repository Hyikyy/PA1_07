<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Content;

class ContentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
            Content::updateOrCreate(
            ['slug' => 'sejarah'], // Cari berdasarkan slug
            [
                'title' => 'Sejarah',
                'body' => "Program Studi Teknologi Informasi Diploma Tiga adalah salah satu dari 3 (tiga) program studi yang dikelola oleh Institut Teknologi Del (IT Del) yang berdiri pada tahun 2001 sesuai SK No. 222/D/O/2001 tertanggal 28 September 2001 dengan nama Program Studi Teknologi Informasi. Program studi ini berlokasi di Jl. Sisingamangaraja, Desa Sitoluama, Kecamatan Laguboti, Toba Samosir, Propinsi Sumatera Utara berjarak kurang lebih 200 km (lima jam perjalanan mobil) dari Medan sebagai Ibukota Propinsi Sumatera Utara. Desa Sitoluama adalah suatu desa kecil yang berada di tepi Danau Toba dan dilalui oleh jalan raya lintas propinsi dan berjarak sekitar 10 KM dari Balige sebagai ibukota Kabupaten Tobasa.\n\nProgram Studi Teknologi Informasi Diploma Tiga mempunyai sasaran untuk menyelenggarakan proses pembelajaran yang dapat menumbuhkan-kembangkan daya nalar, daya cipta, daya kreasi dan keterampilan yang tinggi, yang dapat dikomunikasikan dan diaplikasikan pada bidang kehidupan. Prodi ini memperoleh perpanjangan ijin penyelenggaraan Program Studi Teknologi Informasi Diploma Tiga (10802) sesuai dengan SK Direktur Jenderal Pendidikan Tinggi Nomor 3649/D/T/2004 tertanggal 9 September 2004. Kemudian pada tanggal 11 Oktober 2007 memperoleh SK perpanjangan ulang No. 3169/D/T/2007 dengan sebutan nama program studi adalah Program Studi Teknologi Informasi Diploma Tiga. Kemudian pada tanggal 3 Mei 2010 memperoleh SK perpanjangan ulang No. 1854/D/T/K-I/2010 dengan sebutan nama program studi kembali menjadi Program Studi Teknologi Informasi Diploma Tiga."
                // Salin teks sejarah dari gambar Anda ke sini.
                // Gunakan \n\n untuk menandakan paragraf baru.
            ]
        );

        // Anda bisa tambahkan Visi & Misi di sini juga
        // Content::updateOrCreate(
        //     ['slug' => 'visi-misi'],
        //     [
        //         'title' => 'Visi & Misi',
        //         'body' => 'Isi Visi & Misi di sini...'
        //     ]
        // );
    }
}
