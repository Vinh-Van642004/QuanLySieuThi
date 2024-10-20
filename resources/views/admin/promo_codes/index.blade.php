@extends('layout1.master')

@section('content')

    <!-- Tiêu đề trang với style đẹp -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="text-primary">Danh Sách Mã Giảm Giá</h2>
        <!-- Nút thêm mã giảm giá với icon và hiệu ứng hover -->
        <a href="{{ route('admin.promo_codes.create') }}" class="btn btn-success d-flex align-items-center">
            <i class="fas fa-plus-circle mr-2"></i>Thêm Mã Giảm Giá
        </a>
    </div>

    <!-- Bảng hiển thị danh sách promo codes với phong cách hiện đại -->
    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-hover table-striped table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>ID</th>
                        <th>Mã Giảm Giá</th>
                        <th>Giảm Giá</th>
                        <th>Ngày Hết Hạn</th>
                        <th>ID Sản Phẩm</th>
                        <th>Ảnh</th>
                        <th>Chỉnh sửa</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($promoCodes as $promoCode)
                        <tr>
                            <td>{{ $promoCode->id_code }}</td>
                            <td>{{ $promoCode->code }}</td>
                            <td>{{ number_format($promoCode->discount, 0, ',', '.') }} đ</td>
                            <td>{{ \Carbon\Carbon::parse($promoCode->expiry_date)->format('d-m-Y') }}</td>
                            <td>{{ $promoCode->product_id }}</td>
                            <td>
                                <!-- Hiển thị ảnh của mã giảm giá với viền và hiệu ứng hover -->
                                @if($promoCode->anhvc)
                                    <img src="{{ asset('images/' . $promoCode->anhvc) }}" alt="Ảnh mã giảm giá" class="img-fluid rounded" style="max-width: 100px;">
                                @else
                                    <span class="text-muted">Không có ảnh</span>
                                @endif
                            </td>
                            <td>
                                <!-- Nút chỉnh sửa với hiệu ứng hover và icon -->
                                <a href="{{ route('admin.promo_codes.edit', $promoCode->id_code) }}" class="btn btn-primary d-flex align-items-center">
                                    <i class="fas fa-edit mr-2"></i>Chỉnh sửa
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
<style>
    /* Reset margin và padding */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    /* Thiết lập cho container */
    .container-fluid {
        padding: 30px;
        font-family: 'Poppins', sans-serif;
        background-color: #f0f1f6;
    }

    /* Tiêu đề trang */
    .page-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .page-header h1 {
        font-size: 3rem;
        font-weight: 700;
        color: #2c3e50;
        position: relative;
        display: inline-block;
        padding-bottom: 15px;
    }

    .page-header h1::after {
        content: '';
        width: 80px;
        height: 5px;
        background-color: #3498db;
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        border-radius: 3px;
    }

    /* Bảng dữ liệu */
    .table {
        width: 100%;
        margin: 0 auto;
        border-collapse: separate;
        border-spacing: 0 20px;
        border-radius: 12px;
        overflow: hidden;
    }

    /* Đầu bảng với màu sắc đẹp và các chữ in hoa */
    .table thead th {
        background-color: #3498db;
        color: #fff;
        padding: 12px 15px;
        text-align: center;
        font-size: 1.1rem;
        border-radius: 12px 12px 0 0;
        text-transform: uppercase;
        letter-spacing: 1.5px;
        font-weight: bold;
    }

    .table tbody td {
        background-color: #fff;
        color: #555;
        padding: 12px 15px;
        text-align: center;
        vertical-align: middle;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        border-bottom: 4px solid transparent;
    }

    /* Hiệu ứng hover cho dòng */
    .table tbody tr {
        transition: all 0.3s ease;
    }

    .table tbody tr:hover {
        background-color: #ecf0f1;
        transform: translateY(-5px);
    }

    .table tbody tr:hover td {
        border-bottom: 4px solid #3498db;
    }

    /* Hiển thị ảnh với hiệu ứng */
    .table img {
        border-radius: 8px;
        max-width: 100px;
        transition: all 0.3s ease;
    }

    .table img:hover {
        transform: scale(1.1);
    }

    /* Các nút với hiệu ứng hover */
    .btn {
        padding: 10px 20px;
        border-radius: 5px;
        font-size: 0.95rem;
        text-transform: uppercase;
        transition: all 0.3s ease;
        cursor: pointer;
    }

    .btn-success {
        background-color: #3498db;
        color: #fff;
        border: none;
    }

    .btn-success:hover {
        background-color: #3498db;
        transform: scale(1.05);
    }

    .btn-primary {
        background-color: #3498db;
        color: #fff;
        border: none;
    }

    .btn-primary:hover {
        background-color: #2980b9;
        transform: scale(1.05);
    }

    /* Liên kết */
    a {
        text-decoration: none;
        color: #3498db;
        font-weight: bold;
    }

    a:hover {
        color: #2980b9;
        text-decoration: underline;
    }

    /* Thông báo thành công và lỗi */
    .alert {
        margin: 20px 0;
        padding: 15px;
        border-radius: 5px;
        text-align: center;
        font-weight: bold;
    }

    .alert-success {
        background-color: #2ecc71;
        color: #fff;
    }

    .alert-danger {
        background-color: #e74c3c;
        color: #fff;
    }

        /* Thiết kế nút thêm mã giảm giá với hiệu ứng hover */
        .btn-success {
            display: flex;
            align-items: center;
            padding: 10px 20px;
            border-radius: 5px;
            background-color: #3498db;
            color: white;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn-success:hover {
            background-color: #3498db;
        }

        .btn-success i {
            margin-right: 8px;
        }

</style>

