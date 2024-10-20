@extends('layout.master')

@section('content')
    <h2>Chỉnh sửa thông tin tài khoản</h2>

    <form action="{{ route('update.account') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="first_name">Họ:</label>
            <input type="text" name="first_name" id="first_name" value="{{ $customer->first_name ?? '' }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="last_name">Tên:</label>
            <input type="text" name="last_name" id="last_name" value="{{ $customer->last_name ?? '' }}" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone_number">Số điện thoại:</label>
            <input type="text" name="phone_number" id="phone_number" value="{{ $customer->phone_number ?? '' }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="address">Địa chỉ:</label>
            <input type="text" name="address" id="address" value="{{ $customer->address ?? '' }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="city">Thành phố:</label>
            <input type="text" name="city" id="city" value="{{ $customer->city ?? '' }}" class="form-control">
        </div>

        <div class="form-group">
    <label for="email">Email:</label>
    <input type="email" name="email" id="email" value="{{ $customer->email ?? '' }}" class="form-control">
</div>


        <div class="form-group">
            <label for="country">Quốc gia:</label>
            <input type="text" name="country" id="country" value="{{ $customer->country ?? '' }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Cập nhật</button>
    </form>
@endsection
