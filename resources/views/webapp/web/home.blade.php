
@extends('webapp.layout.master')
@section('content')
<body>
    <!-- layout -->

    <div class="container">
        <header>
            <div class="menu-banner">
                <div class="menu-left">
                    <div class="menu-1">
                        <a href="{{route('home')}}">Trang chủ</a>
                    </div>
                    <div class="menu-2">
                        <form action="" method="post">
                            <input type="text" placeholder="Tìm kiếm">

                            <input type="submit" placeholder="jflksad">
                        </form>
                    </div>
                  <div class="menu-3">
                        <a href="#">Danh mục</a>
                        <ul class="dropdown-menu">
                            <li class="has-submenu">
                                <a href="#">Sinh nhật ▸</a>
                                <ul class="submenu">
                                    <li><a href="#">Phông nền sinh nhật</a></li>
                                    <li><a href="#">Backdrop chữ</a></li>
                                    <li><a href="#">Mẫu thiệp sinh nhật</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Khai trương ▸</a>
                                <ul class="submenu">
                                    <li><a href="#">Backdrop khai trương</a></li>
                                    <li><a href="#">Banner khuyến mãi</a></li>
                                    <li><a href="#">Poster khai trương</a></li>
                                </ul>
                            </li>

                            <li class="has-submenu">
                                <a href="#">Lễ - Tết ▸</a>
                                <ul class="submenu">
                                    <li><a href="#">Giáng sinh</a></li>
                                    <li><a href="#">Tết Nguyên Đán</a></li>
                                    <li><a href="#">Lễ tình nhân</a></li>
                                </ul>
                            </li>

                            <li><a href="#">Logo thương hiệu</a></li>
                            <li><a href="#">Thiết kế quảng cáo</a></li>
                            <li><a href="#">In ấn</a></li>
                        </ul>
                    </div>
                </div>

                <div class="menu-center">
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
            </div>
        </header>
        <!-- trang chủ -->
        <!-- Danh mục -->
        <section class="category-section">
            <div class="category-container">
                <a href="#" class="category-item">Tổng hợp</a>
                <a href="#" class="category-item">Bảng hiệu Quảng cáo</a>
                <a href="#" class="category-item">File CNC</a>
                <a href="#" class="category-item">In ấn</a>
                <a href="#" class="category-item">Giấy khen, bằng khen</a>
                <a href="#" class="category-item">Logo</a>
                <a href="#" class="category-item">Spa</a>
                <a href="#" class="category-item">Tem</a>
                <a href="#" class="category-item">Lễ Giáng Sinh</a>
                <a href="#" class="category-item">Tết</a>
                <a href="#" class="category-item">Các ngày lễ</a>
                <a href="#" class="category-item">Cưới hỏi</a>
                <a href="#" class="category-item">Tranh ảnh</a>
                <a href="#" class="category-item">File khác</a>
                <a href="#" class="category-item">Thiếu nhi</a>
                <a href="#" class="category-item">Thể thao</a>
                <a href="#" class="category-item">Mẫu in áo</a>
                <a href="#" class="category-item">Font vip</a>
                <a href="#" class="category-item">Khai trương</a>
                <a href="#" class="category-item">Trường học</a>
                <a href="#" class="category-item">Hashtag</a>
            </div>
        </section>

        <address class="gallery-section">
            <div class="gallery-container">
                @foreach ($posts as $post)
                <div class="gallery-item">
                    <img src="{{asset('storage/' . $post->image)}}" alt="Mẫu 1">
                    <p class="title">{{$post->title}}</p>
                </div>
                @endforeach
               

            </div>
        </address>

        @endsection

        