<?php

use Illuminate\Support\Facades\Route;
// Route::get('/com', function () {
//     return view('sanpham.category ');
// });
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\PromoCodeController;
use App\Http\Controllers\AccountController;
//web
Route::get('/trangchu', [ProductController::class, 'index'])->name('sanpham.trangchu');
Route::get('/product/{id}', [ProductController::class, 'show'])->name('product.show');
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
Route::post('/login', [AuthController::class, 'login'])->name('login');
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
Route::post('/register', [AuthController::class, 'register'])->name('register');
Route::get('/order', [OrderController::class, 'create'])->name('order.create');
Route::post('/order', [OrderController::class, 'store'])->name('order.store');
Route::get('/order/{id}/details', [OrderController::class, 'details'])->name('order.details');
Route::get('/orders/{user_id}', [OrderController::class, 'getUserOrders'])->name('orders.user');
Route::post('/add-to-cart', [CartController::class, 'addToCart'])->name('cart.add');
Route::get('/cart-count', [CartController::class, 'getCartCount'])->name('cart.count');
Route::get('/viewcart', [CartController::class, 'viewCart'])->name('cart.view');
Route::post('/remove-from-cart/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/remove/{id}', [CartController::class, 'removeFromCart'])->name('cart.remove');
Route::post('/cart/clear', [CartController::class, 'clearCart'])->name('cart.clear');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/order-success', function () {return view('sanpham.order_success');})->name('order.success');
Route::get('/user-orders', [OrderController::class, 'userOrders'])->name('user.orders');
Route::get('/contact', [ContactController::class, 'showForm'])->name('contact.form');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');
Route::get('/category/{id}', [ProductController::class, 'showCategory'])->name('category.show');
Route::get('/vouchers', [VoucherController::class, 'index'])->name('vouchers.index');
Route::get('/vouchers/search', [VoucherController::class, 'search'])->name('voucher.search');
Route::get('/sanpham', [ProductController::class, 'index'])->name('product.index');
Route::get('/filter-products', [ProductController::class, 'filterProducts'])->name('filter.products');
Route::get('/my-account', [AccountController::class, 'showAccountInfo'])->name('my-account');
Route::get('/my-account/edit', [AccountController::class, 'editAccountInfo'])->name('edit.account');
Route::post('/my-account/update', [AccountController::class, 'updateAccountInfo'])->name('update.account');


Route::middleware(['admin.auth'])->group(function () {
//admin----------------------------------------------------------------------------------------------------
Route::get('/admin/promo-codes', [PromoCodeController::class, 'index'])->name('admin.promo_codes.index');
Route::get('/admin/promo-codes/create', [PromoCodeController::class, 'create'])->name('admin.promo_codes.create');
Route::post('/admin/promo-codes/store', [PromoCodeController::class, 'storePromoCode'])->name('admin.promo_codes.store');
Route::get('/admin/promo-codes/edit/{id_code}', [PromoCodeController::class, 'edit'])->name('admin.promo_codes.edit');
Route::post('/admin/promo-codes/update/{id_code}', [PromoCodeController::class, 'update'])->name('admin.promo_codes.update');
Route::get('admin/order/{id}', [OrderController::class, 'showOrderDetails'])->name('admin.orderDetails');
Route::get('/admin/categories', [CategoryController::class, 'index'])->name('admin.categories.index');
Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
Route::get('/admin/products', [AdminController::class, 'productList'])->name('admin.products');
Route::get('/admin/products/add', [AdminController::class, 'showAddForm'])->name('admin.products.add');
Route::post('/admin/products/store', [AdminController::class, 'storeProduct'])->name('admin.products.store');
Route::delete('/admin/products/{id}', [AdminController::class, 'destroy'])->name('admin.products.destroy');
Route::get('/admin/products/edit/{id}', [AdminController::class, 'edit'])->name('admin.products.edit');
Route::get('/admin/products/edit/{id}', [AdminController::class, 'edit'])->name('admin.products.edit');
Route::put('/admin/products/{id}', [AdminController::class, 'update'])->name('admin.products.update');
Route::get('/admin/orders', [OrderController::class, 'index'])->name('admin.orders');
Route::get('/admin/contact', [ContactController::class, 'index'])->name('admin.contact');
Route::get('/admin/contact/reply/{id}', [ContactController::class, 'replyForm'])->name('admin.contact.reply');
Route::post('/admin/contact/reply/{id}', [ContactController::class, 'sendReply'])->name('admin.contact.sendReply');
Route::put('/admin/order/update-status/{id}', [OrderController::class, 'updateStatus'])->name('admin.updateStatus');
Route::get('/warehouse', [ProductController::class, 'warehouse'])->name('warehouse');
Route::post('/warehouse/increase/{product_id}', [ProductController::class, 'increaseFromWarehouse'])->name('warehouse.increase');
Route::get('/admin/users', [UserController::class, 'index'])->name('admin.user');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.users.destroy');

});

Route::get('/admin/login', [AdminLoginController::class, 'showLoginForm'])->name('admin.login');
Route::post('/admin/login', [AdminLoginController::class, 'login'])->name('admin.login.submit');
Route::post('/admin/logout', [AdminLoginController::class, 'logout'])->name('admin.logout');


