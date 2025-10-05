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

    .content-wrapper {
      margin-left: 250px;
      padding: 30px;
    }

    .table thead {
      background: #1abc9c;
      color: #fff;
    }

    /* Ẩn/hiện nội dung */
    .content {
      display: none;
    }
    .content.active {
      display: block;
    }
  </style>
</head>
<body>
  <!-- Sidebar -->
  <div class="sidebar">
    <h4 class="text-center py-3 border-bottom">Admin Panel</h4>
    <ul>
      <li data-target="dashboard" class="active">📊 Dashboard</li>
      <li data-target="users">👤 Quản lý tài khoản</li>
      <li data-target="products">🛒 Sản phẩm</li>
      <li data-target="settings">⚙️ Danh mục</li>
    </ul>
  </div>

  <!-- Nội dung -->
  <div class="content-wrapper">
    @yield('content')
  </div>

  <script>
    document.querySelectorAll('.sidebar li').forEach(item => {
      item.addEventListener('click', function () {
        // Bỏ active tất cả menu
        document.querySelectorAll('.sidebar li').forEach(el => el.classList.remove('active'));
        this.classList.add('active');

        // Ẩn tất cả content
        document.querySelectorAll('.content').forEach(el => el.classList.remove('active'));

        // Hiện content tương ứng
        const targetId = this.getAttribute('data-target');
        document.getElementById(targetId).classList.add('active');
      });
    });
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
