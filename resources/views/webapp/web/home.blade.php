@extends('webapp.layout.master')
@section('content')
    <!-- layout -->
    <div class="container">
        <header>
            <div class="menu-banner">
                <div class="menu-left">
                    <!-- <div class="menu-1">
                        <a href="{{route('home')}}">Trang chủ</a>
                    </div>
                    <div class="menu-2">
                        <form action="" method="post">
                            <input type="text" placeholder="Tìm kiếm">
                            <input type="submit" placeholder="jflksad">
                        </form>
                    </div> -->

                    @include('webapp.layout.search')

                    <!-- <div class="menu-3">
                        <a href="#">Danh mục</a>
                        <ul class="dropdown-menu">
                            @foreach($categories as $category)
                                @if($category->children->count() > 0)
                                    <li class="has-submenu">
                                        <a href="{{route('detail', $category->id)}}">{{ $category->name }} ▸</a>
                                        <ul class="submenu">
                                            @foreach($category->children as $child)
                                                <li><a href="{{route('detail', $child->id)}}">{{ $child->name }}</a></li>
                                            @endforeach
                                        </ul>
                                    </li>
                                @else
                                    <li><a href="{{route('detail', $category->id)}}">{{ $category->name }}</a></li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div> -->
                @include('webapp.layout.danhmuc1')

                <!-- <div class="menu-center">
                    <h3>Mua vip</h3>
                </div>
                <div class="menu-right">
                    @guest
                        <a href="{{ route('login.show') }}">Đăng nhập</a>
                    @endguest

                    @auth
                        <div class="user-menu">
                            <a href="#" class="user-name">{{ auth()->user()->name }}</a>
                            <ul class="dropdown-menu">
                                <li><a href="">Đổi mật khẩu</a></li>
                                <li>
                                    <form action="{{ route('logout') }}" method="POST">
                                        @csrf
                                        <button type="submit" class="logout-btn">Đăng xuất</button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    @endauth
                </div>
            </div>
            <div class="slice">
                <span>
                    Nhận Cài Đặt Các Phần Mềm Đồ Họa Corel, Photoshop, AI, Sketchup, Vray, Encape, Autocad, Adobe Premie...
                    Theo Yêu Cầu, Cài tất cả Driver Các Loại Máy In - Photo Máy Cắt Decal: Hỗ trợ cài đặt Hotline Zalo 0918
                    281 353 - Uy Tín - Chất Lượng.
                </span>
            </div>
            <div class="banner">
                <img src="{{asset('css/image/test.png')}}" alt="">
            </div> -->

         @include('webapp.layout.muavip-login')
         @include('webapp.layout.banner')

        </header>
        <!-- trang chủ -->
        <!-- Danh mục -->
       @include('webapp.layout.danhmuc2')

        <!-- Thêm vào phần gallery-section trong Blade template -->
        <section class="gallery-section">
            <div class="gallery-container">
                @foreach ($posts as $post)
                    <div class="gallery-item">
                        <a href="#" class="product-image-link" data-image="{{ asset('storage/' . $post->image) }}" data-title="{{ $post->title }}">
                            <img src="{{ asset('storage/' . $post->image) }}" alt="{{ $post->title }}">
                            <p class="title">{{ $post->title }}</p>
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Modal cho xem ảnh và tải xuống -->
        <!-- <div id="imageModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Product Image">
                    <div class="download-section">
                        <button id="downloadBtn" class="download-btn">Tải xuống</button>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Modal cho đăng nhập (nếu chưa login) -->
        <!-- <div id="loginModal" class="modal">
            <div class="modal-content">
                <span class="close-login">&times;</span>
                <img src="https://tse2.mm.bing.net/th/id/OIP.wSpP6-E35RzeH9qJGjVsagHaHa?pid=Api&P=0&h=180" alt="">
                <div class="h3">BẠN CẦN ĐĂNG NHẬP <br> ĐỂ TẢI FILE NÀY !</div>

                <div class="auth-buttons">
                    <div class="button">
                        <a href="{{ route('login.show') }}" id="loginForm" class="button2">Đăng nhập</a>
                    </div>
                    
                    <div class="button">
                        <a href="{{ route('register.show') }}" class="button1">Đăng ký tài khoản</a>
                    </div>
                </div>

                <div id="loginError"></div>
            </div>
        </div> -->
        @include('webapp.layout.dang-nhap-de-tai')
    </div>

 <style>
.gallery-section {
  padding: 20px 0;
}

a {
  text-decoration: none;
  color: #333;
  font-weight: 500;
}

.gallery-container {
  display: grid;
  grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
  gap: 20px;
  justify-content: center;
  justify-items: center;
  max-width: 1100px;
  margin: 0 auto;
}

.gallery-item {
  background: #fff;
  border-radius: 10px;
  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
  text-align: center;
  overflow: hidden;
  transition: transform 0.2s;
  max-width: 250px;
  margin: 0 auto;
}

.gallery-item:hover {
  transform: translateY(-5px);
}

.gallery-item img {
  width: 100%;
  height: 200px;
  object-fit: cover;
  display: block;
}

.gallery-item .title {
  padding: 10px;
  font-size: 16px;
  color: #333;
  font-weight: 500;
}
</style>
<style>
    
</style>
@endsection