 
    <title>Đăng nhập</title>
	<meta name=description content="Đăng nhập">
    <link rel="stylesheet" href="https://mbmart.com.vn/vendor/core/user/build/css/general/user.min.css?v=0.0.0.7.777">
@extends('layout.master')
@section('content') 
    <main class="main">


        <div class="container">
            <div class="member-wrap w-100">
                <div class="row" id="register_row">
                    <div class="auth-box">
                        <h1 class="auth-title">Đăng nhập</h1>
                        
                        <form action="{{ route('login') }}" method="POST" data-form="ajax" data-reload="true" class="auth-form" id="login">
    @csrf <!-- Token bảo mật -->
    <div class="field-input">
        <input type="text" placeholder="Tên Đăng nhập" name="username" required>
    </div>
    <div class="field-input">
        <input type="password" placeholder="Mật khẩu" name="password" required>
    </div>
    <a class="forgot-pass" href="#forgot">Quên mật khẩu</a>
    <input type="submit" class="btn" name="submit" value="Đăng nhập">
</form>

<!-- Hiển thị lỗi nếu có -->
@if($errors->has('login_error'))
    <p class="error">{{ $errors->first('login_error') }}</p>
@endif

                        <p class="register">Bạn chưa có tài khoản? <a href="{{ route('register.form') }}">Đăng ký</a> </p>
                    </div>
                </div>
            </div>
        </div>

        
        @endsection
