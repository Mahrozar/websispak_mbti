<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_text',
        'mbti_type',
    ];

    /**
     * Define any relationships here if needed.
     */
    public function mbti()
    {
        return $this->belongsTo(MBTI::class, 'mbti_type', 'type');
    }
}
