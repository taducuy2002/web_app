@extends('webapp.layout.master')
@section('content')
    <!-- layout -->
    <div class="container">
        <header>
            <div class="menu-banner">
                <div class="menu-left">
                  

                    @include('webapp.layout.search')

                @include('webapp.layout.danhmuc1')

              
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
 
        <!-- Modal cho đăng nhập (nếu chưa login) -->
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

@endsection