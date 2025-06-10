@extends('layouts.portal')

@section('title', 'Trang Chủ Web Hosting')


@section('content')
    @include('portal.module.banner')
    <section id="about">
        <div class="marquee-container">
            <div class="marquee-content">
                @if (isset($marquee) && $marquee->value)
                    <p>
                        {{ $marquee->value }}
                    </p>
                @endif
            </div>
        </div>
        <div class="container">
            <div class="row align-items-center">
                <div class="col-sm-12 col-md-6 img-sec mt-5 mt-md-0 wow fadeIn order-2 order-md-1" data-wow-duration="1.5s"
                    data-wow-delay=".5s">
                    <div class="blue_rectangle"></div>
                    <div class="about_img position-relative">
                        <img src="{{ asset('portal_assets/img/info.png') }}" alt="Slider-Image">
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 pl-md-5 wow fadeInRight order-1 order-md-1" data-wow-duration="1.5s"
                    data-wow-delay=".5s">
                    <div class="about-heading">
                        <h1 class="heading margin_heading main-font">Giới thiệu Bệnh viện</h1>
                        <p class="info">
                            Bệnh viện Y học Cổ truyền tỉnh Gia Lai là đơn vị y tế chuyên sâu về khám, chữa bệnh bằng phương
                            pháp Y học cổ truyền kết hợp với Y học hiện đại.
                        </p>
                        <p class="info my-4">
                            Với đội ngũ y bác sĩ giàu kinh nghiệm, trang thiết bị hiện đại cùng sự kết hợp giữa các bài
                            thuốc Đông y truyền thống và kỹ thuật Tây y, bệnh viện luôn nỗ lực mang đến chất lượng điều trị
                            hiệu quả, an toàn cho người dân trên địa bàn và khu vực Tây Nguyên.
                        </p>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <section id="product-list">
        <div class="container">
            @foreach ($productCategories as $category)
                <div id="{{ Str::slug($category->name) }}" class="mb-5">
                    <h2>{{ $category->name }}</h2>
                    @if ($category->products->isNotEmpty())
                        <div class="owl-carousel category-products-{{ $category->id }}">
                            @foreach ($category->products as $product)
                                <div class="product-item">
                                    <h3>{{ $product->name }}</h3>
                                    @if ($product->image)
                                        <img src="{{ asset('storage/' . $product->image) }}" alt="{{ $product->name }}"
                                            style="max-width: 100px;">
                                    @endif

                                    @if (isset($product) && $product->description)
                                        <p>
                                            {{ Str::limit($product->description, 50) }}
                                        </p>
                                    @endif

                                    <a href="{{ route('portal.product.show', $product->slug) }}"
                                        class="btn btn-primary btn-sm">Xem chi tiết</a>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-12 text-right mt-3">
                            <h5>
                                <a href="{{ route('portal.product.category', $category->slug) }}">Xem Thêm >></a>
                            </h5>
                        </div>
                    @else
                        <p>Không có sản phẩm nào thuộc danh mục này.</p>
                    @endif
                </div>
            @endforeach
        </div>


    </section>

    <!-- Start Blog -->
    <section class="blog-sec" id="news-section">
        <div class="container">
            <div class="row">
                <div class="cols-12 col-xl-8">
                    @forelse ($newsCategories as $newsCategory)
                        @if ($newsCategory->news->isNotEmpty())
                            <h2 class="header-text">{{ $newsCategory->name }}</h2>
                            <div class="mb-5 wow zoomIn news-category-box" data-wow-duration="1s" data-wow-delay=".1s">
                                <div class="row">
                                    @if ($newsCategory->news->isNotEmpty())
                                        @php
                                            $featuredNews = $newsCategory->news->first(); // Lấy tin đầu tiên làm nổi bật
                                            $remainingNews = $newsCategory->news->skip(1)->take(5); // Lấy các tin còn lại (tối đa 5)
                                        @endphp
                                        <div class="col-lg-6">
                                            @if ($featuredNews)
                                                <div class="news-item featured-news">
                                                    @if ($featuredNews->image)
                                                        <img alt="{{ $featuredNews->title }}" class="news-img w-100"
                                                            src="{{ asset('storage/' . $featuredNews->image) }}"
                                                            style="object-fit: cover; max-height: 400px;">
                                                    @else
                                                        <img alt="default image" class="news-img w-100"
                                                            src="{{ asset('portal_assets/img/default-news.png') }}"
                                                            style="object-fit: cover; max-height: 400px;">
                                                    @endif
                                                    <div class="news-text-box mt-3">
                                                        <span
                                                            class="date">{{ $featuredNews->created_at->format('F j, Y') }}</span>
                                                        <a href="{{ route('portal.news.show', $featuredNews->slug) }}">
                                                            <h5 class="news-title">{{ $featuredNews->title }}</h5>
                                                        </a>
                                                        <p class="para">{{ Str::limit($featuredNews->excerpt, 150) }}</p>
                                                        {{-- <a href="{{ route('portal.news.show', $featuredNews->slug) }}"
                                                            class="btn btn-info btn-sm">Đọc thêm</a> --}}
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                        <div class="col-lg-6">
                                            <ul class="list-unstyled">
                                                @forelse ($remainingNews as $news)
                                                    <li class="mb-3">
                                                        <div class="d-flex align-items-center">
                                                            @if ($news->image)
                                                                <img src="{{ asset('storage/' . $news->image) }}"
                                                                    alt="{{ $news->title }}"
                                                                    style="width: 80px; height: 60px; object-fit: cover;margin-right:10px"
                                                                    class="me-3">
                                                            @else
                                                                <img src="{{ asset('portal_assets/img/default-news-small.png') }}"
                                                                    alt="default"
                                                                    style="width: 80px; height: 60px; object-fit: cover;margin-right:10px"
                                                                    class="me-3">
                                                            @endif
                                                            <div>
                                                                <a href="{{ route('portal.news.show', $news->slug) }}"
                                                                    class="text-dark stretched-link">{{ $news->title }}</a>
                                                                <small
                                                                    class="text-muted d-block">{{ $news->created_at->format('M d, Y') }}</small>
                                                            </div>
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="text-muted">Không có tin tức khác.</li>
                                                @endforelse
                                                @if ($newsCategory->news->count() > 6)
                                                    <li class="mt-3 text-center">
                                                        <a href="{{ route('portal.news.category', $newsCategory->slug) }}"
                                                            class="btn btn-outline-info btn-sm">Xem thêm tin tức
                                                            {{ $newsCategory->name }}</a>
                                                    </li>
                                                @endif
                                            </ul>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    @empty
                        <div class="col-12 text-center">
                            <p>Chưa có tin tức nào.</p>
                        </div>
                    @endforelse
                </div>
                <div class="cols-12 col-xl-4">
                    @if ($links->isNotEmpty())
                        <h3 class="header-text">Liên kết hữu ích</h3>
                        <div class="sidebar-links news-category-box">
                            <ul class="list-unstyled">
                                @foreach ($links as $link)
                                    <li class="mb-3">
                                        @if ($link->image)
                                            <a href="{{ $link->url }}" target="_blank">
                                                <img src="{{ asset('storage/' . $link->image) }}"
                                                    alt="{{ $link->name }}" class="img-fluid"
                                                    style="max-height: 100px;width:100%">
                                            </a>
                                            <hr>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <h3 class="header-text">Văn bản</h3>
                    <div class="sidebar-documents news-category-box">
                        @if ($documents->isNotEmpty())
                            <div class="vertical-marquee-container">
                                <ul class="list-unstyled vertical-marquee-content">
                                    {{-- Original content --}}
                                    @foreach ($documents as $document)
                                        <li class="mb-2">
                                            <i class="fas fa-file-alt me-2"></i>
                                            <a
                                                href="{{ route('portal.documents.show', $document->id) }}">{{ $document->title }}</a>
                                            @if ($document->file_path)
                                                <span class="ms-2">
                                                    <a href="{{ asset('storage/' . $document->file_path) }}"
                                                        target="_blank" class="btn btn-sm btn-outline-info">Tải</a>
                                                </span>
                                            @endif
                                        </li>
                                    @endforeach

                                    {{-- Duplicate content for seamless loop (only if there's more than one item) --}}
                                    @if ($documents->count() > 1)
                                        @foreach ($documents as $document)
                                            <li class="mb-2" aria-hidden="true">
                                                <i class="fas fa-file-alt me-2"></i>
                                                <a
                                                    href="{{ route('portal.documents.show', $document->id) }}">{{ $document->title }}</a>
                                                @if ($document->file_path)
                                                    <span class="ms-2">
                                                        <a href="{{ asset('storage/' . $document->file_path) }}"
                                                            target="_blank" class="btn btn-sm btn-outline-info">Tải</a>
                                                    </span>
                                                @endif
                                            </li>
                                        @endforeach
                                    @endif
                                </ul>
                            </div>
                        @else
                            <ul class="list-unstyled">
                                <li>Không có văn bản nào.</li>
                            </ul>
                        @endif
                    </div>
                    <h3 class="header-text">Thống kê truy cập</h3>
                    <div class="sidebar-statistics news-category-box">

                        <ul class="list-unstyled">
                            <li class="mb-2">Đang online: <strong>{{ $statistics['online'] }}</strong></li>
                            <li class="mb-2">Hôm nay: <strong>{{ $statistics['today'] }}</strong></li>
                            <li class="mb-2">Trong tuần: <strong>{{ $statistics['this_week'] }}</strong></li>
                            <li class="mb-2">Trong tháng: <strong>{{ $statistics['this_month'] }}</strong></li>
                            <li class="mb-2">Tất cả: <strong>{{ $statistics['total'] }}</strong></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->
    @php
        $promoteUrl = null; // Khởi tạo promoteUrl là null
        if (isset($promote) && $promote->description) {
            // Kiểm tra promote và promote->description tồn tại
            $promoteUrl = $promote->description;
            // Kiểm tra nếu URL không bắt đầu bằng "http://" hoặc "https://"
            if (!preg_match('~^(?:f|ht)tps?://~i', $promoteUrl)) {
                $promoteUrl = 'https://' . $promoteUrl; // Mặc định thêm https://
            }
        }
    @endphp

    {{-- Sử dụng $promoteUrl trong thẻ <a> --}}
    @if ($promoteUrl)
        <a href="{{ $promoteUrl }}" target="_blank">
            <img class="promote-img" src="{{ asset($promote->value ?? '') }}"> {{-- Thêm ?? '' cho promote->value phòng khi nó null --}}
        </a>
    @else
    @endif

    <!-- Start Contact -->
    @include('portal.module.contact')

@endsection
