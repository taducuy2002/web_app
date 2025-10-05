<header class="p-header" id="header">
    <div class="p-header-inner">
        <div class="p-header-content">
            <div class="p-header-logo p-header-logo--image">
                <a href="{{ route('home') }}">
                    <img src="{{ route('theme.asset', ['path' => 'styles/vipcorel.png']) }}" alt="VIPcorel.com" />
                </a>
            </div>
    <form action="{{ route('search') }}" method="get">
        <input type="text" name="q" value="{{ request('q') }}" placeholder="Tìm kiếm">
        <button type="submit">Tìm</button>
    </form>
            @isset($categories)
                <div class="p-navSticky p-navSticky--primary">
                    <nav class="p-nav">
                        <div class="p-nav-inner">
                            <div class="p-nav-scroller hScroller">
                                <div class="hScroller-scroll">
                                    <ul class="p-nav-list js-offCanvasNavSource">
                                        <li>
                                            <div class="p-navEl">
                                                <a href="{{ route('home') }}" class="p-navEl-link">Trang chủ</a>
                                            </div>
                                        </li>
                                        @foreach($categories as $cat)
                                            <li>
                                                <div class="p-navEl">
                                                    <a href="{{ route('category.show', $cat->slug) }}" class="p-navEl-link">{{ $cat->name }}</a>
                                                </div>
                                            </li>
                                        @endforeach
                                        <li>
                                            <div class="p-navEl"><a href="{{ route('help') }}" class="p-navEl-link">Trợ giúp</a></div>
                                        </li>
                                        <li>
                                            <div class="p-navEl"><a href="{{ route('contact') }}" class="p-navEl-link">Liên hệ</a></div>
                                        </li>
                                        <li>
                                            <div class="p-navEl"><a href="{{ route('admin.dashboard') }}" class="p-navEl-link">Admin</a></div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </nav>
                </div>
            @endisset
        </div>
    </div>
</header>


