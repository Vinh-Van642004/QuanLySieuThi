<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Support\Facades\Session;
use App\Models\Product;
use App\Models\PromoCode;
use Carbon\Carbon;
use App\Mail\OrderConfirmationMail;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    // Phương thức hiển thị form đặt hàng
    public function create(Request $request)
    {
        $product = Product::find($request->input('product_id'));
        $quantity = $request->input('quantity', 1); // Mặc định là 1 nếu không có số lượng được cung cấp
    
        return view('Sanpham.order', [
            'product_name' => $product->product_name,
            'price' => $product->price,
            'quantity' => $quantity, // Truyền $quantity vào view
            'product_id' => $product->product_id
        ]);
    }
    

    // Phương thức xử lý lưu đơn hàng
// Phương thức xử lý lưu đơn hàng
public function store(Request $request)
{
    // Kiểm tra người dùng đã đăng nhập hay chưa
    if (!Session::has('user')) {
        return redirect()->route('login.form')->withErrors(['error' => 'Bạn cần đăng nhập để đặt hàng']);
    }

    // Lấy thông tin người dùng từ session
    $user = Session::get('user');
    $userId = $user->user_id ?? null;

    // Kiểm tra nếu không có user_id
    if (is_null($userId)) {
        return redirect()->route('login.form')->withErrors(['error' => 'Không tìm thấy thông tin tài khoản']);
    }

    // Xác thực dữ liệu đầu vào
    $request->validate([
        'buyer_name' => 'required|string|max:100',
        'email' => 'required|email|max:100',
        'phone_number' => 'nullable|string|max:15',
        'shipping_address' => 'required|string|max:255',
        'note' => 'nullable|string',
        'payment_method' => 'required|in:ATM,COD',
        'product_name' => 'required|string|max:100',
        'price' => 'required|numeric',
        'product_id' => 'required|integer',
        'quantity' => 'required|integer|min:1',
        'promo_code' => 'nullable|string',
    ]);

    // Tìm sản phẩm để trừ số lượng
    $product = Product::find($request->product_id);

    // Kiểm tra số lượng tồn kho
    if ($product->stock_quantity < $request->quantity) {
        return redirect()->back()->withErrors(['error' => 'Số lượng sản phẩm không đủ trong kho']);
    }

    // Tính toán tổng giá dựa trên số lượng
    $totalAmount = $request->price * $request->quantity;

    // Kiểm tra mã khuyến mãi nếu có
    if ($request->promo_code) {
        $promo = PromoCode::where('code', $request->promo_code)
            ->where('expiry_date', '>=', now())
            ->where('product_id', $request->product_id)
            ->first();

        if ($promo) {
            $totalAmount -= $promo->discount;
            $totalAmount = max($totalAmount, 0);
        } else {
            return redirect()->back()->withErrors(['error' => 'Mã giảm giá không hợp lệ hoặc không áp dụng cho sản phẩm này']);
        }
    }

    // Lưu thông tin đơn hàng vào cơ sở dữ liệu
    $order = Order::create([
        'user_id' => $userId,
        'buyer_name' => $request->buyer_name,
        'email' => $request->email,
        'phone_number' => $request->phone_number,
        'shipping_address' => $request->shipping_address,
        'note' => $request->note,
        'payment_method' => $request->payment_method,
        'product_name' => $request->product_name,
        'price' => $request->price,
        'quantity' => $request->quantity,
        'product_id' => $request->product_id,
        'total_amount' => $totalAmount,
    ]);

    // Cập nhật số lượng tồn kho
    $product->stock_quantity -= $request->quantity;
    $product->save();

    // Gửi email xác nhận đơn hàng
    Mail::to($request->email)->send(new OrderConfirmationMail($order));

    return redirect()->route('order.success')->with('success', 'Đơn hàng đã được đặt thành công!');
}
    

    // Hiển thị tất cả các đơn hàng trong admin
    public function index()
    {
        // Lấy tất cả các đơn hàng từ bảng Orders
        $orders = Order::all();

        // Truyền dữ liệu tới view admin.order
        return view('admin.order', ['orders' => $orders]);
    }

    // Lấy danh sách đơn hàng của người dùng hiện tại
    public function userOrders()
    {
        // Lấy user hiện tại từ session
        $user = Session::get('user');
        
        if (!$user) {
            return redirect()->route('login.form');
        }

        // Lấy danh sách đơn hàng theo user_id
        $orders = Order::where('user_id', $user->user_id)->get();

        // Truyền dữ liệu đơn hàng đến view
        return view('sanpham.user_orders', ['orders' => $orders]);
    }

    // Cập nhật trạng thái đơn hàng trong admin
    public function updateStatus(Request $request, $order_id)
    {
        // Lấy đơn hàng bằng order_id
        $order = Order::where('order_id', $order_id)->first();
        
        if ($order) {
            // Cập nhật trạng thái đơn hàng
            $order->status = $request->input('status');
            $order->save();
            
            return redirect()->route('admin.orders')->with('success', 'Trạng thái đơn hàng đã được cập nhật.');
        } else {
            return redirect()->route('admin.orders')->with('error', 'Không tìm thấy đơn hàng.');
        }
    }

    // Hiển thị chi tiết đơn hàng theo id
    public function details($id)
    {
        // Lấy thông tin chi tiết đơn hàng
        $order = Order::findOrFail($id);

        // Truyền thông tin đơn hàng sang view
        return view('sanpham.order_details', compact('order'));
    }

    // Phương thức xác nhận đơn hàng
    public function placeOrder(Request $request)
    {
        // Xử lý logic xác nhận đơn hàng (có thể kiểm tra thêm nếu cần)
        return redirect()->route('order.success');
    }
    public function showOrderDetails($id)
{
    // Tìm đơn hàng theo order_id
    $order = Order::findOrFail($id);

    // Trả về view chi tiết đơn hàng với dữ liệu của đơn hàng
    return view('admin.order_details', compact('order'));
}

  


}

