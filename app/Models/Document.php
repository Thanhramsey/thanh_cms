<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Document extends Model
{
    use HasFactory;

    protected $fillable = [
        'so_van_ban',
        'trich_yeu',
        'ngay_ban_hanh',
        'co_quan_ban_hanh',
        'category_id',
        'ghi_chu',
        'file_path',
        'title', // Vẫn giữ lại title nếu bạn muốn
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}