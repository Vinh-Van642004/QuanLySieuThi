@extends('layout.master')
@section('content') 
<div class="voucher-container">
    <!-- Tiêu đề và form tìm kiếm -->
    <div class="voucher-search">
        <h2>Tìm kiếm mã giảm giá</h2>
        <form action="{{ route('voucher.search') }}" method="GET" class="search-form">
            <!-- Input tìm kiếm dài và hiện đại -->
            <input type="text" name="search_term" placeholder="Nhập mã giảm giá hoặc ID sản phẩm..." class="search-input" />
            
            <!-- Dropdown lựa chọn tìm kiếm -->
            <select name="search_type" class="search-select">
                <option value="code">Mã giảm giá</option>
                <option value="product_id">ID sản phẩm</option>
            </select>

            <!-- Nút tìm kiếm siêu hiện đại -->
            <button type="submit" class="search-btn">Tìm kiếm</button>
        </form>
    </div>

    <!-- Danh sách voucher -->
    @foreach($vouchers as $voucher)
        <div class="voucher-item">
            <img src="{{ asset('images/' . $voucher->anhvc) }}" alt="Logo" class="logo"> 
            <div class="voucher-details">
                <!-- Định dạng lại discount với number_format() để hiển thị kiểu "1,000" -->
                <h4>Voucher {{ number_format($voucher->discount, 0, ',', '.') }}k - Mã: {{ $voucher->code }}</h4>
                <p>Sử dụng mã để được giảm giá {{ number_format($voucher->discount, 0, ',', '.') }}k cho đơn hàng của bạn.</p>
                <span class="expiry">HSD {{ \Carbon\Carbon::parse($voucher->expiry_date)->format('d.m.Y') }}</span>
                <a href="#" class="condition-link">Điều kiện khuyến mãi</a>
                <div class="voucher-code">{{ $voucher->code }}</div>
            </div>
        </div>
    @endforeach
</div>

<style>
    /* Container chính */
    .voucher-container {
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 20px;
        padding: 20px;
        background: linear-gradient(to right, #f9f9f9, #e9ecef);
    }

    /* Form tìm kiếm */
    .voucher-search {
        width: 100%;
        text-align: center;
        margin-bottom: 30px;
        position: relative;
    }

    .voucher-search h2 {
        font-size: 28px;
        font-weight: bold;
        color: #000000;
        margin-bottom: 20px;
        text-transform: uppercase;
        letter-spacing: 1px;
    }

    .search-form {
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        background-color: #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        padding: 10px 20px;
    }

    .search-input {
        padding: 10px 15px;
        font-size: 16px;
        width: 350px;
        border: 1px solid #ddd;
        border-radius: 30px;
        outline: none;
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
    }

    .search-input:focus {
        border-color: #d32f2f;
        box-shadow: 0 0 10px rgba(211, 47, 47, 0.5);
    }

    .search-select {
        padding: 10px;
        font-size: 16px;
        border: 1px solid #ddd;
        border-radius: 30px;
        outline: none;
        margin-left: 10px;
        color: #495057;
    }

    .search-btn {
        padding: 10px 20px;
        background-color: #d32f2f;
        color: #fff;
        border: none;
        border-radius: 50px;
        cursor: pointer;
        font-size: 16px;
        transition: background-color 0.3s ease;
    }

    .search-btn:hover {
        background-color: #b71c1c;
    }

    /* Các mục voucher */
    .voucher-item {
        flex: 1 1 calc(33.333% - 40px);
        max-width: calc(33.333% - 40px);
        border: 1px solid #ddd;
        padding: 20px;
        display: flex;
        align-items: center; 
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        transition: box-shadow 0.3s ease, transform 0.3s ease;
        cursor: pointer;
        transition: transform 0.3s ease-in-out;
    }

    /* Hiệu ứng hover */
    .voucher-item:hover {
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
        transform: translateY(-5px);
    }

    /* Logo của voucher */
    .logo {
        width: 80px;
        height: auto;
        margin-right: 20px;
    }

    /* Chi tiết voucher */
    .voucher-details {
        flex-grow: 1;
        color: #495057;
    }

    /* Tiêu đề */
    .voucher-details h4 {
        font-size: 20px;
        font-weight: bold;
        color: #000000;
        margin-bottom: 10px;
    }

    /* Mô tả */
    .voucher-details p {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 15px;
    }

    /* HSD */
    .expiry {
        display: block;
        font-weight: bold;
        color: #ff8800;
        margin: 12px 0;
        font-size: 13px;
    }

    /* Liên kết điều kiện */
    .condition-link {
        color: #007bff;
        text-decoration: none;
        font-size: 14px;
        margin-bottom: 8px;
        display: inline-block;
        transition: color 0.3s ease;
    }

    .condition-link:hover {
        color: #0056b3;
        text-decoration: underline;
    }

    /* Mã voucher */
    .voucher-code {
        font-size: 18px;
        color: #d32f2f;
        font-weight: bold;
        margin-top: 10px;
    }

    /* Responsive design cho điện thoại và tablet */
    @media (max-width: 768px) {
        .voucher-item {
            flex: 1 1 100%;
            max-width: 100%;
        }

        .logo {
            width: 60px;
        }

        .voucher-details h4 {
            font-size: 18px;
        }

        .voucher-details p {
            font-size: 12px;
        }
    }
 
</style>  
@endsection
