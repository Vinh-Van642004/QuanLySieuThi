@extends('layout.master')

@section('content')
    <style>
        .success-container {
            text-align: center;
            font-family: Arial, sans-serif;
            margin-top: 50px;
        }
        .success-message {
            font-size: 24px;
            font-weight: bold;
            color: green;
        }
        .success-image {
            margin-top: 20px;
        }
        .btn-back-home {
            display: inline-block;
            margin-top: 20px;
            padding: 10px 20px;
            background-color: #28a745;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }
        .btn-back-home:hover {
            background-color: #218838;
        }
    </style>

    <div class="success-container">
        <div class="success-message">
            Bạn đã đặt hàng thành công!
        </div>
        <div class="success-image">
            <img src="{{ asset('images/success.jpg') }}" alt="Success Image" width="150" />
        </div>
        <a href="{{ route('sanpham.trangchu') }}" class="btn-back-home">Quay lại trang chủ</a>
    </div>

    <!-- Include Canvas Confetti Library -->
    <script src="https://cdn.jsdelivr.net/npm/canvas-confetti@1.5.1/dist/confetti.browser.min.js"></script>

    <script>
        // Hàm để bắn pháo hoa ở hai bên góc
        function fireConfetti() {
            var duration = 3 * 1000; // Thời gian pháo hoa (5 giây)
            var end = Date.now() + duration;

            (function frame() {
                // Pháo hoa ở góc trái
                confetti({
                    particleCount: 7,
                    angle: 60,
                    spread: 55,
                    origin: { x: 0, y: 1 } // Vị trí góc trái dưới
                });
                // Pháo hoa ở góc phải
                confetti({
                    particleCount: 7,
                    angle: 120,
                    spread: 55,
                    origin: { x: 1, y: 1 } // Vị trí góc phải dưới
                });

                if (Date.now() < end) {
                    requestAnimationFrame(frame);
                }
            }());
        }

        // Gọi hàm để bắn pháo hoa khi trang tải xong
        window.onload = fireConfetti;
    </script>
@endsection
