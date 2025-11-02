  <!-- Modal cho xem ảnh và tải xuống -->
        <div id="imageModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <div class="modal-body">
                    <img id="modalImage" src="" alt="Product Image">
                    <div class="download-section">
                       <a id="downloadLink" href="https://drive.google.com/drive/folders/1IWEteAzqAZMnj-5dPKMcw7HIt-oFixB_?usp=drive_link" class="download-btn" download>Tải xuống</a>
                         <span id="remainingDownloads" style="margin-left:10px;color:#f00;"></span>
                    </div>
                </div>
            </div>
        </div>
 <!-- Modal cho đăng nhập (nếu chưa login) -->
        <div id="loginModal" class="modal">
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
        </div>