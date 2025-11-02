@extends('admin.layout')

@section('title', 'Thêm bài viết')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thêm bài viết</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('cate.store') }}" enctype="multipart/form-data">
                @csrf
                
                {{-- Tiêu đề --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="name" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title') }}" required>
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb_3">
                     <label for="paren_id" class="form-label">Danh mục cha</label>
        <select name="paren_id" id="paren_id" class="form-select">
            <option value="">-- Không có (danh mục gốc) --</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
                </div>

                {{-- Nút lưu --}}
                <div class="d-flex justify-content-end">
                    <button type="submit" class="btn btn-success px-4">
                        <i class="bi bi-save me-1"></i> Lưu bài viết
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
