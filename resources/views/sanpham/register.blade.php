  
    <title>Đăng ký</title>
    <link rel="stylesheet" href="https://mbmart.com.vn/vendor/core/user/build/css/general/user.min.css?v=0.0.0.7.777">

@extends('layout.master')
@section('content') 

        <main class="main">
            
<div class="container">
    <div class="member-wrap w-100">
        <div class="row" id="register_row">
            <div class="auth-box">
                <h1 class="auth-title">Đăng ký</h1>
                
                <form action="{{ route('register') }}" method="POST" id="form-register" data-form="ajax" data-reload="true" class="auth-form" id="signup">
    @csrf <!-- Token bảo mật -->
    <div class="field-input">
        <input type="text" class="form-control" placeholder="Họ và tên*" value="" name="name" required>
        <p class="err_show null">Họ và tên không được để trống!</p>
    </div>
    <div class="field-input">
        <input type="email" class="form-control" placeholder="Email*" value="" name="email" required>
        <p class="err_show null">Email không được để trống!</p>
    </div>
    <div class="field-input">
        <input type="password" class="form-control" placeholder="Mật khẩu*" value="" name="password" required>
        <p class="err_show null">Mật khẩu không được để trống!</p>
    </div>
    <div class="field-input">
        <input type="password" class="form-control" placeholder="Nhập lại mật khẩu*" value="" name="password_confirmation" required>
        <p class="err_show null">Nhập lại mật khẩu không được để trống!</p>
    </div>
    <div class="field-check">
        <label for="accept" class="policy">
            <input type="checkbox" name="accept" id="accept" value="1">
            Tôi đồng ý với các điều khoản & quy định.
            <span class="checkmark"></span>
        </label>
    </div>
    <input type="submit" class="btn" name="submit" value="Đăng ký">
</form>

<!-- Hiển thị thông báo thành công -->
@if(session('success'))
    <p class="success">{{ session('success') }}</p>
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


                <p class="register">Bạn chưa có tài khoản? <a href="{{ route('login') }}">Đăng nhập</a> </p>
            </div>
        </div>
    </div>
</div>
    </body>
</html>
@endsection