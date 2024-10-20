@extends('layout.master')

@section('content')
    <h1 class="text-center" style=" margin: 30px auto;">Thông tin tài khoản của bạn</h1>

    @if(Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="account-info">
        <div class="profile-image">
            <img src="images/hehechan.jpg" alt="Profile Picture">
        </div>
        <div class="info-grid">
            <div class="info-item"><strong>Họ:</strong> {{ $customer ? $customer->first_name : 'Trống' }}</div>
            <div class="info-item"><strong>Tên:</strong> {{ $customer ? $customer->last_name : 'Trống' }}</div>
            <div class="info-item"><strong>Số điện thoại:</strong> {{ $customer ? $customer->phone_number : 'Trống' }}</div>
            <div class="info-item"><strong>Địa chỉ:</strong> {{ $customer ? $customer->address : 'Trống' }}</div>
            <div class="info-item"><strong>Thành phố:</strong> {{ $customer ? $customer->city : 'Trống' }}</div>
            <div class="info-item"><strong>Email:</strong> {{ $customer ? $customer->email : 'Trống' }}</div>

            <div class="info-item"><strong>Quốc gia:</strong> {{ $customer ? $customer->country : 'Trống' }}</div>
        </div>
    </div>

    <div class="text-center mt-3">
    <a href="{{ route('edit.account') }}" class="btn btn-primary custom-btn">Chỉnh sửa thông tin</a>
</div>
@endsection

<style>
.account-info {
    display: flex;
    align-items: flex-start;
    max-width: 1000px;
    margin: 40px auto; /* Thêm margin-top để di chuyển nội dung thấp xuống */
    padding: 20px;
    background-color: #af1313;
    border-radius: 15px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    gap: 40px;
}

    .profile-image img {
        width: 480px;
        height: 397px;
        border-radius: 10px;
        border: 3px solid #dc3545; /* Viền đỏ */
        object-fit: cover;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
        width: 100%;
        padding: 20px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 6px rgba(0, 0, 0, 0.05);
    }

    .info-item {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 0;
        font-size: 16px;
        border-bottom: 1px solid #ececec;
    }

    .info-item:last-child {
        border-bottom: none;
    }

    .info-item strong {
        color: #dc3545; /* Màu đỏ cho nhãn */
        font-weight: 600;
    }

    .info-item span {
        color: #555;
        font-weight: 400;
    }

    .text-center {
        text-align: center;
    }

    .mt-3 {
        margin-top: 1rem; /* Adjust margin as needed */
    }

    @media (max-width: 768px) {
        .account-info {
            flex-direction: column;
            align-items: center;
        }

        .profile-image {
            margin-bottom: 20px;
        }

        .info-grid {
            grid-template-columns: 1fr;
        }
    }
    .custom-btn {
        display: inline-block; /* Ensures the button behaves like a block element */
        padding: 12px 24px; /* Adds padding for a larger clickable area */
        font-size: 16px; /* Increases font size for better readability */
        font-weight: bold; /* Makes the text bold */
        color: #fff; /* Sets text color to white */
        background-color: #dc3545; /* Nền đỏ */
        border: none; /* Removes default border */
        border-radius: 5px; /* Rounds the corners of the button */
        text-decoration: none; /* Removes underline from the link */
        transition: background-color 0.3s ease, transform 0.2s ease; /* Adds smooth transition effects */
    }

    .custom-btn:hover {
        background-color: #c82333; /* Tối màu nút khi hover */
        transform: translateY(-2px); /* Slightly lifts the button on hover */
    }

    .custom-btn:active {
        transform: translateY(0); /* Resets the lift effect when clicked */
    }
</style>
