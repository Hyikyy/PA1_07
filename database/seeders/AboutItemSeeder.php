<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\AboutItem;

class AboutItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        AboutItem::updateOrCreate(
            ['slug' => 'sejarah'],
            [
                'title' => 'Sejarah',
                'icon_class' => 'bi bi-pen',
                'summary' => 'Program Studi Teknologi Informasi Diploma Tiga adalah salah satu dari 3 (tiga) program studi...', // Isi teks awal
                'route_name' => 'sejarah', // Nama route untuk detail sejarah
                'order' => 1,
                'is_active' => true,
            ]
        );

        AboutItem::updateOrCreate(
            ['slug' => 'visi-misi'],
            [
                'title' => 'Visi & Misi',
                'icon_class' => 'bi bi-eye',
                'summary' => 'Menjadi program studi vokasi Teknologi Informasi yang unggul di bidang rekayasa...', // Isi teks awal
                'route_name' => 'visi_misi',
                'order' => 2,
                'is_active' => true,
            ]
        );

        AboutItem::updateOrCreate(
            ['slug' => 'dosen'],
            [
                'title' => 'Nama Dosen',
                'icon_class' => 'bi bi-person',
                'summary' => 'Daftar dosen pengajar di Program Studi D3 Teknologi Informasi IT Del.', // Isi teks awal
                'route_name' => 'daftar_dosen',
                'order' => 3,
                'is_active' => true,
            ]
        );

        AboutItem::updateOrCreate(
            ['slug' => 'ta'],
             [
                'title' => 'Nama TA',
                'icon_class' => 'bi bi-people',
                'summary' => 'Informasi mengenai Tugas Akhir mahasiswa D3 Teknologi Informasi IT Del.', // Isi teks awal
                'route_name' => 'daftar_TA',
                'order' => 4,
                'is_active' => true,
            ]
        );

        AboutItem::updateOrCreate(
            ['slug' => 'alumni'],
            [
                'title' => 'Daftar Alumni',
                'icon_class' => 'bi bi-card-list',
                'summary' => 'Jejak karir dan kontribusi para alumni D3 Teknologi Informasi IT Del.', // Isi teks awal
                'route_name' => 'daftar_alumni',
                'order' => 5,
                'is_active' => true,
            ]
        );

        AboutItem::updateOrCreate(
            ['slug' => 'kata-alumni'],
             [
                'title' => 'Apa Kata Alumni',
                'icon_class' => 'bi bi-chat-square-text',
                'summary' => 'Testimoni dan pengalaman dari para alumni kami.', // Isi teks awal
                'route_name' => 'apa_kata_alumni',
                'order' => 6,
                'is_active' => true,
            ]
        );
    }
}
