@extends('admin.layout')

@section('content')
  <div id="dashboard" class="content active">
    <h2>Dashboard</h2>
    <p>Chào mừng đến trang quản trị!</p>
  </div>

  <div id="users" class="content">
    <h2>Users</h2>
    <p>Danh sách tài khoản...</p>
  </div>

  <div id="products" class="content">
    <h2>Products</h2>
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>ID</th>
          <th>Tiêu đề</th>
          <th>Ngày tạo</th>
        </tr>
      </thead>
      <tbody>
        @foreach($posts as $post)
          <tr>
            <td>{{ $post->id }}</td>
            <td>{{ $post->title }}</td>
            <td>{{ $post->created_at->format('d/m/Y H:i') }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $posts->links() }}
  </div>

  <div id="settings" class="content">
    <h2>Settings</h2>
    <p>Quản lý danh mục sản phẩm...</p>
  </div>
@endsection
