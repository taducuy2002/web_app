@if(isset($topAuthors) && $topAuthors->count())
<section class="block block--authors">
    <h3 class="block-header">Tác giả hàng đầu</h3>
    <div class="block-body">
        <ul class="block-body--list">
            @foreach($topAuthors as $author)
                <li>
                    <span>{{ $author->name }}</span>
                    <small> ({{ $author->posts_count }} bài)</small>
                </li>
            @endforeach
        </ul>
    </div>
</section>
@endif



