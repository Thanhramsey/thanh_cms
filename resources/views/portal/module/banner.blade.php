 @if ($bannerSettings && $bannerSettings->type === 'particles')
     <section id="particles-js" class="position-relative">
         <div id="home-banner" class="slider-area">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-12 col-md-6 col-lg-6 text-md-center text-lg-left wow fadeInLeft content-margin"
                         data-wow-duration="1.5s" data-wow-delay="1.2s">
                         <div class="area-heading text-center text-lg-left">
                             <h1 class="main-font text-white font-weight-bold mb-4">CHÀO MỪNG BẠN ĐẾN VỚI <span
                                     class="d-block">VNPT GIA LAI</span></h1>
                             <p class="text-white alt-font mb-5">Là thành viên của Tập đoàn Bưu chính Viễn thông Việt
                                 Nam
                                 (VNPT). VNPT Gia Lai tự hào là nhà cung cấp hàng đầu các sản phẩm dịch vụ viễn thông -
                                 công
                                 nghệ thông tin toàn diện cho cá nhân và tổ chức doanh nghiệp.</p>
                             <a href="#about" class="scroll btn btn-medium btn-rounded btn-trans-white mb-5">GET
                                 STARTED
                                 NOW</a>
                         </div>
                     </div>
                     <div class="col-12 col-md-6 col-lg-6 text-right image-order wow fadeInRight"
                         data-wow-duration="1.5s" data-wow-delay="1.2s">
                         <div class="slider-image">
                             <img src="{{ asset('portal_assets/img/banner-img.png') }}" alt="Slider-Image">
                         </div>
                     </div>
                 </div>
             </div>
         </div>
     @elseif ($bannerSettings && $bannerSettings->type == 'slider' && $bannerImages->isNotEmpty())
         <section id="home-banner" class="position-relative slider-img">
             <div class="">
                 <div class="owl-carousel home-slider">
                     @foreach ($bannerImages as $image)
                         <div class="slide">
                             <img src="{{ asset('storage/' . $image->path) }}" alt="Banner Slide"
                                 class="img-fluid w-100">
                             {{-- Bạn có thể thêm caption hoặc nội dung khác cho slide nếu cần --}}
                         </div>
                     @endforeach
                 </div>
             </div>
         @else
             {{-- Hiển thị banner mặc định hoặc không hiển thị gì nếu không có cài đặt --}}
             <section id="particles-js" class="position-relative">
                 <div id="home-banner" class="slider-area">
                     <div class="container">
                         <div class="row align-items-center">
                             <div class="col-12 col-md-6 col-lg-6 text-md-center text-lg-left wow fadeInLeft content-margin"
                                 data-wow-duration="1.5s" data-wow-delay="1.2s">
                                 <div class="area-heading text-center text-lg-left">
                                     <h1 class="main-font text-white font-weight-bold mb-4">CHÀO MỪNG BẠN ĐẾN VỚI <span
                                             class="d-block">VNPT GIA LAI</span></h1>
                                     <p class="text-white alt-font mb-5">Là thành viên của Tập đoàn Bưu chính Viễn thông
                                         Việt
                                         Nam
                                         (VNPT). VNPT Gia Lai tự hào là nhà cung cấp hàng đầu các sản phẩm dịch vụ viễn
                                         thông
                                         -
                                         công
                                         nghệ thông tin toàn diện cho cá nhân và tổ chức doanh nghiệp.</p>
                                     <a href="#about"
                                         class="scroll btn btn-medium btn-rounded btn-trans-white mb-5">GET
                                         STARTED
                                         NOW</a>
                                 </div>
                             </div>
                             <div class="col-12 col-md-6 col-lg-6 text-right image-order wow fadeInRight"
                                 data-wow-duration="1.5s" data-wow-delay="1.2s">
                                 <div class="slider-image">
                                     <img src="{{ asset('portal_assets/img/banner-img.png') }}" alt="Slider-Image">
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
 @endif
 <div class="author-skills bg-blue">
     <div class="container">
         <div class="row text-center text-lg-left">
             <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.2s">
                 <span class="about-icon"><a href="javascript:void(0);"><i class="la la-broadcast-tower"></i></a></span>
                 <h4 class="small-heading main-font">Dịch vụ viễn thông</h4>
                 {{-- <p class="small-text alt-font">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p> --}}
             </div>
             <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.5s">
                 <span class="about-icon"><a href="javascript:void(0);"><i class="las la-laptop-code"></i></a></span>
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
 <script>
     document.addEventListener('DOMContentLoaded', function() {
         @foreach ($productCategories as $category)
             $('.owl-carousel.category-products-{{ $category->id }}').owlCarousel({
                 loop: true, // Tùy chỉnh: true nếu bạn muốn lặp
                 margin: 20,
                 nav: true,
                 dots: false,
                 items: 3,
                 autoplay: true,
                 responsive: {
                     0: {
                         items: 1
                     },
                     600: {
                         items: 3
                     },
                     1000: {
                         items: 3
                     }
                 },
             });
         @endforeach
     });
 </script>
