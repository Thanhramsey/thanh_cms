<div class="mb-3">
    <label for="key" class="form-label">Key</label>
    <input type="text" class="form-control" id="key" name="key" value="{{ isset($config) ? $config->key : '' }}"
        {{ isset($config) ? 'readonly' : '' }}>
    @error('key')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="value" class="form-label">Giá trị</label>
    <textarea class="form-control" id="value" name="value">{{ isset($config) ? $config->value : '' }}</textarea>
    @error('value')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="type" class="form-label">Loại</label>
    <select class="form-control" id="type" name="type">
        <option value="text" {{ isset($config) && $config->type === 'text' ? 'selected' : '' }}>Text</option>
        <option value="image" {{ isset($config) && $config->type === 'image' ? 'selected' : '' }}>Image</option>
        <option value="email" {{ isset($config) && $config->type === 'email' ? 'selected' : '' }}>Email</option>
        <option value="number" {{ isset($config) && $config->type === 'number' ? 'selected' : '' }}>Number</option>
        <option value="json" {{ isset($config) && $config->type === 'json' ? 'selected' : '' }}>JSON</option>
    </select>
    @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Mô tả</label>
    <input type="text" class="form-control" id="description" name="description"
        value="{{ isset($config) ? $config->description : '' }}">
    @error('description')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
