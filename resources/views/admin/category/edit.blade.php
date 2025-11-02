@extends('admin.layout')

@section('title', 'Thêm bài viết')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thêm bài viết</h5>
        </div>
        <div class="card-body">
         <form method="POST" action="{{ route('cate.update', $category->id) }}" enctype="multipart/form-data">
    @csrf
    
    <div class="mb-3">
        <label for="title" class="form-label">Tên danh mục</label>
        <input type="text" id="title" name="name" 
               class="form-control"
               value="{{ old('name', $category->name) }}" required>
    </div>

    <div class="mb-3">
        <label for="paren_id" class="form-label">Danh mục cha</label>
        <select name="paren_id" id="paren_id" class="form-select">
            <option value="">-- Không có (danh mục gốc) --</option>
            @foreach ($categories as $parent)
                <option value="{{ $parent->id }}" {{ $category->paren_id == $parent->id ? 'selected' : '' }}>
                    {{ $parent->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="d-flex justify-content-end">
        <button type="submit" class="btn btn-success px-4">Lưu thay đổi</button>
    </div>
</form>

        </div>
    </div>
</div>
@endsection
