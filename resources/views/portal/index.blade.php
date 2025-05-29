@extends('layouts.portal')

@section('title', 'Trang Chủ Web Hosting')


@section('content')
    @include('portal.module.banner')
    <section id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-sm-12 col-md-6 img-sec mt-5 mt-md-0 wow fadeIn order-2 order-md-1" data-wow-duration="1.5s"
                    data-wow-delay=".5s">
                    <div class="blue_rectangle"></div>
                    <div class="about_img position-relative">
                        <img src="{{ asset('portal_assets/img/about-img.png') }}" alt="About Image">
                        <a data-fancybox="video" href="https://www.youtube.com/watch?v=rRevsM2sW7U"
                            class="video-play-button position-absolute">
                            <i class="las la-play"></i>
                        </a>
                    </div>
                </div>
                <div class="col-sm-12 col-md-6 pl-md-5 wow fadeInRight order-1 order-md-1" data-wow-duration="1.5s"
                    data-wow-delay=".5s">
                    <div class="about-heading">
                        <h1 class="heading margin_heading main-font">Giới thiệu VNPT</h1>
                        <p class="info">Tập đoàn Bưu chính Viễn thông Việt Nam (VNPT) là một trong những doanh nghiệp
                            hàng đầu trong lĩnh vực công nghệ thông tin và viễn thông tại Việt Nam.</p>
                        <p class="info my-4">VNPT không ngừng đổi mới, cung cấp các dịch vụ số hiện đại như hạ tầng mạng,
                            trung tâm dữ liệu, điện toán đám mây, và các giải pháp chuyển đổi số toàn diện cho cá nhân,
                            doanh nghiệp và chính phủ.</p>
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
                                    <p>{{ Str::limit($product->description, 50) }}</p>
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
                <div class="cols-12 col-xl-9">
                    @forelse ($newsCategories as $newsCategory)
                        @if ($newsCategory->news->isNotEmpty())
                            <div class="mb-5 wow zoomIn news-category-box" data-wow-duration="1s" data-wow-delay=".1s">
                                <h2>{{ $newsCategory->name }}</h2>
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
                                                            <h4 class="news-title">{{ $featuredNews->title }}</h4>
                                                        </a>
                                                        <p class="para">{{ Str::limit($featuredNews->excerpt, 150) }}</p>
                                                        <a href="{{ route('portal.news.show', $featuredNews->slug) }}"
                                                            class="btn btn-info btn-sm">Đọc thêm</a>
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
                <div class="cols-12 col-xl-3">
                    @if ($links->isNotEmpty())
                        <div class="sidebar-links">
                            <h5>Liên kết hữu ích</h5>
                            <ul class="list-unstyled">
                                @foreach ($links as $link)
                                    <li class="mb-3">
                                        @if ($link->image)
                                            <a href="{{ $link->url }}" target="_blank">
                                                <img src="{{ asset('storage/' . $link->image) }}"
                                                    alt="{{ $link->name }}" class="img-fluid" style="max-height: 100px;">
                                            </a>
                                            <hr>
                                        @endif
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <!-- Start Contact -->
    @include('portal.module.contact')
    {{-- <section class="contact-sec" id="contact">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-12 col-md-3 text-center">
                    <div class="user-img"><img src="portal_assets/img/footer-logo.png" class="rounded-circle"
                            alt="img"></div>
                    <h4 class="user-name">MegaOne Hosts</h4>
                    <p class="user-designation">email@website.com</p>
                    <p class="user-designation">+1 631 123 4567</p>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row">
                        <div class="col-12" id="result"></div>
                        <div class="col-12 col-md-6">
                            <form class="row contact-form row-padding" id="contact-form-data">
                                <div class="col-12">
                                    <input type="text" name="userName" placeholder="Name" class="form-control">
                                    <input type="text" name="userPhone" placeholder="Contact No" class="form-control">
                                    <input type="email" name="userEmail" placeholder="Email" class="form-control">
                                </div>
                            </form>
                        </div>
                        <div class="col-12 col-md-6 contact-form">
                            <textarea class="form-control" name="userMessage" rows="6" placeholder="Type Your Message Here"></textarea>
                            <a href="javascript:void(0);"
                                class="btn btn-medium btn-rounded btn-trans-white rounded-pill w-100 contact_btn main-font">Let’s
                                Get In Touch</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> --}}
@endsection
