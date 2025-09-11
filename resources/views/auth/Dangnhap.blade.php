<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Đăng nhập SDEVICES</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- CSS riêng -->
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  </head>
  <body>
    <!-- Header -->
    <header>
      <div class="container py-5">
        <div class="row shadow bg-white rounded overflow-hidden" style="max-width: 900px; margin: auto;">

          <!-- Cột trái -->
          <div class="col-md-6 p-4" style="background-color: #fff5f5;">
            <img src="{{ asset('images/Quangcao/Logo.png') }}" alt="Smember" class="mb-3" style="height:50px;">
            <h3 class="fw-bold text-danger">Nhập hội khách hàng thành viên SDEVICES</h3>
            <h3 class="fw-bold text-danger">Để không bỏ lỡ các ưu đãi hấp dẫn từ chúng tôi</h3>

            <ul class="list-unstyled">
              <li>🎁 Chiết khấu <b>đến 5%</b> khi mua sản phẩm</li>
              <li>🚚 Miễn phí giao hàng cho đơn từ 300.000đ</li>
              <li>🎂 Tặng voucher sinh nhật đến <b>500.000đ</b></li>
              <li>💰 Trợ giá thu cũ lên đời đến <b>1 triệu</b></li>
              <li>🎟️ Thăng hạng nhận voucher đến <b>300.000đ</b></li>
              <li>📚 Ưu đãi thêm <b>10%</b> cho S-Student/S-Teacher</li>
            </ul>
          </div>

          <!-- Cột phải (Form login) -->
          <div class="col-md-6 p-5">
            <h3 class="fw-bold text-danger mb-4">Đăng nhập SMEMBER</h3>

            <!-- Form Login Laravel -->
            <form method="POST" action="{{ route('login.post') }}">
              @csrf

              <!-- Email/SĐT -->
              <div class="mb-3">
                <label for="email" class="form-label">Email hoặc Số điện thoại</label>
                <input type="text" id="email" name="email"
                  class="form-control @error('email') is-invalid @enderror"
                  placeholder="Nhập email hoặc số điện thoại"
                  value="{{ old('email') }}" required>
                @error('email')
                  <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <!-- Password -->
              <div class="mb-3">
                <label for="password" class="form-label">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control"
                  placeholder="Nhập mật khẩu" required>
              </div>

              <!-- Remember + Quên mật khẩu -->
              <div class="d-flex justify-content-between align-items-center mb-3">
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" id="rememberMe" name="remember">
                  <label class="form-check-label" for="rememberMe">Ghi nhớ</label>
                </div>
                <a href="{{ route('quenmatkhau') }}" class="text-decoration-none text-danger">Quên mật khẩu?</a>
              </div>

              <!-- Error chung -->
              @if($errors->has('login'))
                <div class="alert alert-danger" role="alert">
                  {{ $errors->first('login') }}
                </div>
              @endif

              <!-- Submit -->
              <button type="submit" class="btn btn-danger w-100 py-2">Đăng nhập</button>
            </form>

            <div class="text-center my-3">
              <span class="text-muted">Hoặc đăng nhập bằng</span>
            </div>

            <div class="d-flex gap-2">
              <a href="#" class="btn btn-outline-secondary w-50">Google</a>
              <a href="#" class="btn btn-outline-secondary w-50">Zalo</a>
            </div>

            <hr>
            <p class="text-center mb-0">
              Chưa có tài khoản? <a href="{{ route('dangky') }}" class="text-danger">Đăng ký ngay</a>
            </p>
          </div>

        </div>
      </div>
    </header>

    @include('layouts.footer')

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  </body>
</html>
