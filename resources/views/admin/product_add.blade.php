@extends('layout1.master')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Product
                    <small>Add</small>
                </h1>
            </div>

            <div class="col-lg-7" style="padding-bottom:120px">
            <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label>Tên sản phẩm</label>
        <input class="form-control" name="product_name" placeholder="Please Enter Product Name" />
    </div>
    <div class="form-group">
        <label>Price</label>
        <input class="form-control" name="price" placeholder="Please Enter Price" />
    </div>
    <div class="form-group">
        <label>Category</label>
        <select class="form-control" name="category_id">
            @foreach($categories as $category)
                <option value="{{ $category->category_id }}">{{ $category->category_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="form-group">
        <label>Images</label>
        <input type="file" name="hinhanh">
    </div>
    <div class="form-group">
        <label>Product Description</label>
        <textarea class="form-control" rows="3" name="description"></textarea>
    </div>
    <button type="submit" class="btn btn-default">Add Product</button>
    <button type="reset" class="btn btn-default">Reset</button>
</form>

            </div>
        </div>
    </div>
@endsection
<style>
    /* Container chung */
.container-fluid {
    background-color: #f4f6f9;
    padding: 40px 20px;
    border-radius: 15px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

.page-header {
    font-family: 'Poppins', sans-serif;
    color: #333;
    margin-bottom: 40px;
    border-bottom: 2px solid #1abc9c;
}

.page-header small {
    font-weight: 300;
    color: #999;
}

/* Form nhóm */
.form-group label {
    font-size: 1.1rem;
    font-weight: 500;
    color: #555;
}

.form-group input,
.form-group select,
.form-group textarea {
    border-radius: 8px;
    border: 1px solid #ddd;
    padding: 10px 15px;
    font-size: 1rem;
    width: 100%;
    background-color: #fff;
    box-shadow: inset 0 2px 4px rgba(0, 0, 0, 0.05);
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: #1abc9c;
    box-shadow: 0 0 8px rgba(26, 188, 156, 0.3);
}

.form-group textarea {
    resize: none;
}

/* Nút bấm */
.btn {
    padding: 10px 20px;
    border-radius: 8px;
    border: none;
    font-size: 1rem;
    cursor: pointer;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-default {
    background-color: #1abc9c;
    color: #fff;
}

.btn-default:hover {
    background-color: #16a085;
    transform: translateY(-2px);
}

.btn-reset {
    background-color: #e74c3c;
    color: #fff;
}

.btn-reset:hover {
    background-color: #c0392b;
    transform: translateY(-2px);
}

.btn:focus {
    outline: none;
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
}

/* Hiệu ứng hover cho các phần tử */
.form-group input:hover,
.form-group select:hover,
.form-group textarea:hover {
    border-color: #1abc9c;
}

input[type="file"] {
    border: none;
    background-color: #f8f9fa;
    cursor: pointer;
    padding: 10px;
    font-size: 1rem;
    margin-top: 10px;
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        font-size: 1.8rem;
    }

    .btn {
        width: 100%;
        margin-bottom: 10px;
    }

    .col-lg-7 {
        padding-bottom: 20px;
    }
}

</style>