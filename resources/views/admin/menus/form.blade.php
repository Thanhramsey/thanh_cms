<div class="mb-3">
    <label for="title">Tiêu đề</label>
    <input type="text" name="title" id="title" class="form-control @error('title') is-invalid @enderror"
        value="{{ old('title', $menu->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="url">Đường dẫn</label>
    <input type="text" name="url" id="url" class="form-control @error('url') is-invalid @enderror"
        value="{{ old('url', $menu->url ?? '') }}" required>
    @error('url')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="order">Thứ tự</label>
    <input type="number" name="order" id="order" class="form-control @error('order') is-invalid @enderror"
        value="{{ old('order', $menu->order ?? 0) }}">
    @error('order')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="parent_id">Menu cha</label>
    <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
        <option value="">-- Chọn Menu cha --</option>
        @foreach ($parentMenus as $parentMenu)
            <option value="{{ $parentMenu->id }}"
                {{ old('parent_id', $menu->parent_id ?? '') == $parentMenu->id ? 'selected' : '' }}>
                {{ $parentMenu->title }}
            </option>
        @endforeach
    </select>
    @error('parent_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
