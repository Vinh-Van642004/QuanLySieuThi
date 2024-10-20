@extends('layout.master')

@section('content')
<div class="container">
    <h1 class="text-center my-4">Đơn hàng của bạn</h1>

    @if($orders->isEmpty())
        <p class="text-center">Bạn chưa có đơn hàng nào.</p>
    @else
        <table class="table table-bordered table-hover text-center">
            <thead class="thead-dark">
                <tr>
                    <th>Mã đơn hàng</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá</th>
                    <th>Ngày đặt hàng</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết</th> <!-- Cột thêm nút chi tiết -->
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                    <tr>
                        <td>{{ $order->order_id }}</td>
                        <td>{{ $order->product_name }}</td>
                        <td>{{ number_format($order->price, 0, ',', '.') }} đ</td>
                        <td>{{ $order->order_date }}</td>
                        <td>
                            @if($order->status === 'Chờ Duyệt')
                                <span class="badge badge-warning">{{ $order->status }}</span>
                            @elseif($order->status === 'Đã Giao')
                                <span class="badge badge-success">{{ $order->status }}</span>
                            @elseif($order->status === 'Đã Hủy')
                                <span class="badge badge-danger">{{ $order->status }}</span>
                            @elseif($order->status === 'Đang vận chuyển')
                                <span class="badge badge-info">{{ $order->status }}</span>
                            @endif
                        </td>
                        <td>
                            <!-- Nút chi tiết -->
                            <a href="{{ route('order.details', $order->order_id) }}" class="btn btn-primary">
                                Chi tiết
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
@endsection

<style>
    .container {
        max-width: 900px;
        margin: auto;
    }

    .table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    .table th, .table td {
        padding: 12px;
        border: 1px solid #ddd;
    }

    .table th {
        background-color: #f2f2f2;
    }

    .table-hover tbody tr:hover {
        background-color: #f1f1f1;
    }

    .badge {
        padding: 5px 10px;
        font-size: 14px;
        border-radius: 4px;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #fff;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff;
    }

    .badge-info {
        background-color: #17a2b8;
        color: #fff;
    }
</style>
