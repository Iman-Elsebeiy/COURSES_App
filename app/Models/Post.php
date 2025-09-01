<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    // Mass assignable fields
    protected $fillable = [
        'title',
        'content',
        'image',
        'admin_id',
        'category_id',
    ];

    /**
     * A post belongs to an admin (author).
     */
    public function admin()
    {
        return $this->belongsTo(Admin::class);
    }

    /**
     * A post belongs to a category.
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * A post has many comments.
     */
    // public function comments()
    // {
    //     return $this->hasMany(Comment::class);
    // }
}
