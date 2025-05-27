@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Chi tiết & Chỉnh sửa Liên hệ</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <p><strong>Tên:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Điện thoại:</strong> {{ $contact->phone }}</p>
        <p><strong>Tiêu đề:</strong> {{ $contact->subject }}</p>
        <p><strong>Câu hỏi:</strong></p>
        <p>{{ $contact->question }}</p>

        <h2>Trả lời</h2>
        <form action="{{ route('admin.contacts.update', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="reply" class="form-label">Nội dung trả lời:</label>
                <textarea class="form-control" id="reply" name="reply" rows="5">{{ $contact->reply }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Cập nhật</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
