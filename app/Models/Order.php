<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Khai báo bảng nếu tên không khớp với model
    protected $table = 'orders';

    // Khóa chính của bảng là 'order_id' thay vì 'id'
    protected $primaryKey = 'order_id';

    // Nếu 'order_id' là một số nguyên tự tăng
    public $incrementing = true;

    // Khóa chính có kiểu int
    protected $keyType = 'int';

    // Tắt tính năng timestamps (created_at, updated_at)
    public $timestamps = false;

    // Khai báo các trường có thể được gán giá trị hàng loạt
    protected $fillable = [
        'buyer_name',
        'email',
        'phone_number',
        'shipping_address',
        'note',
        'product_id',
        'product_name',
        'price',
        'payment_method',
        'user_id',
        'status',
        'quantity', 
        'total_amount', // Trạng thái đơn hàng
    ];
}
