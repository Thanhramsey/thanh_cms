<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
class Role extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($role) {
            $role->slug = Str::slug($role->name);
        });

        static::updating(function ($role) {
            $role->slug = Str::slug($role->name);
        });
    }

    public function users()
    {
        return $this->hasMany(User::class); // Một role có nhiều user
    }
}