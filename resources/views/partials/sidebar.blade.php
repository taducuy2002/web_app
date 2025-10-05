<aside class="p-sidebar">
    @include('partials.widget-latest-posts')
    @include('partials.widget-latest-activity')
    @include('partials.widget-authors')

    @isset($categories)
        <section class="block block--categories">
            <h3 class="block-header">Danh mục</h3>
            <div class="block-body">
                <ul class="block-body--list">
                    @foreach($categories as $cat)
                        <li><a href="{{ route('category.show', $cat->slug) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
        </section>
    @endisset
</aside>


