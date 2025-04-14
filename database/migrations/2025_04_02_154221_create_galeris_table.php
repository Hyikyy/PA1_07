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
        Schema::create('galeris', function (Blueprint $table) {
            $table->id();
            $table->string('judul'); // Judul foto/kegiatan
            $table->string('kategori'); // Kategori untuk filter (e.g., graduation, kaderisasi)
            $table->text('deskripsi')->nullable(); // Deskripsi foto
            $table->string('gambar'); // Path/nama file gambar
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('galeris');
    }
};
