@extends('layout1.master')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Contact
                <small>List</small>
            </h1>
        </div>
        <!-- /.col-lg-12 -->
        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
            <thead>
                <tr align="center">
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Message</th>
                    <th>Phản hồi</th>
                    <th>Trạng thái</th> <!-- Cột Trạng thái -->
                </tr>
            </thead>
            <tbody>
                @foreach($contacts as $contact)
                <tr class="odd gradeX" align="center">
                    <td>{{ $contact->id }}</td>
                    <td>{{ $contact->name }}</td>
                    <td>{{ $contact->email }}</td>
                    <td>{{ $contact->phone }}</td>
                    <td>{{ $contact->message }}</td>
                    <td><a href="{{ route('admin.contact.reply', $contact->id) }}" class="btn-custom">Phản hồi</a></td>

                    <td class="{{ $contact->status == 'Chờ Phản Hồi' ? 'status-waiting' : 'status-replied' }}">
                        {{ $contact->status }}
                    </td> <!-- Hiển thị trạng thái với màu nền -->
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.row -->
</div>
<!-- /.container-fluid -->
@endsection

<style>
.status-waiting {
    background-color: rgba(255, 0, 0, 0.1); /* Nền màu đỏ nhạt cho "Chờ Phản Hồi" */
}

.status-replied {
    background-color: rgba(0, 255, 0, 0.1); /* Nền màu xanh lá nhạt cho "Đã Phản Hồi" */
}
.btn-custom {
    display: inline-block;
    padding: 10px 15px;
    color: white;
    background-color: #007bff; /* Màu nền */
    border: none;
    border-radius: 5px; /* Bo góc */
    text-decoration: none; /* Bỏ gạch chân */
    transition: background-color 0.3s; /* Hiệu ứng chuyển màu */
}

.btn-custom:hover {
    background-color: #0056b3; /* Màu nền khi hover */
}
/* Container */
.container-fluid {
    background-color: #f9f9f9;
    padding: 30px;
    border-radius: 15px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
}

/* Tiêu đề trang */
.page-header {
    font-family: 'Poppins', sans-serif;
    color: #34495e;
    font-size: 2.5rem;
    font-weight: bold;
    margin-bottom: 30px;
    border-bottom: 2px solid #2980b9;
}

.page-header small {
    font-size: 1.2rem;
    color: #7f8c8d;
    font-weight: 300;
}

/* Bảng dữ liệu */
.table {
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 6px 20px rgba(0, 0, 0, 0.05);
}

.table th {
    background-color: #3498db;
    color: #fff;
    padding: 15px;
    font-weight: 600;
    text-align: center;
}

.table td {
    padding: 15px;
    text-align: center;
    vertical-align: middle;
    color: #2c3e50;
    font-size: 1rem;
    transition: background-color 0.3s ease;
}

.table tbody tr:hover {
    background-color: #ecf0f1;
}

/* Nút phản hồi */
.btn-custom {
    padding: 10px 20px;
    background-color: #3498db;
    color: #fff;
    border: none;
    border-radius: 8px;
    font-size: 1rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: background-color 0.3s ease, transform 0.2s ease;
    text-decoration: none;
    display: inline-block;
}

.btn-custom:hover {
    background-color: #2980b9;
    transform: translateY(-3px);
}

/* Trạng thái */
.status-waiting {
    background-color: rgba(231, 76, 60, 0.1);
    color: #e74c3c;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
}

.status-replied {
    background-color: rgba(46, 204, 113, 0.1);
    color: #2ecc71;
    font-weight: bold;
    padding: 10px;
    border-radius: 5px;
}

/* Thông báo thành công */
.alert-success {
    background-color: #2ecc71;
    color: white;
    padding: 15px;
    border-radius: 8px;
    font-size: 1.1rem;
    margin-bottom: 20px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
}

/* Responsive */
@media (max-width: 768px) {
    .page-header {
        font-size: 2rem;
    }

    .table th, .table td {
        padding: 10px;
        font-size: 0.9rem;
    }

    .btn-custom {
        padding: 8px 15px;
        font-size: 0.9rem;
    }
}



</style>