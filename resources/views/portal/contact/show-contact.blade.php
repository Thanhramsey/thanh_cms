@extends('layouts.portal')
@section('content')
    <div class="container mt-5">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <h4>Thông tin liên hệ của bạn</h4>
            </div>
            <div class="card-detail">
                <p><strong>Tên:</strong> <span class="ms-2">{{ $contact->name }}</span></p>
                <p><strong>Số điện thoại:</strong> <span class="ms-2">{{ $contact->phone }}</span></p>
                <p><strong>Câu hỏi:</strong></p>
                <div class="alert alert-info">
                    {{ $contact->message }}
                </div>
                @if ($contact->reply)
                    <p><strong>Trả lời:</strong></p>
                    <div class="alert alert-success">
                        {{ $contact->reply }}
                    </div>
                @else
                    <div class="alert alert-warning">
                        <strong>Chưa có phản hồi.</strong>
                    </div>
                @endif
                <a href="{{ route('portal.home') }}" class="btn btn-secondary mt-3">Về trang chủ</a>
            </div>
        </div>
    </div>
@endsection
