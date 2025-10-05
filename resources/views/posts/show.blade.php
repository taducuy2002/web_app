@extends('layouts.vipcorel')

@section('title', $post->title)

@section('content')
    <article class="block block--post contentRow">
        <h2 class="contentRow-title">{{ $post->title }}</h2>
        @if($post->category)
            <p>Danh mục: <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->name }}</a></p>
        @endif
        <div class="contentRow-snippet">{!! $post->content !!}</div>

        @if($post->attachments->count())
            <section>
                <h3>Tệp đính kèm</h3>
                <ul>
                    @foreach($post->attachments as $file)
                        <li>
                            <a href="{{ route('attachment.download', $file->id) }}">{{ $file->file_name }}</a>
                            <small>({{ number_format($file->file_size/1024, 0) }} KB, tải {{ $file->download_count }} lần)</small>
                        </li>
                    @endforeach
                </ul>
            </section>
        @endif

        <section>
            <h3>Bình luận ({{ $post->comments->count() }})</h3>
            <ul>
                @foreach($post->comments as $c)
                    <li>
                        <strong>{{ $c->author->name }}</strong>:
                        <span>{{ $c->content }}</span>
                        <small> - {{ $c->created_at->diffForHumans() }}</small>
                    </li>
                @endforeach
            </ul>

            <form method="post" action="{{ route('post.comment.store', $post->id) }}">
                @csrf
                <textarea name="content" rows="3" required placeholder="Viết bình luận..."></textarea>
                @error('content')
                    <div>{{ $message }}</div>
                @enderror
                <button type="submit">Gửi</button>
            </form>
        </section>
    </article>
@endsection


