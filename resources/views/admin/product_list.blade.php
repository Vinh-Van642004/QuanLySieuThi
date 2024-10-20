@extends('layout1.master')
@section('content')	


<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Product
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Stock Quantity</th> <!-- Thêm cột số lượng -->
                    <th>Delete</th>
                    <th>Edit</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                    <tr class="odd gradeX" align="center">
                        <td>{{ $product->product_id }}</td>
                        <td>{{ $product->product_name }}</td>
                        <td>{{ number_format($product->price, 0, ',', '.') }} VNĐ</td>
                        <td>{{ $product->description }}</td>
                        <td>
                            @if($product->hinhanh)
                                <img src="{{ asset('images/' . $product->hinhanh) }}" width="100" alt="{{ $product->product_name }}">
                            @else
                                No image
                            @endif
                        </td>
                        <td>{{ $product->stock_quantity }}</td> <!-- Hiển thị số lượng sản phẩm -->
                        <td class="center">
                            <form action="{{ route('admin.products.destroy', $product->product_id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                        <td class="center">
                            <i class="fa fa-pencil fa-fw"></i> 
                            <a href="{{ route('admin.products.edit', $product->product_id) }}">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

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
            padding: 20px;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9f9f9;
        }

        /* Header trang */
        .page-header {
            text-align: center;
            margin-bottom: 40px;
        }

        .page-header h1 {
            font-size: 2.5rem;
            font-weight: bold;
            color: #333;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }

        .page-header h1::after {
            content: '';
            width: 60px;
            height: 4px;
            background-color: #3498db;
            position: absolute;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
            border-radius: 2px;
        }

        /* Bảng dữ liệu */
        .table {
            width: 100%;
            margin: 20px auto;
            border-collapse: separate;
            border-spacing: 0 15px;
        }

        /* Màu đen cho chữ trong phần thead */
        .table thead th {
            background-color: #1abc9c;
            color: #000; /* Đổi màu chữ thành đen */
            padding: 20px;
            text-align: center;
            font-size: 1rem;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
            text-transform: uppercase;
            letter-spacing: 1px;
        }


        .table tbody td {
            background-color: #fff;
            color: #555;
            padding: 15px;
            text-align: center;
            vertical-align: middle;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            border-bottom: 4px solid transparent;
        }

        .table tbody tr {
            transition: all 0.3s ease;
        }

        /* Hiệu ứng hover */
        .table tbody tr:hover {
            background-color: #ecf0f1;
            transform: translateY(-5px);
        }

        .table tbody tr:hover td {
            border-bottom: 4px solid #3498db;
        }

        /* Hình ảnh sản phẩm */
        .table img {
            border-radius: 8px;
            transition: all 0.3s ease;
        }

        .table img:hover {
            transform: scale(1.1);
        }

        /* Các nút */
        .btn {
            padding: 8px 16px;
            border-radius: 5px;
            font-size: 0.9rem;
            text-transform: uppercase;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .btn-danger {
            background-color: #e74c3c;
            color: #fff;
            border: none;
        }

        .btn-danger:hover {
            background-color: #c0392b;
            transform: scale(1.05);
        }

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

</style>