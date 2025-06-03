<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PageView extends Model
{
    use HasFactory;

    protected $fillable = [
        'session_id',
        'ip_address',
        'user_agent',
        'url',
        'view_date',
    ];

    // Nếu bạn muốn tự động cast view_date thành Carbon instance
    protected $dates = ['view_date'];
}