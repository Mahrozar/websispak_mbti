<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    /**
     * Relasi ke model Rule.
     */
    public function rules()
    {
        return $this->hasMany(Rule::class);
    }
}
