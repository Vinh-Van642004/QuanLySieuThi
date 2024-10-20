@extends('layout1.master')
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách
                <small>Đơn hàng</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày đặt hàng</th>
                    <th>Số lượng</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chi tiết đơn hàng</th>
                    <th>Cập nhật trạng thái</th> <!-- Thêm cột cập nhật trạng thái -->
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr class="odd gradeX" align="center">
                    <td>{{ $order->order_id }}</td>
                    <td>{{ $order->buyer_name }}</td>
                    <td>{{ $order->order_date }}</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ number_format($order->total_amount, 0, ',', '.') }} đ</td>
                    <td>
                        <span class="status-label {{ strtolower(str_replace(' ', '-', \Illuminate\Support\Str::ascii($order->status))) }}">
                            {{ $order->status }}
                        </span>
                    </td>
                    <td>
                        <a href="{{ route('admin.orderDetails', $order->order_id) }}" class="btn btn-info">Xem chi tiết</a>
                    </td>
                    <td>
                        <!-- Form cập nhật trạng thái -->
                        <form action="{{ route('admin.updateStatus', $order->order_id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <select name="status" onchange="this.form.submit()">
                                <option value="Chờ Duyệt" {{ $order->status == 'Chờ Duyệt' ? 'selected' : '' }}>Chờ Duyệt</option>
                                <option value="Đang vận chuyển" {{ $order->status == 'Đang vận chuyển' ? 'selected' : '' }}>Đang vận chuyển</option>
                                <option value="Đã Giao" {{ $order->status == 'Đã Giao' ? 'selected' : '' }}>Đã Giao</option>
                                <option value="Đã Hủy" {{ $order->status == 'Đã Hủy' ? 'selected' : '' }}>Đã Hủy</option>
                            </select>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
<style>
    /* Đặt nền gradient cho phần nền container */
.container-fluid {
    background: linear-gradient(135deg, #f8f9fa, #ececec);
    padding: 30px;
    border-radius: 10px;
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề trang */
h1.page-header {
    font-family: 'Poppins', sans-serif;
    font-weight: 700;
    font-size: 3rem; /* Tăng kích thước chữ */
    text-align: center;
    margin-bottom: 30px;
    color: #343a40;
    letter-spacing: 2px;
}

/* Bảng danh sách đơn hàng */
table {
    width: 100%;
    border-collapse: collapse;
    background-color: #fff;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
}


/* Thiết kế header của bảng */
table thead th {
    background-color: #6c757d;
    color: black; /* Chỉnh màu chữ thành đen */
    font-weight: 600;
    text-transform: uppercase;
    padding: 20px; /* Tăng khoảng cách padding */
    font-size: 1.2rem; /* Tăng kích thước chữ */
    border-bottom: 3px solid #dee2e6;
}


/* Thiết kế các hàng trong bảng */
table tbody tr {
    border-bottom: 1px solid #dee2e6;
    transition: background-color 0.3s ease;
}

table tbody tr:hover {
    background-color: #f1f3f5;
}

/* Các ô trong bảng */
table tbody td {
    padding: 20px; /* Tăng khoảng cách padding */
    color: #495057;
    font-size: 1.5rem; /* Tăng kích thước chữ */
    vertical-align: middle;
}

/* Căn chỉnh nút "Xem chi tiết" */
.btn-info {
    background-color: #17a2b8;
    border-color: #17a2b8;
    color: #fff;
    border-radius: 20px;
    padding: 12px 25px; /* Tăng kích thước nút */
    font-size: 1.1rem; /* Tăng kích thước chữ nút */
    transition: all 0.3s ease;
}

.btn-info:hover {
    background-color: #138496;
    border-color: #117a8b;
    transform: scale(1.05);
}

/* Thiết kế cho dropdown trạng thái */
select[name="status"] {
    background-color: #e9ecef;
    border: 1px solid #ced4da;
    padding: 12px 20px; /* Tăng padding */
    border-radius: 20px;
    font-size: 1.5rem; /* Tăng kích thước chữ */
    color: #495057;
    transition: border-color 0.3s ease;
}

select[name="status"]:focus {
    border-color: #80bdff;
    outline: none;
    box-shadow: 0 0 5px rgba(0, 123, 255, 0.25);
}

/* Tùy chọn của dropdown */
select[name="status"] option {
    color: #495057;
}

/* Responsive cho thiết bị di động */
@media (max-width: 768px) {
    h1.page-header {
        font-size: 2.5rem;
    }

    table thead th, table tbody td {
        font-size: 1rem; /* Điều chỉnh kích thước chữ nhỏ hơn cho màn hình nhỏ */
        padding: 15px;
    }

    .btn-info {
        padding: 10px 20px;
        font-size: 1rem;
    }

    select[name="status"] {
        padding: 10px 15px;
        font-size: 1rem;
    }
}
/* Trạng thái Chờ Duyệt - Màu vàng */
.status-label.cho-duyet {
    background-color: #ffc107;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}

/* Trạng thái Đang vận chuyển - Màu xanh */
.status-label.dang-van-chuyen {
    background-color: #17a2b8;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}

/* Trạng thái Đã Giao - Màu xanh lá */
.status-label.da-giao {
    background-color: #28a745;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}

/* Trạng thái Đã Hủy - Màu đỏ */
.status-label.da-huy {
    background-color: #dc3545;
    color: #fff;
    padding: 5px 10px;
    border-radius: 5px;
    font-weight: bold;
}



</style>
@endsection
