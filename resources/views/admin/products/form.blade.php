@php
    $categories = \App\Models\ProductCategory::all();
@endphp

<div class="mb-3">
    <label for="name">Tên sản phẩm</label>
    <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $product->name ?? '') }}"
        required>
    @error('name')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id">Danh mục</label>
    <select class="form-control" id="category_id" name="category_id" required>
        <option value="">-- Chọn danh mục --</option>
        @foreach ($categories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description">Mô tả</label>
    <textarea class="form-control" id="description" name="description">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="content">Nội dung</label>
    <textarea class="form-control" id="content" name="content">{{ old('content', $product->content ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label for="sku">SKU</label>
    <input type="text" class="form-control" id="sku" name="sku"
        value="{{ old('sku', $product->sku ?? '') }}">
</div>

<div class="mb-3">
    <label for="price">Giá</label>
    <input type="number" step="0.01" class="form-control" id="price" name="price"
        value="{{ old('price', $product->price ?? 0.0) }}" required>
    @error('price')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="quantity">Số lượng</label>
    <input type="number" class="form-control" id="quantity" name="quantity"
        value="{{ old('quantity', $product->quantity ?? 0) }}" required>
    @error('quantity')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="form-group form-check">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
        {{ old('is_active', $product->is_active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Kích hoạt</label>
</div>

<div class="mb-3">
    <label for="link">Link (nếu sản phẩm ở trang khác)</label>
    <input type="url" class="form-control" id="link" name="link"
        value="{{ old('link', $product->link ?? '') }}">
    @error('link')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="image">Hình ảnh đại diện</label>
    <input type="file" class="form-control" id="image" name="image">
    @if (isset($product) && $product->image)
        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}" width="100">
    @endif
    @error('image')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="meta_title">Meta Title</label>
    <input type="text" class="form-control" id="meta_title" name="meta_title"
        value="{{ old('meta_title', $product->meta_title ?? '') }}">
</div>

<div class="mb-3">
    <label for="meta_description">Meta Description</label>
    <textarea class="form-control" id="meta_description" name="meta_description">{{ old('meta_description', $product->meta_description ?? '') }}</textarea>
</div>
