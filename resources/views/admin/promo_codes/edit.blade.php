@extends('layout1.master')

@section('content')
    <div class="edit-promo-code-container">
        <h2>Chỉnh sửa mã giảm giá</h2>

        <form action="{{ route('admin.promo_codes.update', $promoCode->id_code) }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label>Mã giảm giá:</label>
                <input type="text" name="code" value="{{ $promoCode->code }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Giảm giá:</label>
                <input type="number" name="discount" value="{{ $promoCode->discount }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Ngày hết hạn:</label>
                <input type="date" name="expiry_date" value="{{ $promoCode->expiry_date }}" class="form-control" required>
            </div>
            <div class="form-group">
                <label>ID Sản phẩm:</label>
                <input type="number" name="product_id" value="{{ $promoCode->product_id }}" class="form-control">
            </div>
            <div class="form-group">
                <label>Ảnh hiện tại:</label>
                @if($promoCode->anhvc)
                    <img src="{{ asset('images/' . $promoCode->anhvc) }}" alt="Ảnh mã giảm giá" width="100">
                @else
                    Không có ảnh
                @endif
            </div>
            <div class="form-group">
                <label>Thay đổi ảnh:</label>
                <input type="file" name="anhvc" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
        </form>
    </div>

    <style>
        .edit-promo-code-container {
            padding: 20px;
        }

        .edit-promo-code-container h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        .form-group input {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .btn-primary {
            background-color: #007bff;
            color: #fff;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
@endsection
