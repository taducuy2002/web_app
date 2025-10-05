@php($pageTitle = isset($category) ? ($category->name . ' - Bài viết') : 'Bài viết mới nhất')
@extends('layouts.vipcorel')

@section('title', $pageTitle)

@section('content')
    <h2>{{ $pageTitle }}</h2>
    <section class="block block--postsGrid posts-grid">
        @forelse($posts as $post)
            <article class="contentRow post-card">
                <div class="contentRow-main">
                    <h3 class="contentRow-title"><a href="{{ route('post.show', $post->slug) }}">{{ $post->title }}</a></h3>
                    <div class="contentRow-snippet">
                        <p>{{ $post->excerpt ?? Str::limit(strip_tags($post->content), 140) }}</p>
                    </div>
                    <div class="contentRow-minor">
                        @if($post->category)
                            <small>Danh mục: <a href="{{ route('category.show', $post->category->slug) }}">{{ $post->category->name }}</a></small>
                            &middot;
                        @endif
                        <small>Đăng bởi {{ $post->author->name }} &middot; {{ optional($post->published_at)->diffForHumans() }}</small>
                    </div>
                </div>
            </article>
        @empty
            <p>Chưa có bài viết.</p>
        @endforelse
    </section>

    <div class="block-outer block-outer--after">
        {{ $posts->withQueryString()->links() }}
    </div>
@endsection


