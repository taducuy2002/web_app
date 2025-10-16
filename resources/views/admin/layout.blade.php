<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title', 'Admin')</title>
  
  <!-- Bootstrap 5 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    body {
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      background: #f8f9fa;
    }

    .sidebar {
      width: 250px;
      background: #2c3e50;
      min-height: 100vh;
      color: #fff;
      position: fixed;
    }

    .sidebar ul {
      list-style: none;
      padding: 0;
      margin: 0;
    }

    .sidebar li {
      padding: 15px 20px;
      cursor: pointer;
      transition: all 0.3s;
    }

    .sidebar li:hover,
    .sidebar li.active {
      background: #1abc9c;
    }

    .sidebar li.active {
      font-weight: bold;
    }

    .content-wrapper-content {
      margin-left: 250px;
      padding: 30px;
    }

    .table thead {
      background: #1abc9c;
      color: #fff;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
    <ul class="nav flex-column">
      <li class="nav-item">
        <a href="{{ route('admin.user') }}" class="nav-link">Quản lý tài khoản</a>
      </li>
      <li class="nav-item">
        <a href="{{ route('admin.post') }}" class="nav-link">Bài viết</a>
      </li>
    </ul>
  </div>

  <!-- Nội dung -->
  <div class="content-wrapper-content" id="content-wrapper">
    @yield('content')
  </div>

  <!-- Bootstrap -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

  <!-- Script xử lý chuyển nội dung -->
 <script>
document.addEventListener('DOMContentLoaded', () => {
  const links = document.querySelectorAll('.nav-link');
  const wrapper = document.getElementById('content-wrapper');

  if (!wrapper) {
    console.error('Không tìm thấy #content-wrapper trong layout');
    return;
  }

  links.forEach(link => {
    link.addEventListener('click', async function (e) {
      e.preventDefault();

      // Cập nhật trạng thái active cho menu
      links.forEach(l => l.parentElement.classList.remove('active'));
      this.parentElement.classList.add('active');

      try {
        const response = await fetch(this.href, {
          headers: { 'X-Requested-With': 'XMLHttpRequest' }
        });

        if (!response.ok) {
          console.error('Lỗi tải nội dung:', response.status);
          wrapper.innerHTML = `<div class="alert alert-danger">Không thể tải nội dung (mã ${response.status}).</div>`;
          return;
        }

        const html = await response.text();

        // Dò xem server trả partial hay full layout
        const parser = new DOMParser();
        const doc = parser.parseFromString(html, 'text/html');

        // Ưu tiên lấy phần content cụ thể
        const content = doc.querySelector('#ajax-content')
                      || doc.querySelector('.content')
                      || doc.querySelector('main')
                      || doc.body;

        // Cập nhật nội dung
        wrapper.innerHTML = content.innerHTML;

        // Cuộn lên đầu trang (tùy chọn)
        window.scrollTo({ top: 0, behavior: 'smooth' });

      } catch (err) {
        console.error('Lỗi tải nội dung:', err);
        wrapper.innerHTML = `<div class="alert alert-danger">Không thể tải nội dung. Vui lòng thử lại.</div>`;
      }
    });
  });

  // ✅ Tải mặc định 1 trang (VD: Dashboard)
  const defaultLink = document.querySelector('.nav-link[href="{{ route('admin.dashboard') }}"]');
  if (defaultLink) defaultLink.click();
});
</script>

</body>
</html>
