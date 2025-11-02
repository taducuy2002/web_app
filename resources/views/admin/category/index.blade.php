@extends('admin.layout')

@section('content')
<div id="users" class="content">
    <h2>Quản lý danh mục</h2>
    <a href="{{ route('cate.create') }}" class="btn btn-primary mb-3">+ Thêm mới</a>

    <table class="table table-bordered">
        <thead class="table-light">
            <tr>
                <th>Tên danh mục</th>
                <th>Danh mục con</th>
                <th>Thao tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach($categories as $category)
                <tr>
                    <td>
                        <strong>{{ $category->name }}</strong>
                    </td>

                    <td>
                        @if($category->children->count() > 0)
                            <ul class="mb-0">
                                @foreach($category->children as $child)
                                    <li>{{ $child->name }}</li>
                                @endforeach
                            </ul>
                        @else
                            <em>Không có danh mục con</em>
                        @endif
                    </td>

                    <td>
                        <a href="{{ route('cate.edit', $category->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                        <form action="{{route('cate.delete', $category->id)}}" method="POST" style="display:inline-block">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Bạn có chắc muốn xóa không?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
