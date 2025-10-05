@if(isset($latestActivity) && $latestActivity->count())
<section class="block block--latestActivity">
    <h3 class="block-header">Hoạt động gần đây</h3>
    <div class="block-body">
        <ul class="block-body--list">
            @foreach($latestActivity as $item)
                <li>
                    <a href="{{ route('post.show', $item->slug) }}">{{ $item->title }}</a>
                    <small>{{ optional($item->published_at)->diffForHumans() }}</small>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif



