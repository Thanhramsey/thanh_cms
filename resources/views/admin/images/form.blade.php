<div class="row mb-3">
    <div class="col-lg-4 col-sm-4">
        <div class="mb-0">
            <label for="title" class="form-label">Tiêu đề</label>
            <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
                value="{{ old('title', $image->title ?? '') }}" required>
            @error('title')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    {{-- <div class="col-lg-4 col-sm-4">
        <div class="mb-0">
            <label for="group" class="form-label">Nhóm ảnh</label>
            <select class="form-select @error('group') is-invalid @enderror" id="group" name="group">
                <option value="">-- Chọn nhóm ảnh --</option>
                <option value="0" {{ old('group', $image->group ?? '') == '0' ? 'selected' : '' }}>Ảnh Banner
                </option>
                <option value="1" {{ old('group', $image->group ?? '') == '1' ? 'selected' : '' }}>Ảnh Thường
                </option>
            </select>
            @error('group')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
     --}}
    <div class="col-lg-4 col-sm-4">
        <div class="mb-0">
            <label for="group" class="form-label">Nhóm ảnh</label>
            <select class="form-select @error('category_id') is-invalid @enderror" id="group" name="group">
                <option value="">-- Chọn danh mục --</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ old('category_id', $image->group ?? '') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
    <div class="col-lg-4 col-sm-4">
        <div class="mb-0">
            <label for="order" class="form-label">Thứ tự</label>
            <input type="number" class="form-control @error('order') is-invalid @enderror" id="order"
                name="order" value="{{ old('order', $image->order ?? '') }}">
            @error('order')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>
</div>

<div class="mb-3">
    <label for="image" class="form-label">Hình ảnh</label>
    <input type="file" class="form-control @error('image') is-invalid @enderror" id="image" name="image">
    @if (isset($image) && $image->path)
        <img src="{{ asset('storage/' . $image->path) }}" alt="{{ $image->alt_text ?? ($image->title ?? 'Ảnh') }}"
            class="mt-2" style="max-width: 150px;max-height: 150px;">
    @endif
    @error('image')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="alt_text" class="form-label">Alt Text</label>
    <input type="text" class="form-control @error('alt_text') is-invalid @enderror" id="alt_text" name="alt_text"
        value="{{ old('alt_text', $image->alt_text ?? '') }}">
    @error('alt_text')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="description" class="form-label">Mô tả</label>
    <textarea class="form-control @error('description') is-invalid @enderror" id="description" name="description"
        rows="3">{{ old('description', $image->description ?? '') }}</textarea>
    @error('description')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3 form-check">
    <input type="checkbox" class="form-check-input" id="active" name="active"
        {{ old('active', $image->active ?? false) ? 'checked' : '' }}>
    <label class="form-check-label" for="active">Hoạt động</label>
</div>

@if (isset($users))
    <div class="mb-3">
        <label for="user_id" class="form-label">Người đăng</label>
        <select class="form-select @error('user_id') is-invalid @enderror" id="user_id" name="user_id">
            <option value="">-- Chọn người đăng --</option>
            @foreach ($users as $user)
                <option value="{{ $user->id }}"
                    {{ old('user_id', $image->user_id ?? '') == $user->id ? 'selected' : '' }}>
                    {{ $user->name }}
                </option>
            @endforeach
        </select>
        @error('user_id')
            <div class="invalid-feedback">{{ $message }}</div>
        @enderror
    </div>
@endif
