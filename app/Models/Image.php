<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'path',
        'alt_text',
        'description',
        'group',
        'order',
        'active',
        'user_id',
    ];

    // Nếu bạn có quan hệ với bảng users
     public function user(): BelongsTo // Thay đổi ở đây
    {
        return $this->belongsTo(User::class);
    }
    public function categoryName()
    {
        $category = Category::find($this->group);
        return $category ? $category->name : 'Không xác định';
    }
}