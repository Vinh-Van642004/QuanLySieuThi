@extends('layout1.master')
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Chi tiết
                <small>Đơn hàng #{{ $order->order_id }}</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-bordered modern-table">
            <tr>
                <th>Tên khách hàng:</th>
                <td>{{ $order->buyer_name }}</td>
            </tr>
            <tr>
                <th>Email:</th>
                <td>{{ $order->email }}</td>
            </tr>
            <tr>
                <th>Số điện thoại:</th>
                <td>{{ $order->phone_number }}</td>
            </tr>
            <tr>
                <th>Địa chỉ giao hàng:</th>
                <td>{{ $order->shipping_address }}</td>
            </tr>
            <tr>
                <th>Tên sản phẩm:</th>
                <td>{{ $order->product_name }}</td>
            </tr>
            <tr>
                <th>Giá:</th>
                <td>{{ number_format($order->price, 0, ',', '.') }} đ</td>
            </tr>
            <tr>
                <th>Số lượng:</th>
                <td>{{ $order->quantity }}</td>
            </tr>
            <tr>
                <th>Tổng tiền:</th>
                <td>{{ number_format($order->total_amount, 0, ',', '.') }} đ</td>
            </tr>
            <tr>
                <th>Ghi chú:</th>
                <td>{{ $order->note }}</td>
            </tr>
            <tr>
                <th>Phương thức thanh toán:</th>
                <td>{{ $order->payment_method }}</td>
            </tr>
            <tr>
                <th>Trạng thái:</th>
                <td>{{ $order->status }}</td>
            </tr>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<style>
    body {
        font-family: 'Arial', sans-serif;
        background-color: #f4f4f4;
        color: #333;
    }

    .page-header {
        margin-bottom: 20px;
        font-size: 24px;
        color: #333;
    }

    .table {
        margin: 20px 0;
        background-color: #fff;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        overflow: hidden;
    }

    .modern-table th {
        background-color: #333;
        color: white;
        padding: 15px;
        text-align: left;
    }

    .modern-table td {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        font-size: 16px;
    }

    .modern-table tr:hover {
        background-color: #f1f1f1;
    }

    @media (max-width: 768px) {
        .table {
            width: 100%;
        }
    }
</style>
@endsection
