@extends('admin.layout')

@section('title', 'Thêm bài viết')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm">
        <div class="card-header bg-primary text-white">
            <h5 class="mb-0">Thêm bài viết</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('admin.update', $posts->id) }}" enctype="multipart/form-data">
                @csrf
                
                {{-- Tiêu đề --}}
                <div class="mb-3">
                    <label for="title" class="form-label">Tiêu đề <span class="text-danger">*</span></label>
                    <input type="text" id="title" name="title" 
                           class="form-control @error('title') is-invalid @enderror" 
                           value="{{ old('title', $posts->title) }}">
                    @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                {{-- Slug --}}
                <div class="mb-3">
                    <label for="slug" class="form-label">Slug</label>
                    <input type="text" id="slug" name="slug" 
                           class="form-control" value="{{ old('slug' , $posts->slug) }}">
                </div>

               

                {{-- Ảnh đại diện --}}
                <div class="mb-3">
                    <label for="image" class="form-label">Ảnh đại diện</label>
                    <input type="file" id="image" name="image" class="form-control" accept="image/*">
                    <div class= "mt-2">
                        @if($posts->image) 
                            <img src="{{asset('storage/' . $posts->image)}}" alt="" srcset="" width = "100px">
                        
                        @endif
                    </div>
                </div>

                {{-- Tóm tắt --}}
                <div class="mb-3">
                    <label for="excerpt" class="form-label">Tóm tắt</label>
                    <textarea id="excerpt" name="excerpt" class="form-control" rows="3">{{ old('excerpt',$posts->excerpt) }}</textarea>
                </div>

                {{-- Nội dung --}}
                <div class="mb-3">
                    <label for="content" class="form-label">Nội dung</label>
                    <textarea id="content" name="content" class="form-control" rows="8">{{ old('content', $posts->content) }}</textarea>
                </div>

                {{-- Xuất bản --}}
                <div class="form-check mb-3">
                    <input class="form-check-input" type="checkbox" id="is_published" name="is_published" value="1" checked>
                    <label class="form-check-label" for="is_published">
                        Xuất bản ngay
                    </label>
                </div>

                {{-- Ngày đăng --}}
                <div class="mb-3">
                    <label for="published_at" class="form-label">Ngày đăng</label>
                    <input type="datetime-local" id="published_at" name="published_at" 
                           class="form-control"
                           value="{{ old('published_at', now()->format('Y-m-d\TH:i')) }}">
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
