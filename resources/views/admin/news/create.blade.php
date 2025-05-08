@extends('layouts.admin')

@section('content')
    <h1>Thêm Tin Tức Mới</h1>
    <form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="slug" class="form-label">Slug (URL thân thiện)</label>
            <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
                value="{{ old('slug') }}" required>
            <small class="form-text text-muted">Sẽ được tạo tự động nếu bạn bỏ trống.</small>
            @error('slug')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Nội dung</label>
            <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="5"
                required>{{ old('content') }}</textarea>
            @error('content')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Hình ảnh minh họa</label>
            <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
            @error('image')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3 form-check">
            <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
                {{ old('is_published') ? 'checked' : '' }}>
            <label class="form-check-label" for="is_published">Đã đăng</label>
        </div>
        <button type="submit" class="btn btn-primary">Lưu</button>
        <a href="{{ route('admin.news.index') }}" class="btn btn-secondary">Hủy</a>
    </form>
@endsection
