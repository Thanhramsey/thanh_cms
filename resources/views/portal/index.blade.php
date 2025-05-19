@extends('layouts.portal')

@section('title', 'Trang Chủ Web Hosting')

@section('header')
    <nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
        <div class="container">
            <a href="#slider-area" title="Logo" class="logo scroll">
                <img src="{{ asset('portal_assets/img/logo.png') }}" title="logo" alt="logo" class="logo-default">
            </a>

            <div class="collapse navbar-collapse" id="megaone">
                <div class="navbar-nav ml-auto">
                    @foreach ($menus as $menu)
                        <div class="nav-item {{ $menu->children->count() > 0 ? '' : '' }}">
                            <a class="nav-link hvr-underline-from-left" href="{{ $menu->url }}">{{ $menu->title }}</a>
                            @if ($menu->children->count())
                                <div class="sub-menu">
                                    <div class="menu-column">
                                        @foreach ($menu->children as $child)
                                            <a class="hvr-underline-from-left"
                                                href="{{ $child->url }}">{{ $child->title }}</a>
                                        @endforeach
                                    </div>
                                </div>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="navigation-toggle">
            <ul class="slider-social toggle-btn my-0">
                <li>
                    <a href="javascript:void(0);" class="sidemenu_btn" id="sidemenu_toggle">
                        <span></span>
                        <span></span>
                        <span></span>
                    </a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="side-menu hidden">
        <div class="inner-wrapper">
            <span class="btn-close" id="btn_sideNavClose"><i></i><i></i></span>
            <a href="index-web-hosting.html" title="Logo" class="logo side-logo">
                <img src="{{ asset('portal_assets/img/side-logo.png') }}" alt="logo">
            </a>
            <nav class="side-nav w-100">
                <ul class="navbar-nav side-navbar">
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#slider-area">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#about">Hosting</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#prices">Pricing</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#hosting">Vps Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#testimonials">Reviews</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#blog">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link scroll" href="#contact">Contact Us</a>
                    </li>
                </ul>
            </nav>

            <div class="side-footer w-100">
                <ul class="social-icons-simple">
                    <li><a class="social-icon" href="javascript:void(0)"><i class="fab fa-facebook-f"></i> </a> </li>
                    <li><a class="social-icon" href="javascript:void(0)"><i class="fab fa-twitter"></i> </a> </li>
                    <li><a class="social-icon" href="javascript:void(0)"><i class="fab fa-linkedin-in"></i> </a> </li>
                    <li><a class="social-icon" href="javascript:void(0)"><i class="fab fa-instagram"></i> </a> </li>
                </ul>
                <p>© 2021 MegaOne. Made With Love by Themesindustry</p>
            </div>
        </div>
    </div>
    <a id="close_side_menu" href="javascript:void(0);"></a>
@endsection

