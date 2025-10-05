@extends('admin.layout')

@section('title', 'Bảng điều khiển')

@section('content')
    <h2>Bài viết mới</h2>
    <ul>
        @foreach($posts as $p)
            <li><a href="{{ route('admin.posts.edit', $p) }}">{{ $p->title }}</a></li>
        @endforeach
    </ul>
@endsection



