 @if ($bannerSettings && $bannerSettings->type === 'particles')
     <section id="particles-js" class="position-relative">
         <div id="home-banner" class="slider-area">
             <div class="container">
                 <div class="row align-items-center">
                     <div class="col-12 col-md-6 col-lg-6 text-md-center text-lg-left wow fadeInLeft content-margin"
                         data-wow-duration="1.5s" data-wow-delay="1.2s">
                         <div class="area-heading text-center text-lg-left">
                             <h1 class="main-font text-white font-weight-bold mb-4">CHÀO MỪNG ĐẾN VỚI <span
                                     class="d-block">BỆNH VIỆN Y HỌC CỔ TRUYỀN GIA LAI</span></h1>
                             <p class="text-white alt-font mb-5">Là cơ sở y tế chuyên sâu về Y học cổ truyền, Bệnh viện
                                 Y học cổ truyền Gia Lai tự hào mang đến dịch vụ khám, chữa bệnh hiệu quả, an toàn bằng
                                 các phương pháp truyền thống kết hợp tinh hoa y học hiện đại, vì sức khỏe cộng đồng.
                             </p>
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
                                     <h1 class="main-font text-white font-weight-bold mb-4">CHÀO MỪNG ĐẾN VỚI
                                         <span class="d-block">BỆNH VIỆN Y HỌC CỔ TRUYỀN GIA LAI</span>
                                     </h1>
                                     <p class="text-white alt-font mb-5">Là cơ sở y tế chuyên sâu về Y học cổ truyền,
                                         Bệnh viện
                                         Y học cổ truyền Gia Lai tự hào mang đến dịch vụ khám, chữa bệnh hiệu quả, an
                                         toàn bằng
                                         các phương pháp truyền thống kết hợp tinh hoa y học hiện đại, vì sức khỏe cộng
                                         đồng.
                                     </p>
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
                 <span class="about-icon"><a href="javascript:void(0);"><i class="fas fa-stethoscope"></i></a></span>
                 <h4 class="small-heading main-font">Khám & Điều trị YHCT</h4>
                 <p class="small-text alt-font">Cung cấp dịch vụ khám, chẩn đoán và điều trị bệnh bằng các phương pháp Y
                     học cổ truyền hiệu quả.</p>
             </div>
             <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.5s">
                 <span class="about-icon"><a href="javascript:void(0);"><i class="fas fa-spa"></i></a></span>
                 <h4 class="small-heading main-font">Các phương pháp trị liệu truyền thống</h4>
                 <p class="small-text alt-font">Áp dụng châm cứu, xoa bóp, bấm huyệt, vật lý trị liệu, thủy châm và các
                     liệu pháp cổ truyền khác.</p>
             </div>
             <div class="col-12 col-md-4 about-media wow zoomIn" data-wow-duration="1.5s" data-wow-delay="1.8s">
                 <span class="about-icon"><a href="javascript:void(0);"><i class="fas fa-microscope"></i></a></span>
                 <h4 class="small-heading main-font">Y học hiện đại kết hợp YHCT</h4>
                 <p class="small-text alt-font">Kết hợp chẩn đoán, xét nghiệm y học hiện đại với các bài thuốc, phương
                     pháp trị liệu cổ truyền.</p>
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
