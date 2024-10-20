<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected $primaryKey = 'customer_id';
    public $timestamps = false;

    // Kết nối tới User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}

