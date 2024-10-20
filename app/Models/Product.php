<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // Nếu khóa chính không phải là 'id'
    protected $primaryKey = 'product_id';
    
    // Nếu khóa chính không tự động tăng
    public $incrementing = false;
    
    // Nếu khóa chính không phải là kiểu dữ liệu integer
    protected $keyType = 'string';
    protected $table = 'products';
    protected $fillable = ['product_name', 'price', 'description', 'hinhanh', 'category_id'];
    
}

