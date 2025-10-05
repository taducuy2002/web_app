@if(isset($latestPosts) && $latestPosts->count())
<section class="block block--latestPosts">
    <h3 class="block-header">Bài viết mới</h3>
    <div class="block-body">
        <ul class="block-body--list">
            @foreach($latestPosts as $lp)
                <li class="contentRow">
                    <a href="{{ route('post.show', $lp->slug) }}" class="contentRow-title">{{ $lp->title }}</a>
                    <div class="contentRow-minor">{{ optional($lp->published_at)->diffForHumans() }}</div>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif



