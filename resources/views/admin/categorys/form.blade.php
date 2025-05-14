<div class="mb-3">
    <label for="name" class="form-label">Tên danh mục</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $category->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="module" class="form-label">Module</label>
    <input type="text" class="form-control @error('module') is-invalid @enderror" id="module" name="module"
        value="{{ old('module', $category->module ?? '') }}">
    @error('module')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="active" name="active"
        {{ old('active', $category->active ?? true) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Hoạt động</label>
</div>
