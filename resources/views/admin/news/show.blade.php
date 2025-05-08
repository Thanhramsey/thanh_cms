@extends('layouts.admin')

@section('content')
    <h1>Chi tiết Tin Tức</h1>
    <div class="card">
        <div class="card-body">
            <h2>{{ $news->title }}</h2>
            <p><strong>Slug:</strong> {{ $news->slug }}</p>
            <p><strong>Ngày đăng:</strong>
                {{ $news->published_at ? $news->published_at->format('d/m/Y H:i') : 'Chưa đăng' }}</p>
            <p><strong>Trạng thái:</strong> {{ $news->is_published ? 'Đã đăng' : 'Chưa đăng' }}</p>
            @if ($news->image)
                <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="img-fluid mb-3">
            @endif
            <div>
                {!! $news->content !!}
            </div>
            <a href="{{ route('admin.news.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
        </div>
    </div>
@endsection
