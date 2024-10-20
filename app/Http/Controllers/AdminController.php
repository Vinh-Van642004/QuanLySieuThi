<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class AdminController extends Controller
{
    public function productList()
    {
        // Lấy tất cả sản phẩm từ bảng Products
        $products = Product::all();
        
        // Gửi dữ liệu sản phẩm tới view
        return view('admin.product_list', compact('products'));
    }
    public function showAddForm()
    {
        // Lấy tất cả danh mục để hiển thị trong form
        $categories = Category::all();
        return view('admin.product_add', compact('categories'));
    }

    public function storeProduct(Request $request)
    {
        // Validate dữ liệu đầu vào
        $request->validate([
            'product_name' => 'required|string|max:100',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,category_id',
            'hinhanh' => 'required', // Thêm xác thực cho hình ảnh
            'description' => 'nullable|string',
        ]);
    
        // Xử lý upload file hình ảnh
        $filename = null;
        if ($request->hasFile('hinhanh')) {
            $file = $request->file('hinhanh');
            $filename = time() . '_' . $file->getClientOriginalName();
            
           
            $file->move(public_path('images'), $filename);
        }
    
        // Lưu sản phẩm vào cơ sở dữ liệu
        Product::create([
            'product_name' => $request->product_name,
            'price' => $request->price,
            'description' => $request->description,
            'hinhanh' => $filename,
            'category_id' => $request->category_id,
        ]);
    
        return redirect()->route('admin.products')->with('success', 'Product added successfully!');
    }
    
    
    
    public function destroy($id)
    {
        // Tìm sản phẩm theo ID
        $product = Product::find($id);
        
        if ($product) {
            // Xóa sản phẩm
            $product->delete();
            return redirect()->route('admin.products')->with('success', 'Product deleted successfully!');
        } else {
            return redirect()->route('admin.products')->with('error', 'Product not found!');
        }
    }
    public function edit($id)
{
    // Tìm sản phẩm theo ID
    $product = Product::find($id);

    if ($product) {
        // Lấy tất cả các danh mục
        $categories = Category::all();

        // Truyền sản phẩm và danh mục vào view
        return view('admin.product_edit', compact('product', 'categories'));
    } else {
        return redirect()->route('admin.products')->with('error', 'Product not found!');
    }
}

    // Phương thức để xử lý cập nhật sản phẩm
    public function update(Request $request, $id)
    {
        // Lấy sản phẩm cần cập nhật
        $product = Product::findOrFail($id);
    
        // Cập nhật các trường khác
        $product->product_name = $request->input('product_name');
        $product->price = $request->input('price');
        $product->description = $request->input('description');
        $product->category_id = $request->input('category_id');
    
        // Kiểm tra xem người dùng có tải lên ảnh mới không
        if ($request->hasFile('hinhanh')) {
            // Lưu ảnh mới
            $file = $request->file('hinhanh');
            $fileName = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
    
            // Xóa ảnh cũ nếu có
            if ($product->hinhanh && file_exists(public_path('images/' . $product->hinhanh))) {
                unlink(public_path('images/' . $product->hinhanh));
            }
    
            // Cập nhật tên file ảnh mới trong database
            $product->hinhanh = $fileName;
        }
    
        // Lưu thay đổi vào database
        $product->save();
    
        // Chuyển hướng sau khi cập nhật
        return redirect()->route('admin.products')->with('success', 'Product updated successfully');
    }
    
}
