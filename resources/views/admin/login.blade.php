<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập Admin SDEVICES</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css" rel="stylesheet">

    <!-- CSS riêng -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  </head>
  <body class="bg-light">
    <!-- Header -->
    <header>
      <div class="container py-5">
        <div class="row shadow bg-white rounded overflow-hidden" style="max-width: 800px; margin: auto;">

          <!-- Cột trái -->
          <div class="col-md-6 p-4" style="background: linear-gradient(135deg, #dc3545 0%, #e63946 100%);">
            <div class="text-white h-100 d-flex flex-column justify-content-center">
              <div class="mb-4">
                <img src="{{ asset('images/Quangcao/Logo.png') }}" alt="SDEVICES" class="mb-3" style="height:60px">
                <h2 class="fw-bold mb-3">SDEVICES Admin Panel</h2>
                <p class="mb-4">Chào mừng đến với hệ thống quản trị SDEVICES</p>
              </div>
              
              <div class="admin-features">
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-speedometer2 me-3 fs-4"></i>
                  <span>Quản lý đơn hàng</span>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-people me-3 fs-4"></i>
                  <span>Quản lý khách hàng</span>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-box-seam me-3 fs-4"></i>
                  <span>Quản lý sản phẩm</span>
                </div>
                <div class="d-flex align-items-center mb-3">
                  <i class="bi bi-graph-up me-3 fs-4"></i>
                  <span>Báo cáo thống kê</span>
                </div>
              </div>
            </div>
          </div>

          <!-- Cột phải (Form login) -->
          <div class="col-md-6 p-5">
            <div class="text-center mb-4">
              <i class="bi bi-shield-lock text-danger" style="font-size: 3rem;"></i>
              <h3 class="fw-bold text-danger mt-2">Đăng nhập Admin</h3>
              <p class="text-muted">Vui lòng đăng nhập để truy cập hệ thống quản trị</p>
            </div>

            <!-- Form Login Laravel -->
            <form method="POST" action="{{ route('admin.login.post') }}">
              @csrf

              <!-- Email -->
              <div class="mb-3">
                <label for="email" class="form-label">
                  <i class="bi bi-envelope me-1"></i>Email Admin
                </label>
                <input type="email" id="email" name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  placeholder="Nhập email admin"
                  value="{{ old('email') }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">
                  <i class="bi bi-lock me-1"></i>Mật khẩu
                </label>
                <input type="password" id="password" name="password" class="form-control"
                  placeholder="Nhập mật khẩu" required>
              </div>

              <!-- Remember -->
              <div class="mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                  <label class="form-check-label" for="rememberMe">Ghi nhớ đăng nhập</label>
                </div>
              </div>

              <!-- Error chung -->
              @if($errors->has('login'))
                <div class="alert alert-danger" role="alert">
                  <i class="bi bi-exclamation-triangle me-2"></i>
                  {{ $errors->first('login') }}
                </div>
              @endif

              @if(session('error'))
                <div class="alert alert-danger" role="alert">
                  <i class="bi bi-exclamation-triangle me-2"></i>
                  {{ session('error') }}
                </div>
              @endif

              <!-- Submit -->
              <button type="submit" class="btn btn-danger w-100 py-2">
                <i class="bi bi-box-arrow-in-right me-2"></i>
                Đăng nhập Admin
              </button>
            </form>

            <hr class="my-4">
            <p class="text-center text-muted mb-0">
              <i class="bi bi-arrow-left me-1"></i>
              <a href="{{ route('homepage') }}" class="text-decoration-none text-danger">
                Quay về trang chủ
              </a>
            </p>
          </div>

        </div>
      </div>
    </header>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>