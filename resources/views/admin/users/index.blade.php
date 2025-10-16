@extends('admin.layout')

@section('content')

  <div id="users" class="content">
    <h2>Quản lý tài khoản</h2>
    <!-- <a href="{{route('create.post')}}" class="btn btn-primary">+ Thêm mới</a> -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th>Tên người dùng</th>
           <th>Email</th>
           <th>Chức vụ</th>
           <th>Loại tài khoản</th>
          <th>Thao tác</th>
        </tr>
      </thead>
      <tbody>
      @foreach($users as $user)
      <tr>
        <td>
           {{$user->name}}
        </td>
        <td>{{$user->email}}</td>
        <td>
         <form action="{{ route('users.admin', $user->id) }}" method="POST">
    @csrf
    <select name="is_admin">
        <option value="0" {{ $user->is_admin == '0' ? 'selected' : '' }}>Khách hàng</option>
        <option value="1" {{ $user->is_admin == '1' ? 'selected' : '' }}>Quản trị viên</option>
    </select>
    <button type="submit">Cập nhật</button>
</form>
        </td>
        
       <td>
     <form action="{{ route('users.upgrade', $user->id) }}" method="POST">
    @csrf
    <select name="account_level">
        <option value="normal" {{ $user->account_level == 'normal' ? 'selected' : '' }}>Chưa đăng ký vip</option>
        <option value="vip" {{ $user->account_level == 'vip' ? 'selected' : '' }}>VIP</option>
    </select>
    <button type="submit">Cập nhật</button>
</form>
</td>

        <td>
          <form action="{{route('user.delete', $user->id)}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger" onclick="return confirm('Chắc chắn xóa')">Xóa</button>
              </form>
        </td>
      </tr>
      @endforeach
       </tbody>
    </table>
   
  </div>

 
@endsection
