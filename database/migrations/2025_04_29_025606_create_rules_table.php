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
        // Membuat tabel rules
        Schema::create('rules', function (Blueprint $table) {
            $table->id();
            // Relasi ke tabel m_b_t_i_s (MBTI)
            $table->foreignId('mbti_id')->constrained('m_b_t_i_s')->onDelete('cascade');
            // Relasi ke tabel jobs
            $table->foreignId('job_id')->constrained('jobs')->onDelete('cascade');
            // Kolom CF Value
            $table->float('cf_value');
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel rules jika diperlukan
        Schema::dropIfExists('rules');
    }
};
