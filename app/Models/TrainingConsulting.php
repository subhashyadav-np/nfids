<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TrainingConsulting extends Model
{
    use HasFactory;

    public function chapter()
    {
        return $this->hasMany('App\Models\CourseContent', 'training_consulting_id', 'id');
    }
}
