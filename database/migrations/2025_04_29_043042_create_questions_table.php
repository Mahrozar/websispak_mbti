<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('questions', function (Blueprint $table) {
            $table->id();
            $table->string('question_text'); // Pertanyaan yang ditampilkan
            $table->string('mbti_type'); // Tipe MBTI terkait pertanyaan
            $table->tinyInteger('option_1')->default(1); // Sangat Tidak Setuju (1)
            $table->tinyInteger('option_2')->default(2); // Tidak Setuju (2)
            $table->tinyInteger('option_3')->default(3); // Netral (3)
            $table->tinyInteger('option_4')->default(4); // Setuju (4)
            $table->tinyInteger('option_5')->default(5); // Sangat Setuju (5)
            $table->timestamps(); // Kolom created_at dan updated_at
        });

        // Insert 25 questions into the questions table
        DB::table('questions')->insert([
            ['question_text' => 'Apakah Anda lebih suka bekerja sendiri?', 'mbti_type' => 'I'],
            ['question_text' => 'Apakah Anda cenderung membuat keputusan berdasarkan logika?', 'mbti_type' => 'T'],
            ['question_text' => 'Apakah Anda lebih suka merencanakan segalanya sebelumnya?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda merasa nyaman dalam situasi sosial besar?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda lebih suka fokus pada detail daripada gambaran besar?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda sering mengikuti intuisi Anda?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda lebih suka menghindari konflik?', 'mbti_type' => 'F'],
            ['question_text' => 'Apakah Anda sering merasa energik setelah berbicara dengan orang lain?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda lebih suka fleksibilitas daripada struktur?', 'mbti_type' => 'P'],
            ['question_text' => 'Apakah Anda sering memikirkan masa depan?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda lebih suka fakta daripada teori?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda sering membuat keputusan berdasarkan perasaan?', 'mbti_type' => 'F'],
            ['question_text' => 'Apakah Anda lebih suka bekerja dalam tim?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda sering merasa nyaman dengan ketidakpastian?', 'mbti_type' => 'P'],
            ['question_text' => 'Apakah Anda lebih suka memecahkan masalah secara logis?', 'mbti_type' => 'T'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan rutinitas?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda lebih suka berbicara daripada mendengarkan?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda sering memperhatikan detail kecil?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda lebih suka membuat keputusan cepat?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan ide-ide abstrak?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda lebih suka menghindari risiko?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan spontanitas?', 'mbti_type' => 'P'],
            ['question_text' => 'Apakah Anda lebih suka berbicara dengan orang baru?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan fakta?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda lebih suka membuat keputusan berdasarkan data?', 'mbti_type' => 'T']
        ]);

        DB::table('questions')->insert([
            ['question_text' => 'Apakah Anda lebih suka berbicara di depan umum?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan rutinitas harian?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda lebih suka memecahkan masalah dengan cara kreatif?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan fakta konkret?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda lebih suka membuat keputusan berdasarkan intuisi?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan struktur yang jelas?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda lebih suka bekerja dalam lingkungan yang dinamis?', 'mbti_type' => 'P'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan data dan angka?', 'mbti_type' => 'T'],
            ['question_text' => 'Apakah Anda lebih suka berbicara dengan teman dekat daripada orang asing?', 'mbti_type' => 'I'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan keputusan yang cepat?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda lebih suka bekerja dengan ide-ide abstrak?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan fleksibilitas dalam pekerjaan?', 'mbti_type' => 'P'],
            ['question_text' => 'Apakah Anda lebih suka berbicara dengan banyak orang sekaligus?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan perencanaan yang matang?', 'mbti_type' => 'J'],
            ['question_text' => 'Apakah Anda lebih suka bekerja dengan detail kecil?', 'mbti_type' => 'S'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan spontanitas dalam hidup?', 'mbti_type' => 'P'],
            ['question_text' => 'Apakah Anda lebih suka membuat keputusan berdasarkan logika?', 'mbti_type' => 'T'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan ide-ide baru?', 'mbti_type' => 'N'],
            ['question_text' => 'Apakah Anda lebih suka berbicara dengan orang baru?', 'mbti_type' => 'E'],
            ['question_text' => 'Apakah Anda sering merasa lebih nyaman dengan fakta yang jelas?', 'mbti_type' => 'S']
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('questions');
    }
};
