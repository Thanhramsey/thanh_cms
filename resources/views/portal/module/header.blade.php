<nav class="navbar navbar-top-default navbar-expand-lg navbar-simple nav-line">
    <div class="container">
        <a href="{{ route('portal.home') }}" title="Logo" class="logo">
            {{-- <img src="{{ asset('portal_assets/img/logo.png') }}" title="logo" alt="logo" class="logo-default"> --}}
            @if ($logo && $logo->value)
                <img src="{{ asset($logo->value) }}" title="logo" alt="logo" class="logo-default">
            @else
                <img src="{{ asset('portal_assets/img/default-logo.png') }}" title="default-logo" alt="default-logo"
                    class="logo-default">
            @endif
        </a>

        <div class="collapse navbar-collapse" id="megaone">
            <div class="navbar-nav ml-auto">
                @foreach ($menus as $menu)
                    <div class="nav-item {{ $menu->children->count() > 0 ? '' : '' }}">
                        <a class="nav-link hvr-underline-from-left" href="{{ url($menu->url) }}">{{ $menu->title }}</a>
                        @if ($menu->children->count())
                            <div class="sub-menu">
                                <div class="menu-column">
                                    @foreach ($menu->children as $child)
                                        <a class="hvr-underline-from-left"
                                            href="{{ url($child->url) }}">{{ $child->title }}</a>
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
        <nav class="side-nav w-100">
            <ul class="navbar-nav side-navbar">
                {{-- Ví dụ một mục tĩnh --}}
                <li class="nav-item">
                    <a class="nav-link scroll" href="#slider-area">Home</a>
                </li>
                {{-- Lặp qua các menu từ biến $menus --}}
                @foreach ($menus as $menu)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($menu->url) }}">{{ $menu->title }}</a>
                        @if ($menu->children->count())
                            <ul class="sub-side-menu list-unstyled"> {{-- Menu con cho sidebar --}}
                                @foreach ($menu->children as $child)
                                    <li>
                                        <a class="nav-link" href="{{ url($child->url) }}">{{ $child->title }}</a>
                                    </li>
                                @endforeach
                            </ul>
                        @endif
                    </li>
                @endforeach
            </ul>
        </nav>
    </div>
</div>
<a id="close_side_menu" href="javascript:void(0);"></a>
