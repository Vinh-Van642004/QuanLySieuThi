<?php
// app/Http/Controllers/CategoryController.php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        // Lấy tất cả các danh mục
        $categories = Category::all();
        return view('admin.category', compact('categories')); // Chuyển đến view admin
    }
    public function trangChu()
    {
        // Lấy tất cả danh mục từ database
        $categories = Category::all(); 
        
        // Trả về view và truyền biến categories
        return view('sanpham.trangchu', compact('categories'));
    }
  
}

