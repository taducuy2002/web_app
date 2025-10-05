<header class="p-header" id="header">
    <div class="p-header-inner">
        <div class="p-header-content">
            <div class="p-header-logo p-header-logo--image">
                <a href="{{ route('home') }}">
                    <img src="{{ route('theme.asset', ['path' => 'styles/vipcorel.png']) }}"
                        alt="VIPcorel.com - Thư viện mẫu thiết kế đồ họa CorelDRAW (CDR)."
                        />
                </a>
            </div>
            <div class="search-header">
                <form action="{{ route('search') }}" method="get" class="form-inline">
                    <input type="text" class="input form-control" name="q" placeholder="Tìm kiếm" aria-label="Tìm kiếm" value="{{ request('q') }}" />
                    <button type="submit" class="nut-tk">Tìm kiếm</button>
                </form>
            </div>
        </div>
    </div>
</header>

<div class="p-navSticky p-navSticky--primary" data-xf-init="sticky-header">
    <nav class="p-nav">
        <div class="p-nav-inner">
            <a class="p-nav-menuTrigger" data-xf-click="off-canvas" data-menu=".js-headerOffCanvasMenu" role="button" tabindex="0">
                <i aria-hidden="true"></i>
                <span class="p-nav-menuText">Menu</span>
            </a>
            <div class="p-nav-smallLogo">
                <a href="{{ route('home') }}">
                    <img src="{{ route('theme.asset', ['path' => 'styles/vipcorel.png']) }}"
                        alt="VIPcorel.com - Thư viện mẫu thiết kế đồ họa CorelDRAW (CDR)."
                    />
                </a>
            </div>
            <div class="p-nav-scroller hScroller" data-xf-init="h-scroller" data-auto-scroll=".p-navEl.is-selected">
                <div class="hScroller-scroll">
                    <ul class="p-nav-list js-offCanvasNavSource">
                        <li>
                            <div class="p-navEl {{ request()->routeIs('home') ? 'is-selected' : '' }}">
                                <a href="{{ route('home') }}" class="p-navEl-link" data-nav-id="home">Trang chủ</a>
                            </div>
                        </li>
                        @foreach($categories ?? [] as $cat)
                            <li>
                                <div class="p-navEl {{ request()->routeIs('category.show') && request()->route('slug') == $cat->slug ? 'is-selected' : '' }}">
                                    <a href="{{ route('category.show', $cat->slug) }}" class="p-navEl-link" data-nav-id="category-{{ $cat->slug }}">{{ $cat->name }}</a>
                                </div>
                            </li>
                        @endforeach
                        <li>
                            <div class="p-navEl">
                                <a href="{{ route('help') }}" class="p-navEl-link" data-nav-id="help">Trợ giúp</a>
                            </div>
                        </li>
                        @auth
                            <li>
                                <div class="p-navEl">
                                    <form action="{{ route('logout') }}" method="post">
                                        @csrf
                                        <button class="p-navEl-link" style="background:none;border:0;cursor:pointer">Đăng xuất ({{ auth()->user()->name }})</button>
                                    </form>
                                </div>
                            </li>
                        @else
                            <li>
                                <div class="p-navEl">
                                    <a href="{{ route('login.show') }}" class="p-navEl-link" data-nav-id="login">Đăng nhập</a>
                                </div>
                            </li>
                            <li>
                                <div class="p-navEl">
                                    <a href="{{ route('register.show') }}" class="p-navEl-link" data-nav-id="register">Đăng ký</a>
                                </div>
                            </li>
                        @endauth
                        <li>
                            <div class="p-navEl">
                                <a href="{{ route('contact') }}" class="p-navEl-link" data-nav-id="contact">Liên hệ</a>
                            </div>
                        </li>
                        <li>
                            <div class="p-navEl">
                                <a href="{{ route('admin.dashboard') }}" class="p-navEl-link" data-nav-id="admin">Admin</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
</div>
