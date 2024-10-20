<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập Admin</title>
    <style>
        /* Đặt background gradient đa sắc với 7 màu */
        body {
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            background: linear-gradient(135deg, #ff4b2b, #ff416c, #ff8c00, #1e90ff, #4b0082, #32cd32, #ff00ff);
            background-size: 300% 300%;
            animation: gradientBackground 10s ease infinite;
            font-family: 'Arial', sans-serif;
        }

        @keyframes gradientBackground {
            0% { background-position: 0% 50%; }
            50% { background-position: 100% 50%; }
            100% { background-position: 0% 50%; }
        }

        /* Container của form đăng nhập */
        .login-container {
            background-color: rgba(255, 255, 255, 0.1); /* Chỉnh sửa độ trong suốt */
            border-radius: 15px;
            padding: 40px;
            box-shadow: 0 8px 30px rgba(0, 0, 0, 0.5); /* Tăng độ mờ của bóng */
            max-width: 400px;
            width: 100%;
            border: 2px solid rgba(255, 255, 255, 0.8); /* Thêm viền */
        }

        /* Tiêu đề */
        h2 {
            text-align: center;
            color: #fff; /* Đổi màu chữ thành trắng */
            font-size: 28px;
            margin-bottom: 20px;
        }

        /* Form nhập liệu */
        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-size: 16px;
            color: #fff; /* Đổi màu chữ thành trắng */
            margin-bottom: 5px;
        }

        input[type="text"], input[type="password"] {
            width: 100%;
            padding: 12px;
            border: 1px solid rgba(255, 255, 255, 0.6); /* Màu viền nhạt */
            border-radius: 10px;
            font-size: 16px;
            background-color: rgba(255, 255, 255, 0.3); /* Nền ô nhập liệu trong suốt */
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, input[type="password"]:focus {
            border-color: #ff416c;
            outline: none;
        }

        /* Nút đăng nhập */
        button {
            width: 100%;
            padding: 12px;
            background-color: #ff416c;
            border: none;
            border-radius: 10px;
            color: #fff;
            font-size: 18px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        button:hover {
            background-color: #ff8c00;
        }

        /* Thông báo lỗi */
        p {
            color: red;
            font-size: 14px;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="login-container">
        <h2>Đăng nhập quản trị viên</h2>

        @if (session('error'))
            <p>{{ session('error') }}</p>
        @endif

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            <div>
                <label for="username">Tên tài khoản:</label>
                <input type="text" name="username" id="username" required>
            </div>
            <div>
                <label for="password">Mật khẩu:</label>
                <input type="password" name="password" id="password" required>
            </div>
            <div>
                <button type="submit">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>
</html>
