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
     * Các thuộc tính có thể gán hàng loạt (mass assignable).
     *
     * @var list<string>
     */
    protected $table = 'users';
    protected $primaryKey = 'id';
    public $timestamps = true;
    protected $fillable = [
        'name',
        'dob',
        'phone',
        'email',
        'password',
        'role',
    ];

    /**
     * Các thuộc tính cần được ẩn khi chuyển đối tượng thành JSON/array (serialization)
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Lấy danh sách các thuộc tính cần được ép kiểu (cast).
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

    // Hàm kiểm tra quyền admin
    public function isAdmin()
    {
        return $this->role === 'admin';
    }
}
