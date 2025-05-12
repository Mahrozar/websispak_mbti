<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\MBTI;

class MBTISeeder extends Seeder
{
    public function run()
    {
        $mbtiTypes = [
            ['type' => 'INTJ', 'description' => 'The Architect – Imaginative and strategic thinkers, with a plan for everything.'],
            ['type' => 'INTP', 'description' => 'The Logician – Innovative inventors with an unquenchable thirst for knowledge.'],
            ['type' => 'ENTJ', 'description' => 'The Commander – Bold, imaginative and strong-willed leaders.'],
            ['type' => 'ENTP', 'description' => 'The Debater – Smart and curious thinkers who cannot resist an intellectual challenge.'],
            ['type' => 'INFJ', 'description' => 'The Advocate – Quiet and mystical, yet very inspiring and tireless idealists.'],
            ['type' => 'INFP', 'description' => 'The Mediator – Poetic, kind and altruistic people, always eager to help a good cause.'],
            ['type' => 'ENFJ', 'description' => 'The Protagonist – Charismatic and inspiring leaders, able to mesmerize their listeners.'],
            ['type' => 'ENFP', 'description' => 'The Campaigner – Enthusiastic, creative and sociable free spirits.'],
            ['type' => 'ISTJ', 'description' => 'The Logistician – Practical and fact-minded individuals.'],
            ['type' => 'ISFJ', 'description' => 'The Defender – Very dedicated and warm protectors.'],
            ['type' => 'ESTJ', 'description' => 'The Executive – Excellent administrators, unsurpassed at managing things.'],
            ['type' => 'ESFJ', 'description' => 'The Consul – Extraordinarily caring, social and popular people.'],
            ['type' => 'ISTP', 'description' => 'The Virtuoso – Bold and practical experimenters, masters of all tools.'],
            ['type' => 'ISFP', 'description' => 'The Adventurer – Flexible and charming artists.'],
            ['type' => 'ESTP', 'description' => 'The Entrepreneur – Smart, energetic and perceptive people.'],
            ['type' => 'ESFP', 'description' => 'The Entertainer – Spontaneous, energetic and enthusiastic people.'],
        ];

        foreach ($mbtiTypes as $type) {
            MBTI::updateOrCreate(
                ['type' => $type['type']],
                [
                    'description' => $type['description'],
                    'range' => null // Pastikan kolom range diisi null jika tidak ada
                ]
            );
        }
    }
}
