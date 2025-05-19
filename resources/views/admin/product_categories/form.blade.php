<div class="mb-3">
    <label for="name">Tên</label>
    <input type="text" class="form-control" id="name" name="name"
        value="{{ old('name', $productCategory->name ?? '') }}" required>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description">Mô tả</label>
    <textarea class="form-control" id="description" name="description">{{ old('description', $productCategory->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="parent_id">Danh mục cha</label>
    <select class="form-control" id="parent_id" name="parent_id">
        <option value="">-- Chọn danh mục cha --</option>
        @foreach ($categories as $category)
            @if ($category->id != ($productCategory->id ?? null))
                <option value="{{ $category->id }}"
                    {{ old('parent_id', $productCategory->parent_id ?? '') == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endif
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label for="order">Thứ tự</label>
    <input type="number" class="form-control" id="order" name="order"
        value="{{ old('order', $productCategory->order ?? 0) }}">
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
        {{ old('is_active', $productCategory->is_active ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Kích hoạt</label>
</div>

<div class="mb-3">
    <label for="meta_title">Meta Title</label>
    <input type="text" class="form-control" id="meta_title" name="meta_title"
        value="{{ old('meta_title', $productCategory->meta_title ?? '') }}">
</div>

<div class="mb-3">
    <label for="meta_description">Meta Description</label>
    <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description', $productCategory->meta_description ?? '') }}</textarea>
</div>
