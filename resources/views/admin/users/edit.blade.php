@extends('admin.layout')

@section('title', 'Sửa danh mục')

@section('content')
   <form action="{{ route('users.upgrade', $user->id) }}" method="POST">
    @csrf
    <select name="account_level">
        <option value="normal" {{ $user->account_level == 'normal' ? 'selected' : '' }}>Người dùng thường</option>
        <option value="vip" {{ $user->account_level == 'vip' ? 'selected' : '' }}>VIP</option>
    </select>
    <button type="submit">Cập nhật</button>
</form>

@endsection



