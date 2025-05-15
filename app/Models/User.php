<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Thêm role vào fillable
        'avatar', // Thêm avatar vào fillable
        'phone_number', // Thêm phone_number vào fillable
        'address', // Thêm address vào fillable
        'status', // Thêm status vào fillable
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

       public function roleName()
    {
        $roles = Role::find($this->role);
        return $roles ? $roles->name : 'Không xác định';

        // Nếu có một logic phức tạp hơn để liên kết, bạn cần điều chỉnh ở đây.
    }
}