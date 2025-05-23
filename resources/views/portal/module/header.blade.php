<nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
    <div class="container">
        <a href="{{ route('portal.home') }}" title="Logo" class="logo">
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
