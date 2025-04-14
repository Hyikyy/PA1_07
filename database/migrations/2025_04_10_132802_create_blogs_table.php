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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Judul post
            $table->text('content'); // Isi post
            $table->string('category')->nullable(); // Kategori (bisa dibuat relasi nanti)
            $table->string('image_path')->nullable(); // Path gambar (nullable jika gambar opsional)
            // $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Jika ingin tahu siapa admin yg posting
            $table->timestamps(); // created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
