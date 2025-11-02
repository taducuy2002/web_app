 <div class="menu-center">
                    <a href="{{route('vip')}}" class = "h3">Mua vip </a>
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
           