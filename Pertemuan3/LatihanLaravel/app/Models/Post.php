<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;

    // Melindung kelas 'id' dari mass assignment, kolom lain bebas diisi
    protected $guarded = ['id'];

    // Eager loading: otomomatis load relasi author dan category saat query post
    protected $with = ['author', 'category'];

    // Relasi many-to-one: Post ditulis oleh satu user (author)
    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id');
        // 'user_id' adalah foreign key di tabel posts
        // Alias 'author' agar lebih mudah dibaca: $post->author
    }

    // Relasi many-to-one: Post termasuk dalam satu category
    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category_id');
        // 'category_id' adalah foreign key di tabel posts
        // Contoh $post->category->name
    }

    // Query $cope: filter pencarian berdasarkan search, category, atau author
    public function scopeFilter(Builder $query, array $filters): void
    {
        // Filter berdasarkan judul (search)
        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) => $query->where('title', 'like', '%' . $search . '%')
        );

        // Filter berdasarkan category
        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) => $query->whereHas(
                'category',
                fn($query) =>
                $query->where('slug', $category)
            )
        );

        // Filter berdasarkan author
        $query->when(
            $filters['author'] ?? false,
            fn($query, $author) => $query->whereHas(
                'author',
                fn($query) =>
                $query->where('username', $author)
            )
        );
    }
}
