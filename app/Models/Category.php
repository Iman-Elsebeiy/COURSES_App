<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories'; // optional, but makes it explicit

    protected $fillable = ['title', 'description'];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }
}
