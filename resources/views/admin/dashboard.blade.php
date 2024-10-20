@extends('layout1.master')

@section('content')
    <div class="container mt-5">
        <h2 class="text-center mb-5" style="font-weight: 700; font-size: 2.5rem;">Trang Quản Trị</h2>

        <div class="row">
            <!-- Khối Tổng Số Đơn Hàng -->
            <div class="col-md-4 mb-4">
                <div class="card-modern bg-gradient-primary">
                    <div class="icon-container">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <div class="content">
                        <h3>Tổng Số Đơn Hàng</h3>
                        <h2>{{ count($orders) }}</h2>
                        <p>Đơn hàng</p>
                    </div>
                </div>
            </div>

            <!-- Khối Tổng Số Sản Phẩm -->
            <div class="col-md-4 mb-4">
                <div class="card-modern bg-gradient-success">
                    <div class="icon-container">
                        <i class="fa fa-box"></i>
                    </div>
                    <div class="content">
                        <h3>Tổng Số Sản Phẩm</h3>
                        <h2>{{ count($products) }}</h2>
                        <p>Sản phẩm</p>
                    </div>
                </div>
            </div>

            <!-- Khối Tổng Doanh Thu -->
            <div class="col-md-4 mb-4">
                <div class="card-modern bg-gradient-warning">
                    <div class="icon-container">
                        <i class="fa fa-dollar-sign"></i>
                    </div>
                    <div class="content">
                        <h3>Tổng Doanh Thu</h3>
                        <h2>{{ number_format($totalRevenue, 2) }}</h2>
                        <p>VND</p>
                    </div>
                </div>
            </div>
        </div>

        <!-- Biểu đồ doanh thu theo tháng -->
        <div class="row mt-5">
            <div class="col-md-12">
                <canvas id="revenueChart"></canvas>
            </div>
        </div>
    </div>
@endsection

<!-- Custom CSS -->
<style>
    .card-modern {
        padding: 20px;
        border-radius: 15px;
        color: white;
        text-align: center;
        box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
        position: relative;
        overflow: hidden;
        transition: all 0.3s ease;
    }

    .card-modern:hover {
        transform: translateY(-10px);
        box-shadow: 0 12px 24px rgba(0, 0, 0, 0.2);
    }

    .bg-gradient-primary {
        background: linear-gradient(45deg, #007bff, #6610f2);
    }

    .bg-gradient-success {
        background: linear-gradient(45deg, #28a745, #20c997);
    }

    .bg-gradient-warning {
        background: linear-gradient(45deg, #ffc107, #fd7e14);
    }

    .icon-container {
        position: absolute;
        top: -25px;
        right: -25px;
        opacity: 0.2;
        font-size: 8rem;
    }

    .content h3 {
        font-weight: 700;
        font-size: 1.5rem;
        margin-bottom: 0.5rem;
    }

    .content h2 {
        font-size: 3rem;
        font-weight: 800;
    }

    .content p {
        font-size: 1rem;
        font-weight: 300;
        margin-bottom: 0;
    }

    /* Biểu đồ */
    canvas {
        max-width: 100%;
        height: 400px;
    }
</style>

<!-- Thêm Chart.js CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<!-- JavaScript để tạo biểu đồ -->
<script>
   document.addEventListener("DOMContentLoaded", function() {
    const ctx = document.getElementById('revenueChart');
    
    if (ctx) {
        const chartCtx = ctx.getContext('2d');
        const revenueChart = new Chart(chartCtx, {
            type: 'bar',
            data: {
                labels: ['Tháng 1', 'Tháng 2', 'Tháng 3', 'Tháng 4', 'Tháng 5', 'Tháng 6', 'Tháng 7', 'Tháng 8', 'Tháng 9', 'Tháng 10', 'Tháng 11', 'Tháng 12'],
                datasets: [{
                    label: 'Doanh thu (VND)',
                    data: [120000000, 150000000, 180000000, 220000000, 300000000, 250000000, 210000000, 260000000, 310000000, 350000000, 390000000, 450000000],
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    }
});

</script>
