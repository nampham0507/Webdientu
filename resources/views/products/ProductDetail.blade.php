<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>{{ $product->ProductName }}</title>
    <!-- Bootstrap -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-LN+7fdVzj6u52u30Kp6M/trliBMCMKTyK833zpbD+pXdCLuTusPj697FH4R/5mcr"
      crossorigin="anonymous"
    />
    <!-- Font Awesome CSS -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
    />

    <link rel="stylesheet" href="{{ asset('css/Product.css') }}">
  </head>

  <body>
    <!-- Header -->
    <header>
      <div class="header-container">
        <nav class="navbar navbar-expand-lg container">
          <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('homepage') }}">
              <img class="logo-img" src="{{ asset('images/Quangcao/Logo.png') }}" alt="Logo">
            </a>
            <button
              class="navbar-toggler"
              type="button"
              data-bs-toggle="collapse"
              data-bs-target="#navbarSupportedContent"
              aria-controls="navbarSupportedContent"
              aria-expanded="false"
              aria-label="Toggle navigation"
            >
              <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse row" id="navbarSupportedContent">
              <ul class="navbar-nav me-3 mb-2 mb-lg-0 gap-2 col-auto">
                <li class="nav-item dropdown btn navbar-btn">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="color: white"
                  >
                    <i class="fa-solid fa-bars me-1"></i>Danh mục
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">Điện thoại</a></li>
                    <li><a class="dropdown-item" href="#">Laptop</a></li>
                    <li><a class="dropdown-item" href="#">Phụ kiện</a></li>
                  </ul>
                </li>

                <li class="nav-item dropdown btn navbar-btn">
                  <a
                    class="nav-link dropdown-toggle"
                    href="#"
                    role="button"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                    style="color: white"
                  >
                    <i class="fa-solid fa-location-dot me-1"></i>Hà nội
                  </a>
                  <ul class="dropdown-menu">
                    <li><a class="dropdown-item" href="#">TP. Hồ Chí Minh</a></li>
                    <li><a class="dropdown-item" href="#">Đà Nẵng</a></li>
                    <li><a class="dropdown-item" href="#">Nha Trang</a></li>
                  </ul>
                </li>
              </ul>
              <!-- Ô tìm kiếm -->
              <div class="col input-group same-height">
                <span class="input-group-text" style="background-color: white">
                  <i class="fa-solid fa-magnifying-glass"></i>
                </span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Bạn muốn mua gì hôm nay?"
                  aria-label="Ô tìm kiếm"
                />
              </div>
              <ul class="navbar-nav me-3 mb-2 mb-lg-0 gap-2 col-auto">
                @auth
                <li class="nav-item btn" style="font-weight: 500">
                  <a class="nav-link active" aria-current="page" href="{{ route('cart.index') }}" style="color: white">
                    <i class="fa-solid fa-cart-shopping me-1"></i>Giỏ hàng
                  </a>
                </li>
                <li class="nav-item btn navbar-btn">
                  <a class="nav-link active" aria-current="page" href="{{ route('profile') }}" style="color: white">
                    <i class="fa-solid fa-user me-1"></i>{{ auth()->user()->name }}
                  </a>
                </li>
                @else
                <li class="nav-item btn navbar-btn">
                  <a class="nav-link active" aria-current="page" href="{{ route('dangnhap') }}" style="color: white">
                    <i class="fa-solid fa-user me-1"></i>Đăng nhập
                  </a>
                </li>
                @endauth
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- Main -->
    <main class="container mt-3">
      <!-- Điều hướng trang -->
      <div class="d-flex" style="font-size: small">
        <i class="fa-solid fa-house mt-1 me-2"></i>
        <p>
          <b><a href="{{ route('homepage') }}">Trang chủ</a> / 
          @if($product->Category)
            {{ $product->Category }} / 
          @endif
          @if($product->Brand)
            {{ $product->Brand }} /
          @endif
          </b> {{ $product->ProductName }}
        </p>
      </div>

      <!-- Sản phẩm chi tiết -->
      <div class="product-container row">
        <!-- PHÍA BÊN TRÁI -->
        <div class="col-12 col-md-6">
          <!-- Tên sản phẩm -->
          <h4>{{ $product->ProductName }}</h4>
          <div class="d-flex">
            <i class="fa-solid fa-star mt-1 me-2" style="color: #ffd43b"></i>
            <p><b>5.0</b> (Chưa có đánh giá)</p>
          </div>

          <!-- Yêu thích / hỏi đáp / thông số / so sánh -->
          <div class="d-flex" style="color: #4a8cf7">
            <div class="d-flex">
              <i class="fa-regular fa-heart mt-1 me-2"></i>
              <p>Yêu thích</p>
              <p class="mx-3">|</p>
            </div>
            <div class="d-flex">
              <i class="fa-regular fa-comment mt-1 me-2"></i>
              <p>Hỏi đáp</p>
              <p class="mx-3">|</p>
            </div>
            <div class="d-flex">
              <i class="fa-solid fa-microchip mt-1 me-2"></i>
              <p>Thông số</p>
            </div>
          </div>

          <!-- Ảnh sản phẩm -->
          <div class="ratio ratio-1x1 bg-light border rounded overflow-hidden">
          <img
           src="{{ asset($product->ImageURL ?? 'images/default-product.webp') }}"
           alt="{{ $product->ProductName }}"
           class="w-100 h-100 object-fit-contain"
          />
          </div>

          <!-- Thông số kỹ thuật -->
          @if($product->Description)
          <div class="product-specifications mt-4">
            <h5>Mô tả sản phẩm</h5>
            <div class="mt-2 p-3 border rounded bg-light">
              <p>{{ $product->Description }}</p>
            </div>
          </div>
          @endif
        </div>

        <!-- PHÍA BÊN PHẢI -->
        <div class="col-12 col-md-6">
          <!-- Giá -->
          <button
            class="btn border border-primary w-100"
            style="background-color: #f2f7ff; border-radius: 15px"
          >
            @if($product->Discount > 0)
            <p
              class="rounded mt-1"
              style="
                background-color: #fbe6e8;
                color: #e03c4e;
                font-weight: 500;
              "
            >
              Giảm {{ $product->Discount }}% - Giá dành riêng cho MEM
            </p>
            @endif
            <div class="d-flex justify-content-center align-items-center">
              <h3>{{ number_format($product->Price, 0, ',', '.') }}đ</h3>
              @if($product->OriginalPrice && $product->OriginalPrice > $product->Price)
              <p class="text-muted text-decoration-line-through ms-3 mb-0">
                {{ number_format($product->OriginalPrice, 0, ',', '.') }}đ
              </p>
              @endif
            </div>
          </button>

          <!-- Thông tin sản phẩm -->
          <div class="mt-4">
            @if($product->Brand)
            <div class="mb-3">
              <strong>Thương hiệu:</strong> 
              <span class="badge bg-primary">{{ $product->Brand }}</span>
            </div>
            @endif

            @if($product->Category)
            <div class="mb-3">
              <strong>Danh mục:</strong> 
              <span class="badge bg-secondary">{{ $product->Category }}</span>
            </div>
            @endif

            @if($product->Stock > 0)
            <div class="mb-3">
              <strong>Tình trạng:</strong> 
              <span class="badge bg-success">Còn hàng ({{ $product->Stock }} sản phẩm)</span>
            </div>
            @else
            <div class="mb-3">
              <strong>Tình trạng:</strong> 
              <span class="badge bg-danger">Hết hàng</span>
            </div>
            @endif
          </div>

          <!-- Phương thức thanh toán -->
          <form action="{{ route('cart.addProduct') }}" method="POST">
            @csrf
            <input type="hidden" name="product_id" value="{{ $product->ProductID }}">
            <input type="hidden" name="quantity" value="1">

            <div class="row mt-3 d-flex justify-content-center">
              <div
                class="col-3 btn d-flex align-items-center justify-content-center"
                style="
                  color: #3b82f6;
                  font-weight: 600;
                  border: 2px solid #3b82f6;
                  border-radius: 10px;
                "
              >
                Trả góp 0%
              </div>
              <div
                class="col-5 d-flex flex-column align-items-center btn mx-2"
                style="
                  color: white;
                  background: linear-gradient(to bottom, #ff4b4b, #d40000);
                "
              >
                <h5 class="mt-1">MUA NGAY</h5>
                <p class="mb-0">Giao nhanh 2 giờ</p>
              </div>
              <button
                type="submit"
                class="col-3 btn d-flex align-items-center justify-content-center"
                style="
                  color: #e03c4e;
                  font-weight: 600;
                  border: 2px solid #e03c4e;
                  border-radius: 10px;
                "
                @if($product->Stock <= 0) disabled @endif
              >
                <i class="fa-solid fa-cart-plus me-2"></i>
                Thêm vào giỏ
              </button>
            </div>
          </form>

          <!-- Ưu đãi thêm -->
          <div class="mt-4 p-3 border rounded bg-light">
            <h6 class="text-danger"><i class="fa-solid fa-gift me-2"></i>Ưu đãi thêm</h6>
            <ul class="mb-0">
              <li>Miễn phí giao hàng toàn quốc</li>
              <li>Bảo hành chính hãng 12 tháng</li>
              <li>Đổi trả trong 30 ngày nếu có lỗi</li>
              <li>Hỗ trợ trả góp 0% lãi suất</li>
            </ul>
          </div>

          <!-- Thông tin liên hệ -->
          <div class="mt-4 p-3 border rounded">
            <h6><i class="fa-solid fa-phone me-2"></i>Gọi đặt mua</h6>
            <p class="text-danger fw-bold mb-1">1800.2097 (miễn phí)</p>
            <p class="text-muted small mb-0">Gọi mua hàng: 7:30 - 22:00</p>
          </div>
        </div>
      </div>

      <!-- Đánh giá sản phẩm -->
      <div class="comment-container mt-5">
        <h4 class="m-3">Đánh giá {{ $product->ProductName }}</h4>
        <div class="text-center py-5">
          <p class="text-muted">Chưa có đánh giá nào cho sản phẩm này</p>
          <button class="btn btn-danger">Viết đánh giá đầu tiên</button>
        </div>
      </div>
    </main>

    <!-- Footer -->
    @extends('layouts.footer')
    @include('layouts.chat_backtotop')

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+3I6YIw+5z5z5z5z5z5z5z5z5z5z5"
      crossorigin="anonymous"
    ></script>
  </body>
</html>