@section('content')
    <section id="particles-js" class="p-0 position-relative">
        <div class="slider-area" id="slider-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-12 col-md-6 col-lg-6 text-md-center text-lg-left wow fadeInLeft content-margin"
                        data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <div class="area-heading text-center text-lg-left">
                            <h1 class="main-font text-white font-weight-bold mb-4">CHÀO MỪNG BẠN ĐẾN VỚI <span
                                    class="d-block">VNPT GIA LAI</span></h1>
                            <p class="text-white alt-font mb-5">Là thành viên của Tập đoàn Bưu chính Viễn thông Việt Nam
                                (VNPT). VNPT Gia Lai tự hào là nhà cung cấp hàng đầu các sản phẩm dịch vụ viễn thông - công
                                nghệ thông tin toàn diện cho cá nhân và tổ chức doanh nghiệp.</p>
                            <a href="#about" class="scroll btn btn-medium btn-rounded btn-trans-white mb-5">GET STARTED
                                NOW</a>
                        </div>
                    </div>
                    <div class="col-12 col-md-6 col-lg-6 text-right image-order wow fadeInRight" data-wow-duration="1.5s"
                        data-wow-delay="1.2s">
                        <div class="slider-image">
                            <img src="{{ asset('portal_assets/img/banner-img.png') }}" alt="Slider-Image">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="author-skills bg-blue">
            <div class="container">
                <div class="row text-center text-lg-left">
                    <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.2s">
                        <span class="about-icon"><a href="javascript:void(0);"><i
                                    class="la la-broadcast-tower"></i></a></span>
                        <h4 class="small-heading main-font">Dịch vụ viễn thông</h4>
                        {{-- <p class="small-text alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                    </div>
                    <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.5s">
                        <span class="about-icon"><a href="javascript:void(0);"><i
                                    class="las la-laptop-code"></i></a></span>
                        <h4 class="small-heading main-font">Dịch vụ số</h4>
                        {{-- <p class="small-text alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                    </div>
                    <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.8s">
                        <span class="about-icon"><a href="javascript:void(0);"><i class="las la-city"></i></a></span>
                        <h4 class="small-heading main-font">Hệ sinh thái chuyển đổi số</h4>
                        {{-- <p class="small-text alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section id="about">
        <div class="container">
            <div class="row align-items-center">
                <div class=" col-sm-12 col-md-6 img-sec mt-5 mt-md-0 wow fadeIn order-2 order-md-1"
                    data-wow-duration="1.5s" data-wow-delay=".5s">
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
                        <div class="swiper category-products-{{ $category->id }}">
                            <div class="swiper-wrapper">
                                @foreach ($category->products as $product)
                                    <div class="swiper-slide">
                                        <div class="product-item">
                                            <h3>{{ $product->name }}</h3>
                                            @if ($product->image)
                                                <img src="{{ asset('storage/' . $product->image) }}"
                                                    alt="{{ $product->name }}" style="max-width: 100px;">
                                            @endif
                                            <p>{{ $product->description }}</p>
                                            <a href="{{ $product->link ?? '#' }}" class="btn btn-primary">Xem chi
                                                tiết</a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <div class="swiper-pagination"></div>
                            <div class="swiper-button-prev"></div>
                            <div class="swiper-button-next"></div>
                        </div>
                    @else
                        <p>Không có sản phẩm nào thuộc danh mục này.</p>
                    @endif
                </div>
            @endforeach
        </div>
    </section>

    <!-- Start Blog -->
    <section class="blog-sec" id="blog">
        <div class="container">
            <!--Heading-->
            <div class="row text-center padding-bottom-half">
                <div class="col-12 col-md-10 col-lg-8 offset-md-1 offset-lg-2 wow zoomIn heading-area"
                    data-wow-duration="1s" data-wow-delay=".1s">
                    <h3 class="heading text-center">Our latest blogs will keep <span class="d-block">everyone
                            updated</span></h3>
                </div>
            </div>
            <!--Row-->
            <div class="row wow fadeInUp">
                <!--News Item-->
                <div class="col-lg-4">
                    <div class="news-item">
                        <img alt="image" class="news-img" src="portal_assets/img/blog-img-1.jpg">
                        <div class="news-text-box">
                            <span class="date">October 29, 2020</span>
                            <a href="#.">
                                <h4 class="news-title">Web design is fun</h4>
                            </a>
                            <p class="para">Lorem ipsum dolor sit amet consectetur adipiscing elit ipsum dolor sit am...
                            </p>
                            <a class="author d-flex align-items-center" href="javascript:void(0);">
                                <img alt="image" class="author-img bg-blue" src="portal_assets/img/blog-avatar1.png">
                                <h5 class="author-name text-light-blue">Hena Sword</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <!--News Item-->
                <div class="col-lg-4">
                    <div class="news-item">
                        <img alt="image" class="news-img" src="portal_assets/img/blog-img-2.jpg">
                        <div class="news-text-box">
                            <span class="date">October 29, 2020</span>
                            <a href="#.">
                                <h4 class="news-title">Future of websites</h4>
                            </a>
                            <p class="para">Lorem ipsum dolor sit amet consectetur adipiscing elit ipsum dolor sit am...
                            </p>
                            <a class="author d-flex align-items-center" href="javascript:void(0);">
                                <img alt="image" class="author-img bg-purple"
                                    src="portal_assets/img/blog-avatar2.png">
                                <h5 class="author-name text-light-blue">Teena Walker</h5>
                            </a>
                        </div>
                    </div>
                </div>
                <!--News Item-->
                <div class="col-lg-4">
                    <div class="news-item">
                        <img alt="image" class="news-img" src="portal_assets/img/blog-img-3.jpg">
                        <div class="news-text-box">
                            <span class="date">October 29, 2020</span>
                            <a href="#.">
                                <h4 class="news-title">Digital marketing</h4>
                            </a>
                            <p class="para">Lorem ipsum dolor sit amet consectetur adipiscing elit ipsum dolor sit am...
                            </p>
                            <a class="author d-flex align-items-center" href="javascript:void(0);">
                                <img alt="image" class="author-img bg-pink" src="portal_assets/img/blog-avatar3.png">
                                <h5 class="author-name text-light-blue">David Villas</h5>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Blog -->

    <!-- Start Contact -->
    <section class="contact-sec" id="contact">
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
                                    <input type="text" name="userPhone" placeholder="Contact No"
                                        class="form-control">
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
    </section>
@endsection
@section('footer')
    <footer class="footer">
        <div class="container">
            <div class="row align-items-center">
                <!--Social-->
                <div class="col-12">
                    <div class="footer-social text-center">
                        <ul class="list-unstyled">
                            <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true"
                                        class="fab fa-facebook-f"></i><span></span></a></li>
                            <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true"
                                        class="fab fa-twitter"></i><span></span></a></li>
                            <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true"
                                        class="fab fa-google-plus-g"></i><span></span></a></li>
                            <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true"
                                        class="fab fa-linkedin-in"></i><span></span></a></li>
                            <li><a class="wow fadeInUp" href="javascript:void(0);"><i aria-hidden="true"
                                        class="fab fa-instagram"></i><span></span></a></li>
                            <li><a class="wow fadeInDown" href="javascript:void(0);"><i aria-hidden="true"
                                        class="fab fa-pinterest-p"></i><span></span></a></li>
                        </ul>
                    </div>
                </div>
                <!--Text-->
                <div class="col-12 text-center mt-3">
                    <p class="company-about fadeIn">© 2021 MegaOne. Made With Love By <a
                            href="javascript:void(0);">Themesindustry</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
@endsection
