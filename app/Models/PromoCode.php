<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PromoCode extends Model
{
    use HasFactory;

    // Tên bảng trong cơ sở dữ liệu
    protected $table = 'promo_codes';

    // Khóa chính là id_code, không phải id
    protected $primaryKey = 'id_code';

    // Nếu không dùng timestamps (created_at, updated_at)
    public $timestamps = false;

    // Các trường có thể gán giá trị khi thêm/sửa bản ghi
    protected $fillable = [
        'id_code',
        'code',
        'discount',
        'expiry_date',
        'product_id',
        'anhvc', // Thêm thuộc tính 'anhvc' vào
    ];

    // Quan hệ với bảng products
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'product_id'); // ForeignKey là 'product_id', OwnerKey cũng là 'product_id'
    }
}
