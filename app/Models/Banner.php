<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;

    protected $fillable = [
        'type',
        'is_active',
        // Thêm các trường khác mà bạn muốn cho phép gán hàng loạt
    ];

    // Nếu bạn có các trường như image, link, order trong tương lai, hãy thêm chúng vào đây.
}