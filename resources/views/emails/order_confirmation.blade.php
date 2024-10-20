<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đơn hàng</title>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f4f4f9;
            margin: 0;
            padding: 0;
        }
        .container {
            max-width: 700px;
            margin: 40px auto;
            background: linear-gradient(135deg, #ffffff, #f0f0f0);
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }
        h1, h2, h3, p, li {
            color: #000;
        }
        ul {
            list-style-type: none;
            padding: 0;
        }
        li {
            margin-bottom: 12px;
        }
        .highlight {
            color: #e74c3c;
            font-weight: bold;
        }
        .cta-button {
            display: inline-block;
            padding: 12px 25px;
            background-color: #000;
            color: #ffffff;
            text-decoration: none;
            border-radius: 30px;
            font-size: 16px;
            font-weight: bold;
            margin-top: 25px;
            transition: background-color 0.3s ease;
        }
        .cta-button:hover {
            background-color: #333;
        }
        .header {
            text-align: center;
            margin-bottom: 40px;
        }
        .header img {
            max-width: 180px;
        }
        .footer {
            text-align: center;
            font-size: 14px;
            margin-top: 40px;
            color: #bdc3c7;
        }
        .order-summary {
            background-color: #ecf0f1;
            padding: 20px;
            border-radius: 10px;
        }
        .order-summary h2 {
            color: #000;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="https://mbmart.com.vn/uploads/2023/10/320x100-logoweb-1.png.webp" alt="MBMart Logo">
        </div>
        <h1>Chào mừng {{ $order['buyer_name'] }}!</h1>
        <p>Chúng tôi rất vui mừng thông báo rằng đơn hàng của bạn tại <strong>MBMart</strong> đã được xác nhận thành công. Chi tiết đơn hàng của bạn như sau:</p>

        <div class="order-summary">
            <h2>Chi tiết đơn hàng</h2>
            <ul>
                <li><strong>Tên sản phẩm:</strong> <span class="highlight">{{ $order['product_name'] }}</span></li>
                <li><strong>Số lượng:</strong> {{ $order['quantity'] }}</li>
                <li><strong>Giá:</strong> {{ number_format($order['price'], 0, ',', '.') }}đ</li>
                <li><strong>Thành tiền:</strong> <span class="highlight">{{ number_format($order['total_amount'], 0, ',', '.') }}đ</span></li>
                <li><strong>Phương thức thanh toán:</strong> {{ $order['payment_method'] === 'ATM' ? 'Chuyển khoản ATM' : 'Thanh toán khi nhận hàng (COD)' }}</li>
            </ul>
        </div>

        <h3>Thông tin người nhận</h3>
        <ul>
            <li><strong>Tên người nhận:</strong> {{ $order['buyer_name'] }}</li>
            <li><strong>Email:</strong> {{ $order['email'] }}</li>
            <li><strong>Số điện thoại:</strong> {{ $order['phone_number'] }}</li>
            <li><strong>Địa chỉ giao hàng:</strong> {{ $order['shipping_address'] }}</li>
        </ul>

        <a href="https://example.com/contact" class="cta-button">Liên hệ chúng tôi</a>

        <div class="footer">
            <p>Cảm ơn bạn đã mua sắm tại MBMart! Chúng tôi hy vọng bạn sẽ hài lòng với sản phẩm.</p>
            <p><small>© 2024 MBMart. Tất cả các quyền được bảo lưu.</small></p>
        </div>
    </div>
</body>
</html>
