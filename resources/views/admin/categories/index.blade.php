@extends('admin.layout')

@section('title', 'Danh mục')

@section('content')
    <a href="{{ route('admin.categories.create') }}">+ Thêm danh mục</a>
    <table>
        <thead>
            <tr><th>Tên</th><th>Slug</th><th></th></tr>
        </thead>
        <tbody>
            @foreach($categories as $c)
                <tr>
                    <td>{{ $c->name }}</td>
                    <td>{{ $c->slug }}</td>
                    <td>
                        <a href="{{ route('admin.categories.edit', $c) }}">Sửa</a>
                        <form method="post" action="{{ route('admin.categories.destroy', $c) }}" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $categories->links() }}
@endsection



