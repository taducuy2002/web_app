@extends('admin.layout')

@section('title', 'Sửa bài viết')

@section('content')
    <form method="post" action="{{ route('admin.posts.update', $post) }}">
        @csrf
        @method('PUT')
        <label>Tiêu đề
            <input type="text" name="title" value="{{ old('title', $post->title) }}" required>
        </label>
        <label>Slug
            <input type="text" name="slug" value="{{ old('slug', $post->slug) }}" required>
        </label>
        <label>Danh mục
            <select name="category_id">
                <option value="">-- Chọn --</option>
                @foreach($categories as $c)
                    <option value="{{ $c->id }}" @selected($post->category_id==$c->id)>{{ $c->name }}</option>
                @endforeach
            </select>
        </label>
        <label>Tóm tắt
            <textarea name="excerpt">{{ old('excerpt', $post->excerpt) }}</textarea>
        </label>
        <label>Nội dung
            <textarea name="content" rows="8">{{ old('content', $post->content) }}</textarea>
        </label>
        <label>
            <input type="checkbox" name="is_published" value="1" @checked($post->is_published)> Xuất bản
        </label>
        <label>Ngày đăng
            <input type="datetime-local" name="published_at" value="{{ old('published_at', optional($post->published_at)->format('Y-m-d\TH:i')) }}">
        </label>
        <button type="submit">Cập nhật</button>
    </form>

    <h3>Tệp đính kèm</h3>
    <form method="post" action="{{ route('admin.attachments.store', $post) }}" enctype="multipart/form-data">
        @csrf
        <input type="file" name="file" required>
        <button type="submit">Tải lên</button>
    </form>
    <ul>
        @foreach($post->attachments as $file)
            <li>
                {{ $file->file_name }} ({{ number_format($file->file_size/1024,0) }} KB)
                <form method="post" action="{{ route('admin.attachments.destroy', $file) }}" style="display:inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Xóa</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection



