@extends('layouts.site')

@section('title', 'Trợ giúp')

@section('content')
    <h2>Trợ giúp</h2>
    <ul>
        <li><a href="{{ route('register') }}">Đăng ký</a></li>
        <li><a href="{{ route('login') }}">Đăng nhập</a></li>
        <li><a href="{{ route('home') }}">Trang chủ</a></li>
    </ul>
@endsection



