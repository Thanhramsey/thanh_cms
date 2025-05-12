<div class="mb-3">
    <label for="title" class="form-label">Tiêu đề</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $news->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="slug" class="form-label">Slug (URL)</label>
    <input type="text" class="form-control @error('slug') is-invalid @enderror" id="slug" name="slug"
        value="{{ old('slug', $news->slug ?? '') }}">
    @error('slug')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="summary" class="form-label">Tóm tắt</label>
    <textarea class="form-control @error('summary') is-invalid @enderror" id="summary" name="summary" rows="3">{{ old('summary', $news->summary ?? '') }}</textarea>
    @error('summary')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="content" class="form-label">Nội dung</label>
    <textarea class="form-control @error('content') is-invalid @enderror" id="content" name="content" rows="10">{{ old('content', $news->content ?? '') }}</textarea>
    @error('content')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Hình ảnh</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
    @if (isset($news) && $news->image)
        <img src="{{ asset('storage/' . $news->image) }}" alt="{{ $news->title }}" class="mt-2"
            style="max-width: 200px;">
    @endif
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_published" name="is_published"
        {{ old('is_published', $news->is_published ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_published">Đăng ngay</label>
</div>

@if (isset($users))
    <div class="mb-3">
        <label for="user_id" class="form-label">Người đăng</label>
        <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value="">-- Chọn người đăng --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', $news->user_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endif
