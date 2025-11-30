<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    protected $guerded = ['id'];
    // Relasi one-to-many dengan model Post
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'category_id');
    }
}
