@extends('layouts.portal')

@section('content')
    <div class="container py-5">
        <h1 class="text-center mb-5">Thư viện Hình ảnh</h1>
        <hr class="mb-5">

        @if ($images->isNotEmpty())
            <div class="row">
                @foreach ($images as $image)
                    <div class="col-md-4 col-sm-6 mb-4">
                        <div class="card h-100 shadow-sm border-0">
                            <div class="image-container">
                                {{-- Bọc hình ảnh trong thẻ <a> với các thuộc tính Fancybox --}}
                                <a href="{{ asset('storage/' . $image->path) }}" data-fancybox="gallery" {{-- data-fancybox="gallery" để tạo một nhóm ảnh --}}
                                    data-caption="{{ $image->title }}"> {{-- data-caption để hiển thị tiêu đề ảnh --}}
                                    <img src="{{ asset('storage/' . $image->path) }}" class="card-img-top img-fluid"
                                        alt="{{ $image->title }}"
                                        onerror="this.onerror=null;this.src='https://placehold.co/600x400/cccccc/333333?text=Image+Not+Found';">
                                </a>
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title text-truncate">{{ $image->title }}</h5>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            <div class="d-flex justify-content-center mt-5">
                {{ $images->links() }}
            </div>
        @else
            <div class="alert alert-info text-center" role="alert">
                Chưa có hình ảnh nào trong thư viện.
            </div>
        @endif
    </div>

    <style>
        /* Custom CSS for image gallery */
        .image-container {
            width: 100%;
            height: 250px;
            /* Chiều cao cố định cho mỗi khung ảnh */
            overflow: hidden;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: #f8f9fa;
        }

        .image-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            /* Đảm bảo hình ảnh lấp đầy khung và bị cắt nếu cần */
            transition: transform 0.3s ease-in-out;
        }

        .image-container img:hover {
            transform: scale(1.05);
            /* Hiệu ứng phóng to nhẹ khi hover */
        }

        .card-title {
            font-size: 1.1rem;
            font-weight: 600;
            color: #343a40;
            margin-bottom: 0;
        }
    </style>
@endsection
