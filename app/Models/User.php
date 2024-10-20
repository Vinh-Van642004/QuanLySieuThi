<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * Tên bảng trong database.
     *
     * @var string
     */
    protected $table = 'users'; // Bảng 'users' trong database

    /**
     * Khóa chính của bảng.
     *
     * @var string
     */
    protected $primaryKey = 'user_id'; // Khóa chính là 'user_id'

    /**
     * Tắt timestamps (created_at, updated_at) nếu không dùng.
     */
    public $timestamps = false;

    /**
     * Các cột có thể gán giá trị thông qua mass assignment.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'username', // Tên đăng nhập
        'email',
        'password',
        'created_at', // Ngày tạo
    ];

    /**
     * Các cột cần được ẩn khi serializing.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Cấu hình các cột cần được cast kiểu dữ liệu.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'password' => 'hashed', // Đảm bảo password được hashed
    ];
}
