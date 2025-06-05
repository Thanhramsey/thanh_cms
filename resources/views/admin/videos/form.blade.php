<div class="mb-3">
    <label for="title" class="form-label">Tiêu đề Video <span class="text-danger">*</span></label>
    <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title"
        value="{{ old('title', $video->title ?? '') }}" required>
    @error('title')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="video_file" class="form-label">Tải lên File Video (MP4, WebM, Ogg - Max 50MB)</label>
    <input type="file" class="form-control @error('video_file') is-invalid @enderror" id="video_file"
        name="video_file" accept="video/mp4,video/webm,video/ogg">
    @if (isset($video) && $video->isLocalVideo())
        <p class="mt-2">File hiện tại: <a href="{{ $video->video_display_url }}" target="_blank">Xem Video Cục Bộ</a>
        </p>
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="clear_current_video"
                name="clear_current_video">
            <label class="form-check-label" for="clear_current_video">
                Xóa video hiện tại (cục bộ hoặc nhúng)
            </label>
        </div>
    @endif
    @error('video_file')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

<div class="mb-3">
    <label for="embed_url" class="form-label">Hoặc URL nhúng (YouTube, Vimeo...)</label>
    <input type="url" class="form-control @error('embed_url') is-invalid @enderror" id="embed_url" name="embed_url"
        value="{{ old('embed_url', isset($video) && $video->isExternalEmbed() ? $video->url : '') }}"
        placeholder="Ví dụ: https://www.youtube.com/watch?v=VIDEO_ID">
    @if (isset($video) && $video->isExternalEmbed())
        <p class="mt-2">URL nhúng hiện tại: <a href="{{ $video->video_display_url }}" target="_blank">Xem Video
                Nhúng</a></p>
        @if (!$video->isLocalVideo())
            {{-- Chỉ hiển thị checkbox xóa nếu không phải local file --}}
            <div class="form-check">
                <input class="form-check-input" type="checkbox" value="1" id="clear_current_video_embed"
                    name="clear_current_video">
                <label class="form-check-label" for="clear_current_video_embed">
                    Xóa video hiện tại (cục bộ hoặc nhúng)
                </label>
            </div>
        @endif
    @endif
    @error('embed_url_input')
        <div class="invalid-feedback">{{ $message }}</div>
    @enderror
</div>

@error('video_source')
    <div class="alert alert-danger mt-3">{{ $message }}</div>
@enderror
