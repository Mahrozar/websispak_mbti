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
        // Membuat tabel m_b_t_i_s
        Schema::create('m_b_t_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('type'); // Kolom tipe MBTI
            $table->text('description'); // Deskripsi tipe MBTI
            $table->integer('range')->nullable(); // Kolom range yang bersifat nullable
            $table->timestamps(); // Menambahkan kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel m_b_t_i_s jika diperlukan
        Schema::dropIfExists('m_b_t_i_s');
    }
};
