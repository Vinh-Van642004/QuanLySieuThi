@extends('layout1.master')
@section('content') 
<div class="container-fluid">
    <h1 class="page-header">Danh sách Danh mục</h1>

    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>ID Danh mục</th>
                <th>Tên danh mục</th>
                <th>Ảnh</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
            <tr>
                <td data-label="ID Danh mục">{{ $category->category_id }}</td>
                <td data-label="Tên danh mục">{{ $category->category_name }}</td>
                <td data-label="Ảnh">
                    @if($category->anh)
                        <img src="{{ asset('images/'.$category->anh) }}" alt="{{ $category->category_name }}" style="width: 100px; height: auto;">
                    @else
                        <span>Chưa có ảnh</span>
                    @endif
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection

<style>
    /* Định dạng tổng quát */
.container-fluid {
    max-width: 1200px;
    margin: auto;
    padding: 20px;
    background-color: #fff; /* Nền sáng xanh nhạt */
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Hiệu ứng đổ bóng */
}

h1.page-header {
    font-size: 2.5rem;
    text-align: center;
    color: #4CAF50; /* Xanh lá tươi sáng */
    margin-bottom: 30px;
    font-weight: 600;
    font-family: 'Arial', sans-serif;
}

/* Bảng danh sách danh mục */
.table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 30px;
    background-color: #ffffff; /* Màu nền trắng */
    border-radius: 10px;
    overflow: hidden; /* Ẩn viền ngoài bo tròn */
}

.table thead {
    background-color: #4CAF50; /* Xanh lá tươi sáng */
    color: white;
    font-size: 1.2rem; /* Chữ lớn */
    font-weight: bold;
}

.table thead th {
    padding: 15px;
    text-align: center;
    font-family: 'Verdana', sans-serif;
}

.table tbody tr {
    transition: background-color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #f1f1f1; /* Màu nhạt khi hover */
}

.table tbody td {
    padding: 20px;
    text-align: center;
    font-size: 1.7rem; /* Tăng kích thước chữ */
    border-bottom: 1px solid #e0e0e0;
    font-family: 'Verdana', sans-serif;
}

/* Hình ảnh trong bảng */
.table tbody td img {
    border-radius: 8px;
    transition: transform 0.3s ease;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ cho ảnh */
}

.table tbody td img:hover {
    transform: scale(1.1); /* Hiệu ứng zoom khi hover */
}

.table tbody td span {
    font-style: italic;
    color: #888;
    font-size: 0.9rem;
}

/* Mobile responsive */
@media (max-width: 768px) {
    .table thead {
        display: none;
    }

    .table tbody td {
        display: block;
        text-align: right;
        padding-left: 50%;
        position: relative;
    }

    .table tbody td:before {
        content: attr(data-label);
        position: absolute;
        left: 10px;
        font-weight: bold;
        font-size: 1rem;
    }

    .table tbody tr {
        margin-bottom: 15px;
        display: block;
        border: 1px solid #ddd;
        border-radius: 10px;
        overflow: hidden;
    }

    .table tbody td img {
        width: 80px;
        height: auto;
    }
}

</style>