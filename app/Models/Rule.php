<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rule extends Model
{
    public function mbti()
    {
        return $this->belongsTo(MBTI::class);
    }
    
    public function job()
    {
        return $this->belongsTo(Job::class);
    }
    
}
