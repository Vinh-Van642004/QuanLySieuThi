<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $productId = $request->input('product_id');
        $product = Product::find($productId);

        if (!$product) {
            return response()->json(['error' => 'Product not found'], 404);
        }

        // Get the current cart from the session
        $cart = session()->get('cart', []);

        // Check if the product is already in the cart
        if (isset($cart[$productId])) {
            $cart[$productId]['quantity']++;
        } else {
            // Add product to cart
            $cart[$productId] = [
                'name' => $product->product_name,
                'quantity' => 1,
                'price' => $product->price,
                'image' => $product->hinhanh,
            ];
        }

        // Save the cart back to the session
        session()->put('cart', $cart);

        // Return the updated cart count
        return response()->json(['cart_count' => count($cart)]);
    }

    public function getCartCount()
    {
        $cart = session()->get('cart', []);
        return response()->json(['cart_count' => count($cart)]);
    }
    public function viewCart()
{
    return view('Sanpham.viewcart');
}
public function removeFromCart($id)
{
    $cart = session()->get('cart');

    if (isset($cart[$id])) {
        unset($cart[$id]);
        session()->put('cart', $cart);
    }

    return redirect()->route('cart.view')->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
}

public function clearCart()
{
    session()->forget('cart');

    return redirect()->route('cart.view')->with('success', 'Giỏ hàng đã được xóa.');
}
public function updateQuantity(Request $request, $id)
{
    $cart = session()->get('cart');

    if ($request->type == 'add') {
        $cart[$id]['quantity'] += 1;
    } elseif ($request->type == 'sub' && $cart[$id]['quantity'] > 1) {
        $cart[$id]['quantity'] -= 1;
    }

    session()->put('cart', $cart);

    return redirect()->route('cart.view');
}
            // Phương thức hiển thị giỏ hàng
public function showCart()
{
    // Lấy tổng số tiền từ session
    $totalAmount = session('total_amount', 0); // Mặc định là 0 nếu không có

    return view('Sanpham.cart', [
        'total_amount' => $totalAmount,
        // Thêm các biến khác nếu cần
    ]);
}


}
