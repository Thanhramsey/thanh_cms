<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport">
    <meta name="author" content="Themes Industry">
    <meta name="description"
        content="MegaOne is a highly creative, modern, visually stunning and Bootstrap responsive multipurpose studio and portfolio HTML5 template with 8 ready home page demos.">
    <meta name="keywords"
        content="Creative, modern, clean, bootstrap responsive, html5, css3, portfolio, blog, studio, templates, multipurpose, one page, corporate, start-up, studio, branding, designer, freelancer, carousel, parallax, photography, studio, masonry, grid, faq">
    <title>@yield('title', 'Web Hosting | MegaOne HTML5 Template')</title>
    <link href="{{ asset('portal_assets/vendor/img/favicon.ico') }}" rel="icon">
    <link href="{{ asset('portal_assets/vendor/css/bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('portal_assets/vendor/css/owl.carousel.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('portal_assets/vendor/css/LineIcons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('portal_assets/vendor/css/jquery.fancybox.min.css') }}">
    <link href="{{ asset('portal_assets/css/line-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('portal_assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('portal_assets/css/custom.css') }}" rel="stylesheet">
    <!-- Swiper CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.css" />



</head>

<body data-spy="scroll" data-target=".navbar" data-offset="90">

    <div class="loader-bg">
        <div class="loader">
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
            <span></span>
        </div>
    </div>
    <div id="app">
        <header>
            @yield('header')
        </header>

        <main>
            @yield('content')
        </main>

        <footer>
            @yield('footer')
        </footer>
    </div>

    <script src="{{ asset('portal_assets/vendor/js/bundle.min.js') }}"></script>
    <script src="{{ asset('portal_assets/vendor/js/jquery.appear.js') }}"></script>
    <script src="{{ asset('portal_assets/vendor/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('portal_assets/vendor/js/wow.min.js') }}"></script>
    <script src="{{ asset('portal_assets/vendor/js/jquery.fancybox.min.js') }}"></script>
    <script src="{{ asset('portal_assets/js/particles.min.js') }}"></script>

    <script src="{{ asset('portal_assets/vendor/js/contact_us.js') }}"></script>
    <script src="{{ asset('portal_assets/js/circle-progress.min.js') }}"></script>
    <script src="{{ asset('portal_assets/js/script.js') }}"></script>
    <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper@9/swiper-bundle.min.js"></script>
</body>

</html>
