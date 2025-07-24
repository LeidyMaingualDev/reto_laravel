<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'start_date',
        'end_date',
        'instructor',
        'image',
    ];

//ver estudiantes inscritos
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_user');
    }
}
