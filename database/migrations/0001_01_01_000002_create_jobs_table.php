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
        // Tabel jobs untuk menyimpan master pekerjaan MBTI
        Schema::dropIfExists('jobs');
        Schema::create('jobs', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nama pekerjaan
            $table->text('description')->nullable(); // Deskripsi pekerjaan
            $table->timestamps();
        });

        // Tabel job_batches untuk menyimpan batch pekerjaan
        Schema::create('job_batches', function (Blueprint $table) {
            $table->string('id')->primary(); // ID batch pekerjaan
            $table->string('name'); // Nama batch pekerjaan
            $table->integer('total_jobs'); // Total pekerjaan dalam batch
            $table->integer('pending_jobs'); // Pekerjaan yang masih menunggu
            $table->integer('failed_jobs'); // Pekerjaan yang gagal
            $table->longText('failed_job_ids'); // ID pekerjaan yang gagal
            $table->mediumText('options')->nullable(); // Opsi konfigurasi batch
            $table->timestamp('cancelled_at')->nullable(); // Waktu pembatalan batch
            $table->timestamp('created_at')->useCurrent(); // Waktu pembuatan batch
            $table->timestamp('finished_at')->nullable(); // Waktu penyelesaian batch
        });

        // Tabel failed_jobs untuk menyimpan pekerjaan yang gagal
        Schema::create('failed_jobs', function (Blueprint $table) {
            $table->id(); // ID pekerjaan gagal
            $table->string('uuid')->unique(); // UUID unik untuk pekerjaan gagal
            $table->text('connection'); // Koneksi pekerjaan
            $table->text('queue'); // Antrian pekerjaan
            $table->longText('payload'); // Payload pekerjaan
            $table->longText('exception'); // Exception yang terjadi
            $table->timestamp('failed_at')->useCurrent(); // Waktu pekerjaan gagal
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Menghapus tabel jika diperlukan
        Schema::dropIfExists('jobs');
        Schema::dropIfExists('job_batches');
        Schema::dropIfExists('failed_jobs');
    }
};
