<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lesson extends Model
{
    //
    protected $table='lessons';
    protected $fillable=[
        'course_id',
        'title',
        'description',
        'video_url',
        'video_file',
        'order'

    ];
    public function course(){
        return $this->belongsTo(Course::class);
    }
}
