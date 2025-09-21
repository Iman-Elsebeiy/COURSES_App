<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'user_id',
        // 'category_id',
        'image',
    ];

    
    public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

public function teacher()
{
    return $this->belongsTo(User::class, 'user_id')->where('role', 'teacher');
}


    // علاقة مع الـ Category
    // public function category()
    // {
    //     return $this->belongsTo(Category::class);
    // }
}

