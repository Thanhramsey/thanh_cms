<div class="mb-3">
    <label for="name" class="form-label">Tên vai trò</label>
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name"
        value="{{ old('name', $role->name ?? '') }}" required>
    @error('name')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
