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
        // Sudah dihandle di migrasi create_jobs_table, tidak perlu apapun di sini
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Tidak perlu apapun di sini
    }
};