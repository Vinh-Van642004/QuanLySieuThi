@extends('layout1.master')

@section('content')

    <h2>Thêm Mã Giảm Giá</h2>

    <!-- Form thêm mã giảm giá -->
    <form action="{{ route('admin.promo_codes.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="id_code">ID Mã Giảm Giá</label>
            <input type="text" name="id_code" class="form-control" placeholder="Nhập ID mã giảm giá" value="{{ old('id_code') }}" required>
        </div>

        <div class="form-group">
            <label for="code">Mã Giảm Giá</label>
            <input type="text" name="code" class="form-control" placeholder="Nhập mã giảm giá" value="{{ old('code') }}" required>
        </div>

        <div class="form-group">
            <label for="discount">Giảm Giá (%)</label>
            <input type="number" name="discount" class="form-control" placeholder="Nhập giảm giá" value="{{ old('discount') }}" required>
        </div>

        <div class="form-group">
            <label for="expiry_date">Ngày Hết Hạn</label>
            <input type="date" name="expiry_date" class="form-control" value="{{ old('expiry_date') }}" required>
        </div>

        <div class="form-group">
            <label for="product_id">Sản Phẩm</label>
            <input type="number" name="product_id" class="form-control" placeholder="Nhập ID sản phẩm" value="{{ old('product_id') }}">
        </div>

        <div class="form-group">
            <label for="anhvc">Ảnh</label>
            <input type="file" name="anhvc" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Thêm Mã Giảm Giá</button>
    </form>

@endsection

@if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif