@extends('layouts.vipcorel')

@section('title', 'Đăng ký')

@section('content')
	<div class="block-container block-body">
		<h2 class="contentRow-title">Đăng ký</h2>
		<form method="post" action="{{ route('register.perform') }}" class="block-form">
			@csrf
			<div class="form-group">
				<label for="name">Họ tên</label>
				<input id="name" type="text" name="name" class="input" value="{{ old('name') }}" required />
				@error('name')
					<div class="form-field-error">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="email">Email</label>
				<input id="email" type="email" name="email" class="input" value="{{ old('email') }}" required />
				@error('email')
					<div class="form-field-error">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="password">Mật khẩu</label>
				<input id="password" type="password" name="password" class="input" required />
				@error('password')
					<div class="form-field-error">{{ $message }}</div>
				@enderror
			</div>
			<div class="form-group">
				<label for="password_confirmation">Nhập lại mật khẩu</label>
				<input id="password_confirmation" type="password" name="password_confirmation" class="input" required />
			</div>
			<div class="form-group">
				<button type="submit" class="button button--primary">Đăng ký</button>
			</div>
			<div>
				<small>Đã có tài khoản? <a href="{{ route('login.show') }}">Đăng nhập</a></small>
			</div>
		</form>
	</div>
@endsection



