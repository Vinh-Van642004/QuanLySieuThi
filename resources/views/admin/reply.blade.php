@extends('layout1.master')
@section('content')
<!-- resources/views/admin/reply.blade.php -->
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Phản hồi khách hàng</h1>
        </div>
        <!-- /.col-lg-12 -->
        <form action="{{ route('admin.contact.sendReply', $contact->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="email">Email khách hàng:</label>
                <input type="email" class="form-control" id="email" value="{{ $contact->email }}" disabled>
            </div>
            <div class="form-group">
                <label for="reply_message">Nội dung phản hồi:</label>
                <textarea class="form-control" name="reply_message" id="reply_message" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi phản hồi</button>
        </form>
    </div>
</div>
@endsection