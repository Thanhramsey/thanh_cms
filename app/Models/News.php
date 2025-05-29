<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'summary',
        'content',
        'image',
        'type_id',
        'is_published',
        'published_at',
        'user_id',
    ];

    protected $casts = [
        'published_at' => 'datetime',
    ];

    public function user(): BelongsTo // Thay đổi ở đây
    {
        return $this->belongsTo(User::class);
    }
    public function categoryName()
    {
        $category = Category::find($this->type_id);
        return $category ? $category->name : 'Không xác định';
    }

}