@extends('layout1.master')
@section('content') 
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý kho hàng
                <small>List</small>
            </h1>
        </div>
      
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Ảnh sản phẩm</th> <!-- Thêm cột cho ảnh sản phẩm -->
                    <th>Tên sản phẩm</th>
                    <th>Số lượng hiện tại</th>
                    <th>Thêm số lượng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        <img src="{{ asset('images/' . $product->hinhanh) }}" alt="{{ $product->product_name }}" width="70" height="70"> <!-- Hiển thị ảnh -->
                    </td>
                    <td>{{ $product->product_name }}</td>
                    <td>{{ $product->stock_quantity }}</td>
                    <td>
                        <form action="{{ route('warehouse.increase', $product->product_id) }}" method="POST">
                            @csrf
                            <div class="input-group">
                                <input type="number" name="quantity" class="form-control" placeholder="Số lượng" min="1" required>
                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-primary">Cập nhật </button>
                                </div>
                            </div>
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
@endsection
<style>
    /* Container */
.container-fluid {
    background-color: #f7f9fc;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề trang */
.page-header {
    font-family: 'Poppins', sans-serif;
    color: #2c3e50;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 30px;
    border-bottom: 2px solid #3498db;
}

.page-header small {
    font-size: 1.2rem;
    color: #7f8c8d;
    font-weight: 300;
}

/* Bảng sản phẩm */
.table {
    width: 100%;
    background-color: #fff;
    border-collapse: collapse;
    border-radius: 10px;
    overflow: hidden;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
}

.table thead {
    background-color: #3498db;
    color: #fff;
}

.table thead th {
    padding: 15px;
    text-align: center;
    font-weight: 600;
}

.table tbody tr {
    border-bottom: 1px solid #ecf0f1;
    transition: background-color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #ecf0f1;
}

.table tbody td {
    padding: 15px;
    text-align: center;
    vertical-align: middle;
}

/* Ảnh sản phẩm */
.table tbody img {
    border-radius: 10px;
    object-fit: cover;
    transition: transform 0.3s ease;
}

.table tbody img:hover {
    transform: scale(1.1);
}

/* Form số lượng */
.input-group {
    display: flex;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
}

.input-group input {
    border: 1px solid #ddd;
    padding: 10px;
    font-size: 1rem;
    border-radius: 0;
}

.input-group .input-group-append button {
    background-color: #3498db;
    color: #fff;
    padding: 10px 20px;
    border: none;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.input-group .input-group-append button:hover {
    background-color: #2980b9;
    transform: translateY(-2px);
}

/* Hiệu ứng thông báo */
.alert-success {
    background-color: #2ecc71;
    color: #fff;
    border: none;
    border-radius: 8px;
    padding: 15px;
    font-size: 1.1rem;
    text-align: center;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        font-size: 2rem;
    }

    .input-group {
        flex-direction: column;
    }

    .input-group input {
        margin-bottom: 10px;
    }

    .btn {
        width: 100%;
    }
}

</style>