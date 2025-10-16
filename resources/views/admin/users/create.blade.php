@extends('admin.layout')

@section('title', 'Thêm danh mục')

@section('content')
    <form method="post" action="{{ route('admin.categories.store') }}">
        @csrf
        <label>Tên
            <input type="text" name="name" value="{{ old('name') }}" required>
        </label>
        <label>Slug
            <input type="text" name="slug" value="{{ old('slug') }}">
        </label>
        <label>Mô tả
            <textarea name="description">{{ old('description') }}</textarea>
        </label>
        <button type="submit">Lưu</button>
    </form>
@endsection



