<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    // Hiển thị form đăng nhập
    public function showLoginForm()
    {
        return view('Sanpham.login');
    }

    // Xử lý đăng nhập
    public function login(Request $request)
    {
        // Lấy dữ liệu từ form đăng nhập
        $username = $request->input('username');
        $password = $request->input('password');
    
        // Kiểm tra trong database xem có tài khoản nào khớp không
        $user = DB::table('users')->where('username', $username)->first();
    
        // Nếu tìm thấy tài khoản và mật khẩu khớp
        if ($user && $user->password === $password) {
            // Lưu thông tin người dùng vào session
            Session::put('user', $user); // Lưu toàn bộ thông tin của $user vào session
            
            // Chuyển hướng đến trang chủ
            return redirect()->route('sanpham.trangchu');
        } else {
            // Nếu không đúng, quay lại trang đăng nhập với thông báo lỗi
            return back()->withErrors(['login_error' => 'Tên đăng nhập hoặc mật khẩu không đúng']);
        }
    }
    
       // Hiển thị form đăng ký
       public function showRegistrationForm()
       {
           return view('Sanpham.register');
       }
   
       // Xử lý đăng ký
       public function register(Request $request)
       {
           // Xác thực dữ liệu
           $request->validate([
               'name' => 'required|string|max:255',
               'email' => 'required|string|email|max:255|unique:users',
               'password' => 'required|string|min:6|confirmed',
           ]);
   
           // Thêm người dùng vào bảng users
           DB::table('users')->insert([
               'username' => $request->input('name'),
               'email' => $request->input('email'),
               'password' => $request->input('password'), // Mã hóa mật khẩu
               'created_at' => now(),
           ]);
   
           // Chuyển hướng đến trang đăng nhập với thông báo thành công
           return redirect()->route('login.form')->with('success', 'Đăng ký thành công! Bạn có thể đăng nhập ngay bây giờ.');
       }
       public function logout(Request $request)
{
    // Xóa thông tin người dùng khỏi session
    Session::forget('user');
    
    // Chuyển hướng đến trang chủ hoặc trang đăng nhập
    return redirect()->route('sanpham.trangchu');
} 
    
}