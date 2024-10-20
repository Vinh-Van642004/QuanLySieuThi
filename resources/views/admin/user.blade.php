@extends('layout1.master')

@section('content')
    <div class="container">
        <h2>Danh sách người dùng</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên đăng nhập</th>
                    <th>Email</th>
                    <th>Ngày tạo</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                    <tr>
                        <td>{{ $user->user_id }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td>
                            <!-- Nút Xóa -->
                            <form action="{{ route('admin.users.destroy', $user->user_id) }}" method="POST" onsubmit="return confirm('Bạn có chắc muốn xóa tài khoản này không?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

@endsection
<style>
    /* Container tổng thể */
.container {
    background-color: #f5f7fa;
    padding: 40px;
    border-radius: 10px;
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
    max-width: 1200px;
}

/* Tiêu đề trang */
.page-title {
    font-family: 'Roboto', sans-serif;
    font-size: 2.5rem;
    font-weight: bold;
    color: #34495e;
    margin-bottom: 30px;
    text-align: center;
}

/* Bảng dữ liệu */
.table-custom {
    width: 100%;
    background-color: #ffffff;
    border-collapse: separate;
    border-spacing: 0 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
}

.table-custom thead {
    background-color: #2980b9;
    color: #fff;
}

.table-custom th, .table-custom td {
    padding: 20px;
    text-align: center;
    font-size: 1rem;
    font-weight: 500;
    border-bottom: 2px solid #ecf0f1;
}

.table-custom thead th {
    font-size: 1.2rem;
    text-transform: uppercase;
    letter-spacing: 0.05rem;
    border: none;
}

.table-custom tbody tr {
    transition: all 0.3s ease;
}

.table-custom tbody tr:hover {
    background-color: #f1f2f6;
    transform: translateY(-5px);
}

.table-custom tbody tr td:first-child {
    border-top-left-radius: 10px;
    border-bottom-left-radius: 10px;
}

.table-custom tbody tr td:last-child {
    border-top-right-radius: 10px;
    border-bottom-right-radius: 10px;
}

/* Nút Xóa */
.btn-danger {
    background-color: #e74c3c;
    border: none;
    padding: 10px 20px;
    font-size: 0.9rem;
    border-radius: 30px;
    color: white;
    font-weight: bold;
    text-transform: uppercase;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-danger:hover {
    background-color: #c0392b;
    transform: translateY(-3px);
    box-shadow: 0 5px 10px rgba(231, 76, 60, 0.5);
}

/* Thông báo thành công */
.alert-success {
    background-color: #2ecc71;
    color: white;
    padding: 15px;
    border-radius: 8px;
    font-size: 1.1rem;
    text-align: center;
    margin-top: 20px;
    box-shadow: 0 5px 10px rgba(46, 204, 113, 0.3);
}

/* Responsive */
@media (max-width: 768px) {
    .table-custom th, .table-custom td {
        padding: 10px 15px;
        font-size: 0.9rem;
    }

    .btn-danger {
        padding: 8px 15px;
        font-size: 0.8rem;
    }

    .page-title {
        font-size: 2rem;
    }
}

</style>