
@extends('layout.master')
@section('content') 
<main class="main">
    <div class="breadcrumb w-100">
        <div class="container">
            <ul>
                <li>
                    <a href="" style="display: inline;">
                        <span>Trang chủ</span>
                    </a>
                </li>
                <li>
                    <span>Giỏ hàng</span>
                </li>
            </ul>
        </div>
    </div>

    <div class="cart w-100">
        <div class="container">
            <div class="cart-wrap w-100 flex-left">
                <div class="cart-wrap__list w-100">
                    @if(session('cart') && count(session('cart')) > 0)
                        <table class="product-list w-100">
                            <thead>
                                <tr>
                                    <th class="product-list__remove"></th>
                                    <th class="product-list__thumnail"></th>
                                    <th class="product-list__name">Sản phẩm</th>
                                    <th class="product-list__price">Giá</th>
                                    <th class="product-list__quantity">Số lượng</th>
                                    <th class="product-list__subtotal">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach(session('cart') as $id => $item)
    <tr class="product-list__item">
        <td class="product-list__remove">
            <form action="{{ route('cart.remove', $id) }}" method="POST">
                @csrf
                <button type="submit" class="remove action-cart" data-type="remove" data-id="{{ $id }}">x</button>
            </form>
        </td>
        <td class="product-list__thumnail">
            <a href="#">
                <img src="{{ asset('images/' . $item['image']) }}" alt="{{ $item['name'] }}" width="70px" height="70px">
            </a>
        </td>
        <td class="product-list__name">
                <a href="#" style="color: black;">{{ $item['name'] }}</a>
            </td>
        <td class="product-list__price">{{ number_format($item['price'], 0, ',', '.') }}đ</td>
        <td class="product-list__quantity">
            <div class="quantity">
                <div class="quantity-button minus action-cart" data-type="sub" data-id="{{ $id }}">-</div>
                <input type="text" class="input-text qty text" value="{{ $item['quantity'] }}" size="4" readonly>
                <div class="quantity-button plus action-cart" data-type="add" data-id="{{ $id }}">+</div>
            </div>
        </td>
        <td class="product-list__subtotal">{{ number_format($item['price'] * $item['quantity'], 0, ',', '.') }}đ</td>
    </tr>
@endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6" class="actions">
                                        <div class="actions-wrapper">
                                            <form action="{{ route('cart.clear') }}" method="POST">
                                                @csrf
                                                <button type="submit" class="button remove-all action-cart" data-type="delete">Xóa tất cả</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    @else
                        <div class="alert alert-warning">
                            <p>Giỏ hàng của bạn đang trống </p>
                            <a href="{{ route('sanpham.trangchu') }}">Tiếp tục mua hàng</a>
                        </div>
                        
                    @endif
                </div>

                <!-- Sidebar tóm tắt đơn hàng -->
                <div class="cart-wrap__sidebar">
                    <div class="summary bd">
                        <div class="title flex-center-left">
                            <svg xmlns="http://www.w3.org/2000/svg" width="23.319" height="28.117">
                                <!-- SVG content here -->
                            </svg>
                            <p>Tóm tắt đơn hàng</p>
                        </div>
                        <ul class="total">
                            <li class="flex-center-between">
                                <p class="total-name">Tạm tính</p>
                                <p class="total-value subTotalcart">
                                    {{ number_format(array_reduce(session('cart', []), function($total, $item) {
                                        return $total + ($item['price'] * $item['quantity']);
                                    }, 0), 0, ',', '.') }}đ
                                </p>
                            </li>
                            <li class="summary-subtotal flex-center-between">
                                <p class="total-name">Tổng cộng</p>
                                <p class="summary-total-price total-value">{{ number_format(array_reduce(session('cart', []), function($total, $item) {
                                    return $total + ($item['price'] * $item['quantity']);
                                }, 0), 0, ',', '.') }}đ</p>
                            </li>
                        </ul>
                        <a class="btn w-100 btn-checkout paymentAccept" href="{{ route('order.create', [
                            'product_id' => $id,
                            'product_name' => $item['name'],
                            'price' => $item['price'],
                            'quantity' => $item['quantity']
                        ]) }}" aria-label="Đặt hàng">Đặt hàng</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
        
    <script defer="" src="/assets/general/libs/jquery/jquery.min.js?v=0.0.0.7.777"></script><script defer="" src="/assets/general/build/js/theme/general.min.js?v=0.0.0.7.777"></script><script defer="" src="/vendor/core/form-custom/js/main.min.js?v=0.0.0.7.777"></script><script defer="" src="/vendor/core/Ecommerce/build/js/desktop/ecommerce.min.js?v=0.0.0.7.777"></script><script defer="" src="/assets/shop-modernminimal/build/js/desktop/general.min.js?v=0.0.0.7.777"></script>
    
    <link rel="stylesheet" href="https://mbmart.com.vn/vendor/core/Ecommerce/build/css/desktop/cart.min.css?v=0.0.0.7.777">

	<script defer="" src="https://mbmart.com.vn/vendor/core/Ecommerce/build/js/desktop/cart-payment.min.js?v=0.0.0.7.777"></script>

            <script type=text/javascript defer>
        document.addEventListener("DOMContentLoaded", function(event) {
            $(document).ready(function() {
                                                        setTimeout(function() {
                        let script_head = `<!-- Google Tag Manager -->
\x3Cscript>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WBMM5FJ');\x3C/script>
<!-- End Google Tag Manager -->
<!-- Google tag (gtag.js) -->
\x3Cscript async src="https://www.googletagmanager.com/gtag/js?id=G-HJR47K7B62">\x3C/script>
\x3Cscript>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());
  gtag('config', 'G-HJR47K7B62');
  gtag('config', 'AW-743598600');
\x3C/script>`;
                        $('head').append(script_head);

                        let script_body = `<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WBMM5FJ"
height="0" width=0 style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
<!-- Detect scroll -->
\x3Cscript>
	function scrollDetect(){
	  var lastScroll = 0;
	  window.onscroll = function() {
		  let currentScroll = document.documentElement.scrollTop || document.body.scrollTop; 

		  if (currentScroll > 0 && lastScroll <= currentScroll){
			lastScroll = currentScroll;
			  if(currentScroll > 30)
			  {
				  $("header").addClass("nav-up");
			  }
		  }else{
			lastScroll = currentScroll;
			$("header").addClass("nav-down");
			$("header").removeClass("nav-up");
		  }
	  };
	}
	scrollDetect();
\x3C/script>`;
                        $('body').append(script_body);
                    }, parseInt('5000'));
                                                    setTimeout(function() {
                        let script_body = `<script defer="" src="https://www.google.com/recaptcha/api.js?v=0.1.4"><\/script>`;
                        $('body').append(script_body);
                    }, 6000);
                            });

        });
    </script>
        </body>
</html>
