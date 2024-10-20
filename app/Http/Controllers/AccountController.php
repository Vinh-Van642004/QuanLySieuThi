<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Customer;
use Session;

class AccountController extends Controller
{
    // Hiển thị thông tin tài khoản
    public function showAccountInfo()
    {
        if (Session::has('user')) {
            $user = Session::get('user');
            $customer = Customer::where('user_id', $user->user_id)->first();  // Lấy thông tin customer
            return view('my-account-view', compact('user', 'customer'));
        } else {
            return redirect()->route('login.form');
        }
    }

    // Hiển thị form cập nhật thông tin
    public function editAccountInfo()
    {
        if (Session::has('user')) {
            $user = Session::get('user');
            $customer = Customer::where('user_id', $user->user_id)->first();
            return view('my-account-edit', compact('user', 'customer'));
        } else {
            return redirect()->route('login.form');
        }
    }

    // Xử lý cập nhật thông tin
    public function updateAccountInfo(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:50',
            'last_name' => 'required|string|max:50',
            'phone_number' => 'nullable|string|max:15',
            'address' => 'nullable|string|max:255',
            'city' => 'nullable|string|max:50',
            'email' => 'nullable|email|max:100', // Thêm validation cho email
            'country' => 'nullable|string|max:50',
        ]);
        

        $user = Session::get('user');
        $customer = Customer::where('user_id', $user->user_id)->first();

        if (!$customer) {
            $customer = new Customer();
            $customer->user_id = $user->user_id;
        }

        $customer->first_name = $request->input('first_name');
        $customer->last_name = $request->input('last_name');
        $customer->phone_number = $request->input('phone_number');
        $customer->address = $request->input('address');
        $customer->city = $request->input('city');
        $customer->email = $request->input('email'); // Cập nhật email
        $customer->country = $request->input('country');
        $customer->save();

        return redirect()->route('my-account')->with('success', 'Cập nhật thông tin thành công.');
    }
}

