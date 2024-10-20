<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        // Trả về view mới trong thư mục admin
        return view('admin.user', [
            'users' => User::all(), // ví dụ truyền dữ liệu users
        ]);
    }
    public function destroy($id)
{
    // Tìm người dùng theo ID
    $user = User::findOrFail($id);

    // Xóa người dùng
    $user->delete();

    // Chuyển hướng về danh sách người dùng với thông báo thành công
    return redirect()->route('admin.user')->with('success', 'Tài khoản người dùng đã được xóa thành công.');
}

}
