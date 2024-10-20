<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class DashboardController extends Controller
{
    public function index()
    {
        // Lấy tất cả đơn hàng
        $orders = Order::all();
        
        // Lấy tất cả sản phẩm
        $products = Product::all();

        // Tính tổng doanh thu từ tất cả các đơn hàng (tổng của 'total_amount')
        $totalRevenue = Order::sum('total_amount');

        // Trả về view Dashboard với dữ liệu đơn hàng, sản phẩm và doanh thu
        return view('admin.dashboard', compact('orders', 'products', 'totalRevenue'));
    }
}

