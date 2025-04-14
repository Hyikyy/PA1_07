<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('struktur_organisasi', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->string('jabatan');
            // Path relatif ke file gambar di storage (misal: 'struktur_foto/nama-file.jpg')
            $table->string('foto')->nullable();
            // Mengganti nama kolom agar lebih jelas bahwa ini adalah URL/Link
            $table->string('link_twitter')->nullable();
            $table->string('link_facebook')->nullable();
            $table->string('link_instagram')->nullable();
            $table->string('link_linkedin')->nullable();
            // Urutan tampil, bisa dimulai dari 1 atau 0, tambahkan index untuk performa query
            $table->integer('urutan')->default(99)->index(); // Default ke angka besar agar yg baru masuk ada di akhir jika tidak diisi
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('struktur_organisasi');
    }
};
