@extends('admin.layout')

@section('content')

  <div id="products" class="content">
    <h2>Quản lý bài viết</h2>
    <a href="{{route('create.post')}}" class="btn btn-primary">+ Thêm mới</a>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tiêu đề</th>
           <th>Hình ảnh</th>
           <th>Nội dung</th>
          <th>Ngày tạo</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>
    
       <img src="{{ Storage::url($post->image) }}" 
     alt="{{ $post->title }}" 
     width="100" class="img-thumbnail">

   
</td>

            <td>{{ $post->content }}</td>
            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
            <td>
              <a href="{{route('admin.edit', $post->id)}}" class= "btn btn-warning">Sửa</a>
              <form action="{{route('admin.delete', $post->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Chắc chắn xóa')">Xóa</button>
              </form>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $posts->links() }}
  </div>

  
@endsection
