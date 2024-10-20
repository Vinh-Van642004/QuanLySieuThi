<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\PromoCode;

class PromoCodeController extends Controller
{
    public function index()
    {
        // Lấy tất cả dữ liệu từ bảng promo_codes
        $promoCodes = DB::table('promo_codes')->get();
        
        // Trả về view với dữ liệu đã lấy
        return view('admin.promo_codes.index', compact('promoCodes'));
    }
    public function edit($id)
    {
        // Lấy thông tin mã giảm giá theo ID
        $promoCode = DB::table('promo_codes')->where('id_code', $id)->first();

        // Trả về view với thông tin mã giảm giá
        return view('admin.promo_codes.edit', compact('promoCode'));
    }

    // Hàm để cập nhật mã giảm giá
    public function update(Request $request, $id_code)
    {
        // Tìm promo code
        $promoCode = PromoCode::find($id_code);
    
        // Xử lý file upload
        if ($request->hasFile('anhvc')) {
            // Lấy tên file gốc và lưu vào thư mục 'images'
            $file = $request->file('anhvc');
            $fileName = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('images'), $fileName);
            
            // Lưu tên file mới vào database
            $promoCode->anhvc = $fileName;
        }
    
        // Cập nhật các thông tin khác
        $promoCode->code = $request->input('code');
        $promoCode->discount = $request->input('discount');
        $promoCode->expiry_date = $request->input('expiry_date');
        $promoCode->save();
    
        return redirect()->route('admin.promo_codes.index')->with('success', 'Promo code updated successfully!');
    }
    public function create()
{
    return view('admin.promo_codes.create');
}
public function storePromoCode(Request $request)
{
    // Xác thực dữ liệu đầu vào
    $request->validate([
        'id_code' => 'required|string|max:50', // id_code phải có giá trị
        'code' => 'required|string|max:50',    // Mã giảm giá cần có
        'discount' => 'required|numeric',      // Giảm giá phải là số
        'expiry_date' => 'required|date',      // Ngày hết hạn phải là một ngày hợp lệ
        'product_id' => 'nullable|exists:products,product_id', // ID sản phẩm có thể rỗng nhưng phải tồn tại nếu có
        'anhvc' => 'required', // Kiểm tra file ảnh
    ]);

    // Xử lý upload file ảnh nếu có
    $filename = null;
    if ($request->hasFile('anhvc')) {
        $file = $request->file('anhvc');
        $filename = time() . '_' . $file->getClientOriginalName();
        $file->move(public_path('images'), $filename); // Lưu ảnh vào thư mục public/images
    }

    // Lưu mã giảm giá vào cơ sở dữ liệu
    PromoCode::create([
        'id_code' => $request->id_code,      // id_code được nhập từ form
        'code' => $request->code,            // Mã giảm giá
        'discount' => $request->discount,    // Giảm giá
        'expiry_date' => $request->expiry_date, // Ngày hết hạn
        'product_id' => $request->product_id, // ID sản phẩm (nếu có)
        'anhvc' => $filename,                 // Tên file ảnh (nếu có)
    ]);

    // Redirect về trang danh sách với thông báo thành công
    return redirect()->route('admin.promo_codes.index')->with('success', 'Mã giảm giá đã được thêm thành công!');
}



    
}
