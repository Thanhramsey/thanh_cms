@extends('layouts.admin')

@section('content')
    <div class="container">
        <h1>Chi tiết Liên hệ</h1>
        <p><strong>Tên:</strong> {{ $contact->name }}</p>
        <p><strong>Email:</strong> {{ $contact->email }}</p>
        <p><strong>Điện thoại:</strong> {{ $contact->phone }}</p>
        <p><strong>Tiêu đề:</strong> {{ $contact->subject }}</p>
        <p><strong>Câu hỏi:</strong></p>
        <p>{{ $contact->question }}</p>

        <h2>Trả lời</h2>
        <form action="{{ route('admin.contacts.reply', $contact->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <textarea class="form-control" name="reply" rows="5">{{ $contact->reply }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi trả lời</button>
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-secondary">Quay lại</a>
        </form>
    </div>
@endsection
