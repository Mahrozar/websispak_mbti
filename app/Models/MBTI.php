<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MBTI extends Model
{
    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
    
}
