<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
class ProductController extends Controller
{
    public function index(Request $request)
    {
        // Lấy giá trị từ form tìm kiếm
        $search = $request->input('search');

        // Nếu có từ khóa tìm kiếm, tìm kiếm sản phẩm dựa trên tên
        if ($search) {
            $products = Product::where('product_name', 'LIKE', '%' . $search . '%')->get();
        } else {
            // Nếu không có từ khóa, lấy tất cả sản phẩm
            $products = Product::all();
        }

        // Trả về view với danh sách sản phẩm
        return view('sanpham.trangchu', compact('products'));
    }
    
    public function show($id)
    {
        // Lấy sản phẩm từ cơ sở dữ liệu dựa vào product_id
        $product = Product::where('product_id', $id)->firstOrFail();
        
        // Trả về view 'sanpham.chitiet' với dữ liệu sản phẩm
        return view('sanpham.chitiet', compact('product'));
    }
    public function showCategory($id)
    {
        // Get the category details
        $category = Category::find($id);

        if (!$category) {
            return redirect()->back()->with('error', 'Danh mục không tồn tại.');
        }

        // Get products for the selected category
        $products = Product::where('category_id', $id)->get();

        // Pass products and category to the view
        return view('sanpham.category', compact('products', 'category'));
    }
    public function warehouse()
    {
        // Lấy tất cả sản phẩm từ database
        $products = Product::all();
        
        // Trỏ tới view mới trong thư mục admin/warehouse
        return view('admin.warehouse.index', compact('products'));
    }

    // Xử lý việc tăng số lượng trực tiếp từ trang kho hàng
    public function increaseFromWarehouse(Request $request, $product_id)
    {
        // Validate số lượng nhập vào
        $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        // Cập nhật số lượng cho sản phẩm
        $product = Product::findOrFail($product_id);
        $product->stock_quantity += $request->quantity;
        $product->save();

        // Chuyển hướng lại trang kho hàng kèm thông báo thành công
        return redirect()->route('warehouse')->with('success', 'Số lượng sản phẩm đã được cập nhật!');
    }
    public function filterProducts(Request $request)
{
    $minPrice = $request->input('min_price');
    $maxPrice = $request->input('max_price');

    // Lọc sản phẩm theo khoảng giá
    $products = Product::whereBetween('price', [$minPrice, $maxPrice])->get();

    // Trả về view với sản phẩm đã lọc
    return view('sanpham.trangchu', compact('products'));
}

}
