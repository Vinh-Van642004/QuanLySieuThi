@extends('layout1.master')

@section('content')
<div class="container-fluid product-edit-page">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <h1 class="page-header text-center">Chỉnh Sửa Sản Phẩm</h1>
            <form action="{{ route('admin.products.update', $product->product_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="product_name">Tên sản phẩm</label>
                    <input type="text" class="form-control" id="product_name" name="product_name" value="{{ $product->product_name }}" required />
                </div>

                <div class="form-group">
                    <label for="price">Giá</label>
                    <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required />
                </div>

                <div class="form-group">
                    <label for="category_id">Danh mục</label>
                    <select class="form-control" id="category_id" name="category_id">
                        @foreach($categories as $category)
                            <option value="{{ $category->category_id }}" {{ $product->category_id == $category->category_id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="current_image">Ảnh hiện tại</label>
                    @if($product->hinhanh)
                        <img src="{{ asset('images/' . $product->hinhanh) }}" alt="Product Image" class="img-thumbnail" width="200">
                    @else
                        <p>Chưa có ảnh</p>
                    @endif
                </div>

                <div class="form-group">
                    <label for="hinhanh">Thay đổi ảnh</label>
                    <input type="file" class="form-control-file" id="hinhanh" name="hinhanh">
                </div>

                <div class="form-group">
                    <label for="description">Mô tả sản phẩm</label>
                    <textarea class="form-control" id="description" name="description" rows="4">{{ $product->description }}</textarea>
                </div>

                <div class="form-group text-center">
                    <button type="submit" class="btn btn-success btn-lg">Cập Nhật Sản Phẩm</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
<style>
    /* Tổng thể */
.container-fluid.product-edit-page {
    background-color: #f8f9fa;
}

.page-header {
    font-family: 'Roboto', sans-serif;
    font-size: 2.5rem;
    font-weight: 700;
    color: #2c3e50;
    margin-bottom: 30px;
    text-transform: uppercase;
}

/* Form Elements */
.form-group label {
    font-size: 1.2rem;
    color: #34495e;
    margin-bottom: 10px;
    font-weight: 500;
}

.form-control, .form-control-file {
    border-radius: 8px;
    padding: 15px;
    font-size: 1.1rem;
    color: #2c3e50;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
    transition: all 0.3s ease;
}

.form-control:focus {
    border-color: #2980b9;
    box-shadow: 0 0 10px rgba(41, 128, 185, 0.2);
}

/* Nút bấm */
.btn-success {
    background-color: #27ae60;
    border: none;
    padding: 12px 40px;
    font-size: 1.2rem;
    font-weight: bold;
    border-radius: 50px;
    color: white;
    transition: background-color 0.3s ease, box-shadow 0.2s ease;
}

.btn-success:hover {
    background-color: #2ecc71;
    box-shadow: 0 5px 15px rgba(46, 204, 113, 0.5);
}

/* Hình ảnh sản phẩm */
.img-thumbnail {
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    margin-top: 15px;
}

.img-thumbnail:hover {
    transform: scale(1.05);
    transition: transform 0.3s ease;
}

/* Responsive */
@media (max-width: 768px) {
    .container-fluid.product-edit-page {
        padding: 30px;
    }

    .page-header {
        font-size: 2rem;
    }

    .btn-success {
        padding: 10px 30px;
        font-size: 1.1rem;
    }
}

</style>