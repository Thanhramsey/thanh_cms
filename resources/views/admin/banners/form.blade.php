<div class="mb-3">
    <label for="type" class="form-label">Loại Banner</label>
    <select class="form-control" id="type" name="type">
        <option value="particles" {{ isset($banner) && $banner->type === 'particles' ? 'selected' : '' }}>Particles.js
        </option>
        <option value="slider" {{ isset($banner) && $banner->type === 'slider' ? 'selected' : '' }}>Slider</option>
    </select>
    @error('type')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="is_active" name="is_active"
        {{ isset($banner) && $banner->is_active ? 'checked' : '' }}>
    <label class="form-check-label" for="is_active">Hiển thị</label>
    @error('is_active')
        <div class="alert alert-danger">{{ $message }}</div>
    @enderror
</div>
