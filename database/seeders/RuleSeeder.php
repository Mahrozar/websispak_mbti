<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\MBTI;
use App\Models\Job;

class RuleSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('rules')->insert([
            // INTJ
            [ 'mbti_id' => MBTI::where('type', 'INTJ')->value('id'), 'job_id' => Job::where('name', 'Software Engineer')->value('id'), 'cf_value' => 0.9 ],
            [ 'mbti_id' => MBTI::where('type', 'INTJ')->value('id'), 'job_id' => Job::where('name', 'Data Scientist')->value('id'), 'cf_value' => 0.7 ],
            [ 'mbti_id' => MBTI::where('type', 'INTJ')->value('id'), 'job_id' => Job::where('name', 'Product Manager')->value('id'), 'cf_value' => 0.7 ],
            // INTP
            [ 'mbti_id' => MBTI::where('type', 'INTP')->value('id'), 'job_id' => Job::where('name', 'Software Engineer')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'INTP')->value('id'), 'job_id' => Job::where('name', 'Data Scientist')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'INTP')->value('id'), 'job_id' => Job::where('name', 'Database Administrator')->value('id'), 'cf_value' => 0.7 ],
            // ENTJ
            [ 'mbti_id' => MBTI::where('type', 'ENTJ')->value('id'), 'job_id' => Job::where('name', 'Project Manager')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ENTJ')->value('id'), 'job_id' => Job::where('name', 'Business Analyst')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ENTJ')->value('id'), 'job_id' => Job::where('name', 'Product Manager')->value('id'), 'cf_value' => 0.8 ],
            // ENTP
            [ 'mbti_id' => MBTI::where('type', 'ENTP')->value('id'), 'job_id' => Job::where('name', 'Marketing Specialist')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ENTP')->value('id'), 'job_id' => Job::where('name', 'Consultant')->value('id'), 'cf_value' => 0.75 ],
            [ 'mbti_id' => MBTI::where('type', 'ENTP')->value('id'), 'job_id' => Job::where('name', 'Entrepreneur')->value('id'), 'cf_value' => 0.8 ],
            // INFJ
            [ 'mbti_id' => MBTI::where('type', 'INFJ')->value('id'), 'job_id' => Job::where('name', 'Psychologist')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'INFJ')->value('id'), 'job_id' => Job::where('name', 'Teacher')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'INFJ')->value('id'), 'job_id' => Job::where('name', 'Writer')->value('id'), 'cf_value' => 0.7 ],
            // INFP
            [ 'mbti_id' => MBTI::where('type', 'INFP')->value('id'), 'job_id' => Job::where('name', 'Writer')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'INFP')->value('id'), 'job_id' => Job::where('name', 'Graphic Designer')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'INFP')->value('id'), 'job_id' => Job::where('name', 'Psychologist')->value('id'), 'cf_value' => 0.7 ],
            // ENFJ
            [ 'mbti_id' => MBTI::where('type', 'ENFJ')->value('id'), 'job_id' => Job::where('name', 'Teacher')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ENFJ')->value('id'), 'job_id' => Job::where('name', 'HR Specialist')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ENFJ')->value('id'), 'job_id' => Job::where('name', 'Consultant')->value('id'), 'cf_value' => 0.7 ],
            // ENFP
            [ 'mbti_id' => MBTI::where('type', 'ENFP')->value('id'), 'job_id' => Job::where('name', 'Writer')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ENFP')->value('id'), 'job_id' => Job::where('name', 'Marketing Specialist')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ENFP')->value('id'), 'job_id' => Job::where('name', 'Public Relations')->value('id'), 'cf_value' => 0.7 ],
            // ISTJ
            [ 'mbti_id' => MBTI::where('type', 'ISTJ')->value('id'), 'job_id' => Job::where('name', 'Accountant')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ISTJ')->value('id'), 'job_id' => Job::where('name', 'Auditor')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ISTJ')->value('id'), 'job_id' => Job::where('name', 'Database Administrator')->value('id'), 'cf_value' => 0.7 ],
            // ISFJ
            [ 'mbti_id' => MBTI::where('type', 'ISFJ')->value('id'), 'job_id' => Job::where('name', 'Nurse')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ISFJ')->value('id'), 'job_id' => Job::where('name', 'Teacher')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ISFJ')->value('id'), 'job_id' => Job::where('name', 'HR Specialist')->value('id'), 'cf_value' => 0.7 ],
            // ESTJ
            [ 'mbti_id' => MBTI::where('type', 'ESTJ')->value('id'), 'job_id' => Job::where('name', 'Store Manager')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ESTJ')->value('id'), 'job_id' => Job::where('name', 'Project Manager')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ESTJ')->value('id'), 'job_id' => Job::where('name', 'Accountant')->value('id'), 'cf_value' => 0.7 ],
            // ESFJ
            [ 'mbti_id' => MBTI::where('type', 'ESFJ')->value('id'), 'job_id' => Job::where('name', 'Nurse')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ESFJ')->value('id'), 'job_id' => Job::where('name', 'HR Specialist')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ESFJ')->value('id'), 'job_id' => Job::where('name', 'Teacher')->value('id'), 'cf_value' => 0.7 ],
            // ISTP
            [ 'mbti_id' => MBTI::where('type', 'ISTP')->value('id'), 'job_id' => Job::where('name', 'Technician')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ISTP')->value('id'), 'job_id' => Job::where('name', 'Mechanic')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ISTP')->value('id'), 'job_id' => Job::where('name', 'Engineer')->value('id'), 'cf_value' => 0.7 ],
            // ISFP
            [ 'mbti_id' => MBTI::where('type', 'ISFP')->value('id'), 'job_id' => Job::where('name', 'Artist')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ISFP')->value('id'), 'job_id' => Job::where('name', 'Musician')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ISFP')->value('id'), 'job_id' => Job::where('name', 'Graphic Designer')->value('id'), 'cf_value' => 0.7 ],
            // ESTP
            [ 'mbti_id' => MBTI::where('type', 'ESTP')->value('id'), 'job_id' => Job::where('name', 'Sales Executive')->value('id'), 'cf_value' => 0.85 ],
            [ 'mbti_id' => MBTI::where('type', 'ESTP')->value('id'), 'job_id' => Job::where('name', 'Entrepreneur')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ESTP')->value('id'), 'job_id' => Job::where('name', 'Technician')->value('id'), 'cf_value' => 0.7 ],
            // ESFP
            [ 'mbti_id' => MBTI::where('type', 'ESFP')->value('id'), 'job_id' => Job::where('name', 'Marketing Specialist')->value('id'), 'cf_value' => 0.75 ],
            [ 'mbti_id' => MBTI::where('type', 'ESFP')->value('id'), 'job_id' => Job::where('name', 'Musician')->value('id'), 'cf_value' => 0.8 ],
            [ 'mbti_id' => MBTI::where('type', 'ESFP')->value('id'), 'job_id' => Job::where('name', 'Artist')->value('id'), 'cf_value' => 0.7 ],
        ]);
    }
}
