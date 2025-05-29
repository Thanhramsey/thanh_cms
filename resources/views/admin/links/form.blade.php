<div class="mb-3">
    <label for="name" class="form-label">Tên</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', isset($link) ? $link->name : '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="url" class="form-label">URL Liên kết</label>
    <input type="url" class="form-control @error('url') is-invalid @enderror" id="url" name="url"
        value="{{ old('url', isset($link) ? $link->url : '') }}" required>
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image" class="form-label">Hình ảnh</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
    @if (isset($link) && $link->image)
        <img src="{{ asset('storage/' . $link->image) }}" alt="{{ $link->name }}" width="100" class="mt-2">
    @endif
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
