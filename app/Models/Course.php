<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    /** @use HasFactory<\Database\Factories\CourseFactory> */
    use HasFactory;

    protected $table = 'courses';

    protected $fillable = [
        'name',
        'description',
        'course_image',
        'teacher_image',
        'teacher_job',
        'lessons',
        'category_id',
        'price',
        'teacher_id',
    ];

    // Course belongs to a teacher (User with role=teacher)
    public function teacher()
    {
        return $this->belongsTo(User::class, 'teacher_id');
    }

    // Course has many students (Users with role=student)
    public function students()
    {
        return $this->belongsToMany(User::class, 'course_student', 'course_id', 'student_id');
    }
    public function category()
{
    return $this->belongsTo(Category::class,'category_id');
}




    
}
