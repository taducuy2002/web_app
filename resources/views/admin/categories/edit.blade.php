@extends('admin.layout')

@section('title', 'Sửa danh mục')

@section('content')
    <form method="post" action="{{ route('admin.categories.update', $category) }}">
        @csrf
        @method('PUT')
        <label>Tên
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required>
        </label>
        <label>Slug
            <input type="text" name="slug" value="{{ old('slug', $category->slug) }}" required>
        </label>
        <label>Mô tả
            <textarea name="description">{{ old('description', $category->description) }}</textarea>
        </label>
        <button type="submit">Cập nhật</button>
    </form>
@endsection



