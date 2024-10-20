
    
    <title>Thanh toán</title>
	

    
   
<style>
/* Chung cho bảng tóm tắt đơn hàng */
.summary {
    background-color: #fff; /* Màu nền trắng */
    border: 1px solid #ddd; /* Viền mỏng màu xám */
    border-radius: 8px; /* Bo góc */
    padding: 20px; /* Khoảng cách bên trong */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Đổ bóng nhẹ */
}

/* Tiêu đề bảng */
.title {
    font-size: 1.5em; /* Kích thước chữ */
    font-weight: bold; /* Chữ đậm */
    margin-bottom: 15px; /* Khoảng cách dưới tiêu đề */
}

/* Danh sách tổng quan */
.total {
    list-style: none; /* Xóa dấu đầu dòng */
    padding: 0; /* Xóa khoảng cách bên trong */
}

/* Mỗi hàng trong bảng */
.total li {
    display: flex; /* Sử dụng flexbox để căn chỉnh */
    justify-content: space-between; /* Tạo khoảng cách đều giữa các phần tử */
    padding: 10px 0; /* Khoảng cách trên và dưới mỗi hàng */
    border-bottom: 1px solid #ddd; /* Đường viền dưới */
}

/* Tùy chỉnh cho hàng cuối cùng */
.total li:last-child {
    border-bottom: none; /* Xóa đường viền dưới cho hàng cuối */
}

/* Tên sản phẩm và giá */
.total-name {
    color: #333; /* Màu chữ tối */
}

.total-value {
    color: #000; /* Màu chữ chính */
    font-weight: bold; /* Chữ đậm */
}

/* Nút hoàn tất */
.btn-checkout {
    background-color: #af1313; 
    color: white; /* Màu chữ trắng */
    border: none; /* Xóa viền */
    border-radius: 5px; /* Bo góc */
    padding: 10px; /* Khoảng cách bên trong */
    font-size: 1.1em; /* Kích thước chữ */
    cursor: pointer; /* Con trỏ chuột khi di chuột qua */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu nền */
}

.btn-checkout:hover {
    background-color: #e32f30; /* Màu nền khi di chuột qua */
}

/* Cấu hình chung cho alert */
.alert {
    position: relative;
    padding: 20px;
    margin: 15px 0;
    border-radius: 5px;
    font-size: 16px;
    color: #fff;
    background-color: #f44336; /* Màu nền đỏ */
    border: 1px solid #d32f2f; /* Đường viền đỏ đậm */
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2); /* Tạo bóng nhẹ */
    animation: fadeIn 0.5s ease-out; /* Animation cho sự xuất hiện */
    display: block;
}

/* Thêm hiệu ứng chuyển động fadeIn */
@keyframes fadeIn {
    0% { opacity: 0; }
    100% { opacity: 1; }
}



</style>
        <meta name=facebook-domain-verification content="kv8qqxyrnlrysh2cc403s2wagj44gd" >
<meta name=msvalidate.01 content="3878E7DB9066B444A03A9E913AA1F770" >   
<meta name='dmca-site-verification' content='ZDZBWE5xWWUxakkycmlyeG9veXJpZz090' >
            <script>var errorMessage = 'Có lỗi xảy ra vui lòng thử lại!'</script>
@extends('layout.master')
@section('content') 
        <main class="main">
                <div class="breadcrumb w-100">
		<div class="container">	
			<ul itemscope itemtype="https://schema.org/BreadcrumbList">
									<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
													<a itemprop="item" href="https://mbmart.com.vn" style="display: inline;">
													<span itemprop="name">
																	Trang chủ
															</span>
							<meta itemprop="position" content="1" >
													</a>
											</li>
									<li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
													<span itemprop="name">
																	Thanh toán
															</span>
							<meta itemprop="position" content="2" >
											</li>
							</ul>
		</div>
	</div>				
    <div class="cart w-100">
        <div class="container">
                            <div class="alert-none w-100">
                    <p>Đăng nhập để nhận ưu đãi khi mua hàng! <a href="https://mbmart.com.vn/login">Đăng nhập</a><br> Bạn chưa có tài khoản? <a href="https://mbmart.com.vn/register">Đăng ký</a></p>
                </div>
                @if ($errors->has('error'))
    <div class="alert alert-danger">
        {{ $errors->first('error') }}
    </div>
@endif
                        <form id="payment-check" class="pyament-check w-100" method="POST" class="w-100">
                            <div class="cart-wrap w-100 flex-left">
    <div class="cart-wrap__list w-100">
        <div class="box form-infor">
            <!-- Thông tin liên hệ -->
            <div class="box-title flex-center-between">
                <span>Thông tin liên hệ</span>
                <div class="get-location">
                    <button class="btn-get-location" type="button" data-not-support="Trình duyệt của bạn không hỗ trợ định vị địa lý.">
                        <!-- SVG -->
                        <span>Lấy địa chỉ của tôi</span>
                    </button>
                </div>
            </div>

            <form action="{{ route('order.store') }}" method="POST">
                @csrf
                
                <!-- Thông tin liên hệ -->
                <div class="row">
                    <div class="col-md-12 col">
                        <label for="input-name">Tên người nhận *</label>
                        <input type="text" class="input_field form-control" id="input-name" name="buyer_name" placeholder="Tên người nhận" required>
                        <p class="null err_show">Vui lòng điền họ tên!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col">
                        <label for="input-email">Email người nhận</label>
                        <input type="email" class="input_field form-control" id="input-email" name="email" placeholder="Email người nhận" required>
                        <p class="null err_show">Vui lòng điền email!</p>
                        <p class="email err_show">Email không đúng định dạng!</p>
                    </div>
                    <div class="col-md-6 col">
                        <label for="input-phone">Số điện thoại người nhận *</label>
                        <input type="text" class="input_field form-control" id="input-phone" name="phone_number" placeholder="Số điện thoại người nhận" required>
                        <p class="null err_show">Vui lòng điền số điện thoại!</p>
                        <p class="phone err_show">Số điện thoại không đúng định dạng!</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 col">
                        <label for="input-address">Địa chỉ *</label>
                        <input type="text" class="input_field form-control" id="input-address" name="shipping_address" placeholder="Địa chỉ" required>
                        <p class="null err_show">Vui lòng điền địa chỉ!</p>
                    </div>
                </div>
                <div class="row">
    <div class="col-md-12 col">
        <label for="input-promo-code">Mã khuyến mãi</label>
        <input type="text" class="input_field form-control" id="input-promo-code" name="promo_code" placeholder="Nhập mã khuyến mãi">
    </div>
