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
        Schema::create('konsultasis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('konsultasi_users')->onDelete('cascade');
            $table->string('kategori');
            $table->string('perangkat');
            $table->text('masalah');
            $table->string('foto')->nullable();
            $table->enum('urgensi', ['Rendah', 'Sedang', 'Tinggi'])->default('Sedang');
            $table->enum('status', ['menunggu', 'diproses', 'selesai'])->default('menunggu');
            $table->text('jawaban')->nullable();
            $table->timestamp('jawaban_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('konsultasis');
    }
}; 