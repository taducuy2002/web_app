@extends('layouts.vipcorel')

@section('title', 'Đăng nhập')

@section('content')
	<div class="block-container block-body">
		<h2 class="contentRow-title">Đăng nhập</h2>
		<form method="post" action="{{ route('login.perform') }}" class="block-form">
			@csrf
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
				<label><input type="checkbox" name="remember" value="1" /> Ghi nhớ đăng nhập</label>
			</div>
			<div class="form-group">
				<button type="submit" class="button button--primary">Đăng nhập</button>
			</div>
			<div>
				<small>Chưa có tài khoản? <a href="{{ route('register.show') }}">Đăng ký</a></small>
			</div>
		</form>
	</div>
@endsection



