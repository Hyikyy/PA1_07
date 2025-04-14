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
        Schema::create('about_items', function (Blueprint $table) {
            $table->id();
            // Kolom unik untuk identifikasi item (misal: 'sejarah', 'visi-misi')
            $table->string('slug')->unique();
            $table->string('title'); // Judul (e.g., "Sejarah", "Visi & Misi")
            $table->string('icon_class'); // Kelas ikon Bootstrap (e.g., "bi bi-pen")
            $table->text('summary'); // Teks ringkasan
            $table->string('route_name'); // Nama route untuk link "Read more"
            $table->integer('order')->default(0); // Untuk urutan tampilan (opsional)
            $table->boolean('is_active')->default(true); // Untuk mengaktifkan/menonaktifkan item (opsional)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('about_items');
    }
};
