<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'content',
        'category_id',
        'sku',
        'price',
        'image',
        'quantity',
        'is_active',
        'link',
        'image',
        'meta_title',
        'meta_description',
    ];

    public function category()
    {
        return $this->belongsTo(ProductCategory::class);
    }
}