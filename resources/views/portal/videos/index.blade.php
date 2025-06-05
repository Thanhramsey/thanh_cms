@extends('layouts.portal')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Thư viện Video</h1>
        <hr class="mb-5">

        @if ($videos->isNotEmpty())
            <div class="row">
                @foreach ($videos as $video)
                    <div class="col-md-6 col-lg-4 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="video-thumbnail-container">
                                @if ($video->isExternalEmbed() && $video->embed_url)
                                    {{-- Hiển thị video nhúng từ YouTube --}}
                                    <iframe class="video-iframe" src="{{ $video->embed_url }}" frameborder="0"
                                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                                        allowfullscreen></iframe>
                                @elseif ($video->isLocalVideo())
                                    {{-- Hiển thị video cục bộ --}}
                                    <video class="video-player" controls preload="metadata">
                                        <source src="{{ asset('storage/' . $video->video_path) }}" type="video/mp4">
                                        Trình duyệt của bạn không hỗ trợ thẻ video.
                                    </video>
                                @else
                                    {{-- Placeholder nếu không có video nào --}}
                                    <div class="no-video-placeholder">
                                        <i class="fas fa-video-slash fa-3x text-muted"></i>
                                        <p class="text-muted mt-2">Không có video</p>
                                    </div>
                                @endif
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-truncate">{{ $video->title }}</h5>
                                {{-- Nếu bạn có trường description trong bảng video, bạn có thể hiển thị nó ở đây --}}
                                {{-- @if ($video->description)
                                    <p class="card-text">{{ Str::limit($video->description, 100) }}</p>
                                @endif --}}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $videos->links() }}
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Chưa có video nào trong thư viện.
            </div>
        @endif
    </div>

    <style>
        /* Custom CSS for video gallery */
        .video-thumbnail-container {
            position: relative;
            width: 100%;
            padding-bottom: 56.25%;
            /* Tỷ lệ khung hình 16:9 (chiều cao / chiều rộng * 100) */
            height: 0;
            overflow: hidden;
            background-color: #000;
            /* Nền đen cho khung video */
            border-top-left-radius: 0.25rem;
            /* Bo góc trên cho card */
            border-top-right-radius: 0.25rem;
        }

        .video-thumbnail-container .video-iframe,
        .video-thumbnail-container .video-player,
        .video-thumbnail-container .no-video-placeholder {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
        }

        .video-thumbnail-container .no-video-placeholder {
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            color: #ccc;
            background-color: #f0f0f0;
            text-align: center;
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0;
        }
    </style>
@endsection
