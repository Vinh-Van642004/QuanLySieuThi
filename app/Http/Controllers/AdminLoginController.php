<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminLoginController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        // Lấy tài khoản admin từ DB
        $admin = DB::table('admin')
                    ->where('username', $request->username)
                    ->where('password', $request->password)
                    ->first();

        if ($admin) {
            // Lưu thông tin admin vào session
            session(['admin' => $admin->username]);

            // Chuyển hướng đến trang quản trị sản phẩm
            return redirect()->route('admin.products');
        } else {
            return back()->with('error', 'Tên tài khoản hoặc mật khẩu không đúng.');
        }
    }

    public function logout()
    {
        session()->forget('admin');
        return redirect()->route('admin.login');
    }
}
