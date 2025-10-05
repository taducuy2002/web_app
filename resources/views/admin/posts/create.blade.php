@extends('admin.layout')

@section('title', 'Thêm bài viết')

@section('content')
    <form method="post" action="{{ route('admin.posts.store') }}">
        @csrf
        <label>Tiêu đề
            <input type="text" name="title" value="{{ old('title') }}" required>
        </label>
        <label>Slug
            <input type="text" name="slug" value="{{ old('slug') }}">
        </label>
        <label>Danh mục
            <select name="category_id">
                <option value="">-- Chọn --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}">{{ $c->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Tóm tắt
            <textarea name="excerpt">{{ old('excerpt') }}</textarea>
        </label>
        <label>Nội dung
            <textarea name="content" rows="8">{{ old('content') }}</textarea>
        </label>
        <label>
            <input type="checkbox" name="is_published" value="1" checked> Xuất bản
        </label>
        <label>Ngày đăng
            <input type="datetime-local" name="published_at" value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
        </label>
        <button type="submit">Lưu</button>
    </form>
@endsection



