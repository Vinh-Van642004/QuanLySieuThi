@extends('layout.master')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Chi tiết đơn hàng #{{ $order->order_id }}</h1>
    
    <div class="row justify-content-center">
        <div class="col-lg-8"> 
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Thông tin đơn hàng</h5>
                    <p><strong>Tên người mua:</strong> {{ $order->buyer_name }}</p>
                    <p><strong>Email:</strong> {{ $order->email }}</p>
                    <p><strong>Số điện thoại:</strong> {{ $order->phone_number }}</p>
                    <p><strong>Địa chỉ giao hàng:</strong> {{ $order->shipping_address }}</p>
                    <p><strong>Ghi chú:</strong> {{ $order->note }}</p>
                    <p><strong>Tên sản phẩm:</strong> {{ $order->product_name }}</p>
                    <p><strong>Giá:</strong> {{ number_format($order->price, 0, ',', '.') }} đ</p>
                    <p><strong>Số lượng:</strong> {{ $order->quantity }}</p> 
                    <p><strong>Tổng tiền:</strong> {{ number_format($order->total_amount, 0, ',', '.') }} đ</p> 
                    <p><strong>Ngày đặt hàng:</strong> {{ $order->order_date }}</p>
                    <p><strong>Trạng thái:</strong> {{ $order->status }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


<style>
    .card {

        border: 1px solid #ddd;
        border-radius: 8px;
        padding: 20px;
        background-color: #f9f9f9;
        margin-top: 20px;
        width: 100%; 
    }
    .card-body p {
        margin: 10px 0;
    }
</style>