</div>


                <div class="row">
                    <div class="col-md-12 col">
                        <label for="input-note">Ghi chú nếu có</label>
                        <textarea id="input-note" name="note" placeholder="Ghi chú nếu có"></textarea>
                    </div>
                </div>

                <!-- Phương thức thanh toán -->
                <div class="box-title pt-20">
    <span>Phương thức thanh toán</span>
</div>
<div class="list-payment">
    <div class="radio-field">
        <label class="flex-center-left" for="payment_cod">
            <input type="radio" id="payment_cod" name="payment_method" value="COD">
            Thanh toán khi nhận hàng (COD)
        </label>
    </div>
    <div class="radio-field">
        <label class="flex-center-left" for="payment_bank_transfer">
            <input type="radio" id="payment_bank_transfer" name="payment_method" value="ATM" checked>
            Chuyển khoản ngân hàng (ATM)
        </label>
        <div id="bank_transfer_info" class="radio-field__description">
            <p>Ngân hàng: <strong>Việt Nam Thịnh Vượng - VPbank</strong></p>
            <p>Số tài khoản: <strong>61802266</strong></p>
            <p>Chủ tài khoản: <strong>Phùng Thị Hoàng Hiền</strong></p>
            <p>Chi nhánh: <strong>Phạm Văn Đồng</strong></p>
            <p><strong>(Kết thúc bước đặt hàng, bạn sẽ được hệ thống tạo mã QR Code thanh toán, vui lòng quét mã để chuyển khoản)</strong></p>
        </div>
    </div>
</div>


                <!-- Phí vận chuyển -->
                <div class="box-title pt-20">
                    <span>Phí vận chuyển</span>
                </div>
                <div class="list-shipping">
                    <!-- Phương thức giao hàng -->
                </div>

                <div class="summary bd">
    <div class="title flex-center-left">
        <p>Tóm tắt đơn hàng</p>
    </div>
    <ul class="total">
        <li class="flex-center-between">
            <p class="total-name">Sản phẩm</p>
            <p class="total-title">Thành tiền</p>
        </li>
        <li class="flex-center-between">
            <p class="total-name opacity">{{ $product_name }} <span> x {{ $quantity }}</span></p>
            <p class="total-value opacity">{{ number_format($price, 0, ',', '.') }}đ</p>
        </li>
        <li class="flex-center-between">
            <p class="total-name">Tạm tính</p>
            <p class="total-value subTotalcart">{{ number_format($price * $quantity, 0, ',', '.') }}đ</p>
        </li>
        <li class="flex-center-between">
    <p class="total-name">Giảm giá</p>
    <p class="total-value subTotalcart">
        @if (session('promo_discount'))
            - {{ number_format(session('promo_discount'), 0, ',', '.') }}đ
        @else
            0đ
        @endif
    </p>
</li>
        <li class="summary-subtotal flex-center-between">
            <p class="total-name">Tổng cộng</p>
            <p class="summary-total-price total-value" data-value="{{ $price * $quantity }}">{{ number_format($price * $quantity, 0, ',', '.') }}đ</p>
        </li>
    </ul>
    <button class="btn w-100 btn-checkout paymentAccept" type="submit" aria-label="Hoàn tất">Hoàn tất</button>
</div>
<input type="hidden" name="quantity" value="{{ $quantity }}">
                <input type="hidden" name="product_id" value="{{ $product_id }}">
            </form>
        </div>
    </div>
</div>


<script>
    // Bắt sự kiện thay đổi của các radio button
    document.querySelectorAll('input[name="payment_method"]').forEach(function (element) {
        element.addEventListener('change', function () {
            // Kiểm tra nếu "ATM" được chọn thì hiện thông tin ngân hàng
            if (this.value === 'ATM') {
                document.getElementById('bank_transfer_info').style.display = 'block';
            } else {
                document.getElementById('bank_transfer_info').style.display = 'none';
            }
        });
    });

    // Kiểm tra radio button khi tải trang
    window.onload = function() {
        if (document.getElementById('payment_bank_transfer').checked) {
            document.getElementById('bank_transfer_info').style.display = 'block';
        } else {
            document.getElementById('bank_transfer_info').style.display = 'none';
        }
    };

</script>



<style>
    .radio-field__description {
        display: none; /* Ẩn phần mô tả mặc định */
    }
</style>    
@endsection

 
    
    <link rel="stylesheet" href="https://mbmart.com.vn/vendor/core/Ecommerce/build/css/desktop/cart.min.css?v=0.0.0.7.6">

	
       

