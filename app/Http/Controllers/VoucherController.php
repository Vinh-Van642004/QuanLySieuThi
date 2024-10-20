<?php

namespace App\Http\Controllers;

use App\Models\PromoCode;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    // Hiển thị danh sách voucher
    public function index()
    {
        $vouchers = PromoCode::all();  // Lấy tất cả các voucher
        return view('Sanpham.voucher', compact('vouchers'));
    }

    // Tìm kiếm voucher theo mã giảm giá hoặc ID sản phẩm
    public function search(Request $request)
    {
        // Lấy giá trị từ input tìm kiếm và kiểu tìm kiếm
        $searchTerm = $request->input('search_term');
        $searchType = $request->input('search_type');

        // Tạo đối tượng query
        $query = PromoCode::query();

        // Kiểm tra kiểu tìm kiếm và áp dụng điều kiện
        if ($searchType == 'code') {
            // Tìm kiếm theo mã giảm giá
            $query->where('code', 'like', '%' . $searchTerm . '%');
        } elseif ($searchType == 'product_id') {
            // Tìm kiếm theo product_id
            $query->where('product_id', 'like', '%' . $searchTerm . '%');
        }

        // Thực hiện truy vấn và lấy kết quả
        $vouchers = $query->get();

        // Trả về view với kết quả tìm kiếm
        return view('Sanpham.voucher', compact('vouchers'));
    }
    
}
