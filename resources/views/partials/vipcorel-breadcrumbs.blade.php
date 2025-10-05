@if(isset($breadcrumbs) && count($breadcrumbs) > 0)
    <ul class="p-breadcrumbs p-breadcrumbs--bottom" itemprop="itemListElement" itemscope itemtype="https://schema.org/BreadcrumbList">
        @foreach($breadcrumbs as $index => $breadcrumb)
            <li itemprop="itemListElement" itemscope itemtype="https://schema.org/ListItem">
                @if(isset($breadcrumb['url']) && !$loop->last)
                    <a href="{{ $breadcrumb['url'] }}" itemprop="item">
                        <span itemprop="name">{{ $breadcrumb['label'] }}</span>
                    </a>
                @else
                    <span itemprop="name">{{ $breadcrumb['label'] }}</span>
                @endif
                <meta itemprop="position" content="{{ $index + 1 }}" />
            </li>
        @endforeach
    </ul>
@endif

