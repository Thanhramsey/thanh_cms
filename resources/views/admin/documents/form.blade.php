<div class="mb-3">
    <label for="title" class="form-label">Tiêu đề</label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', isset($document) ? $document->title : '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="category_id" class="form-label">Loại văn bản</label>
    <select class="form-control @error('category_id') is-invalid @enderror" id="category_id" name="category_id">
        <option value="">-- Chọn loại văn bản --</option>
        @foreach ($documentCategories as $category)
            <option value="{{ $category->id }}"
                {{ old('category_id', isset($document) ? $document->category_id : '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
    @error('category_id')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="so_van_ban" class="form-label">Số văn bản</label>
    <input type="text" class="form-control @error('so_van_ban') is-invalid @enderror" id="so_van_ban"
        name="so_van_ban" value="{{ old('so_van_ban', isset($document) ? $document->so_van_ban : '') }}">
    @error('so_van_ban')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="trich_yeu" class="form-label">Trích yếu</label>
    <textarea class="form-control @error('trich_yeu') is-invalid @enderror" id="trich_yeu" name="trich_yeu">{{ old('trich_yeu', isset($document) ? $document->trich_yeu : '') }}</textarea>
    @error('trich_yeu')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ngay_ban_hanh" class="form-label">Ngày ban hành</label>
    <input type="date" class="form-control @error('ngay_ban_hanh') is-invalid @enderror" id="ngay_ban_hanh"
        name="ngay_ban_hanh"
        value="{{ old('ngay_ban_hanh', isset($document) ? (is_object($document->ngay_ban_hanh) ? $document->ngay_ban_hanh->format('Y-m-d') : $document->ngay_ban_hanh) : '') }}">
    @error('ngay_ban_hanh')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
<div class="mb-3">
    <label for="co_quan_ban_hanh" class="form-label">Cơ quan ban hành</label>
    <input type="text" class="form-control @error('co_quan_ban_hanh') is-invalid @enderror" id="co_quan_ban_hanh"
        name="co_quan_ban_hanh"
        value="{{ old('co_quan_ban_hanh', isset($document) ? $document->co_quan_ban_hanh : '') }}">
    @error('co_quan_ban_hanh')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="ghi_chu" class="form-label">Ghi chú</label>
    <textarea class="form-control @error('ghi_chu') is-invalid @enderror" id="ghi_chu" name="ghi_chu">{{ old('ghi_chu', isset($document) ? $document->ghi_chu : '') }}</textarea>
    @error('ghi_chu')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="file" class="form-label">File đính kèm (PDF, DOCX - Max 10MB)</label>
    <input type="file" class="form-control @error('file') is-invalid @enderror" id="file" name="file">
    @if (isset($document) && $document->file_path)
        <p class="mt-2">File hiện tại: <a href="{{ asset('storage/' . $document->file_path) }}" target="_blank">Tải
                xuống</a></p>
    @endif
    @error('file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>
