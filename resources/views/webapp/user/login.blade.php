<!DOCTYPE html>
<!-- Coding by CodingLab | www.codinglabweb.com-->
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title> Responsive Login and Signup Form </title>

        <!-- CSS -->
        <link rel="stylesheet" href="{{asset('css/login.css')}}">
                
        <!-- Boxicons CSS -->
        <link href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css' rel='stylesheet'>
                        
    </head>
    <body>
        <section class="container forms">
            <div class="form login">
                <div class="form-content">
                    <header>ĐĂNG NHẬP</header>
                    <form action="{{route('login.perform')}}" method="post">
                        @csrf
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" name="email">
                            @error('email')
					    <div class="form-field-error">{{ $message }}</div>
				            @enderror
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Mật khẩu" class="password" name="password">
                            <i class='bx bx-hide eye-icon'></i>
                            @error('password')
					    <div class="form-field-error">{{ $message }}</div>
				            @enderror
                        </div>

                        <div class="form-link">
                            <a href="#" class="forgot-pass">Quên mật khẩu?</a>
                        </div>

                        <div class="field button-field">
                            <button type="submit">Đăng nhập</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Bạn đã chưa có tài khoản? <a href="#" class="link signup-link">Đăng ký</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="{{route('login.facebook')}}" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Đăng nhập bằng Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="{{route('login.google')}}" class="field google">
                        <img src="{{asset('css/image/google.png')}}" alt="" class="google-img">
                        <span>Đăng nhập bằng Google</span>
                    </a>
                </div>

            </div>

            <!-- Signup Form -->

            <div class="form signup">
                <div class="form-content">
                    <header>ĐĂNG KÝ</header>
                    <form action="{{ route('register.perform') }}" method="post">
                        @csrf
                         <div class="field input-field">
                            <input type="text" placeholder="Họ tên" class="input" name="name">
                        </div>
                        <div class="field input-field">
                            <input type="email" placeholder="Email" class="input" name="email">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Nhập mật khẩu" class="password" name="password">
                        </div>

                        <div class="field input-field">
                            <input type="password" placeholder="Nhập lại mật khẩu" class="password" name="password_confirmation">
                            <i class='bx bx-hide eye-icon'></i>
                        </div>

                        <div class="field button-field">
                            <button type="submit">Đăng ký</button>
                        </div>
                    </form>

                    <div class="form-link">
                        <span>Bạn đã có tài khoản? <a href="{{route('login.show')}}" class="link login-link">Đăng nhập</a></span>
                    </div>
                </div>

                <div class="line"></div>

                <div class="media-options">
                    <a href="{{route('login.facebook')}}" class="field facebook">
                        <i class='bx bxl-facebook facebook-icon'></i>
                        <span>Đăng nhập bằng Facebook</span>
                    </a>
                </div>

                <div class="media-options">
                    <a href="{{route('login.google')}}" class="field google">
                        <img src="{{asset('css/image/google.png')}}" alt="" class="google-img">
                        <span>Đăng nhập bằng Google</span>
                    </a>
                </div>

            </div>
        </section>

        <!-- JavaScript -->
        <script src="{{asset('js/script.js')}}"></script>
    </body>
</html>