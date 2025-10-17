<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>HomePage</title>
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
    <!-- HomePage CSS -->
    <link rel="stylesheet" href="{{ asset('css/HomePage.css') }}">
    <link rel="stylesheet" href="{{ asset('css/footer.css') }}">
  </head>

  <body>
    <!-- Navbar -->
    <header>
      <div class="header-container">
        <nav class="navbar navbar-expand-lg container">
          <div class="container-fluid">
            <a class="navbar-brand" href="#">
              <img class="logo-img"  src="{{ asset('images/Quangcao/Logo.png')}}"  alt="Logo">
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
            <div
              class="collapse navbar-collapse row"
              id="navbarSupportedContent"
            >
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
                    <li>
                      <a class="dropdown-item" href="#">Tivi</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Máy tính, Laptop</a>
                    </li>
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
                    <li>
                      <a class="dropdown-item" href="#">TP. Hồ Chí Minh</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Đà Nẵng</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Nha Trang</a>
                    </li>
                  </ul>
                </li>
              </ul>
              <!-- Ô tìm kiếm -->
              <div class="col input-group same-height">
                <span class="input-group-text" style="background-color: white"
                  ><i class="fa-solid fa-magnifying-glass"></i
                ></span>
                <input
                  type="text"
                  class="form-control"
                  placeholder="Bạn muốn mua gì hôm nay?"
                  aria-label="Ô tìm kiếm"
                />
              </div>
                {{-- Giỏ hàng và thông tin người dùng --}}
        <ul class="navbar-nav me-3 mb-2 mb-lg-0 gap-2 col-auto">
          @auth
          <li class="nav-item btn" style="font-weight: 500">
            <a
              class="nav-link active"
              aria-current="page"
              href="{{ route('cart.index') }}"
              style="color: white"
              ><i class="fa-solid fa-cart-shopping me-1"></i>Giỏ hàng</a
            >
          </li>
          <li class="nav-item btn navbar-btn dropdown">
            <a
              class="nav-link dropdown-toggle"
              href="#"
              role="button"
              data-bs-toggle="dropdown"
              aria-expanded="false"
              style="color: white"
            >
              <i class="fa-solid fa-user me-1"></i>{{ auth()->user()->FullName }}
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="{{route('profile')}}" class="dropdown-item">
                  Thông tin người dùng
                </a>
              </li>
              <li>
                <hr class="dropdown-divider">
              </li>
              <li>
                <a href="{{ route('logout') }}" class="dropdown-item">Đăng xuất</a>
              </li>
            </ul>
          </li>
          
          @endauth

          {{-- Nếu chưa đăng nhập --}}
          @guest
            <li class="nav-item btn navbar-btn">
            <a
              class="nav-link active"
              aria-current="page"
              href="{{route('dangky')}}"
              style="color: white; font-weight: 500"
              ><i class="fa-solid fa-user me-1"></i>Đăng kí</a
            >
            <li class="nav-item btn navbar-btn">
              <a
                class="nav-link active"
                aria-current="page"
                href="{{ route('dangnhap') }}"
                style="color: white; font-weight: 500"
                ><i class="fa-solid fa-user me-1"></i>Đăng nhập</a
              >
          @endguest
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>
    <!-- body -->
    <main class="container">
      <!-- Quảng cáo -->
      <div class="ads-container row mt-2 no-stretch">
        <!-- Sidebar ở bên trái -->
        <div class="sidebar-container col-2 border rounded px-2">
          <div>
            <li class="my-1 sidebar-items me-auto">
              <div>
                <i class="fa-icon fa-solid fa-mobile-screen-button me-2"></i
                >Điện thoại, Tablet
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>

            <li class="my-2 sidebar-items">
              <div><i class="fa-icon fa-solid fa-laptop me-2"></i>Laptop</div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div>
                <i class="fa-icon fa-solid fa-headphones me-2"></i>Âm thanh
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div>
                <i class="fa-icon fa-solid fa-camera me-2"></i>Đồng hồ, camera
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div>
                <i class="fa-icon fa-solid fa-house me-2"></i>Đồ gia dụng
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div>
                <i class="fa-icon fa-solid fa-computer-mouse me-2"></i>Phụ kiện
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div>
                <i class="fa-icon fa-solid fa-computer me-2"></i>PC, màn hình
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div><i class="fa-icon fa-solid fa-tv me-2"></i>Tivi</div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
            <li class="my-2 sidebar-items">
              <div>
                <i class="fa-icon fa-solid fa-recycle me-2"></i>Thu cũ đổi mới
              </div>
              <span class="right">
                <i class="fa-solid fa-angle-right"></i>
              </span>
            </li>
          </div>
        </div>
        <!-- Quảng cáo ở chính giữa -->
        <div class="ad3-container col-10 col-lg-8 border rounded">
          <div
            id="promoCarousel"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img
                  src="{{ asset('images/Quangcao/SamsungADS.webp') }}"
                  class="d-block w-100 rounded shadow"
                  alt="Samsung Z Fold7"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="{{ asset('images/Quangcao/IphoneADS.webp') }}"
                  class="d-block w-100 rounded shadow"
                  alt="iPhone 16 Pro Max"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="{{asset('images/Quangcao/OppoADS.png')}}"
                  class="d-block w-100 rounded shadow"
                  alt="Oppo Reno14"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="{{asset('images/Quangcao/XiaomiADS.webp')}}"
                  class="d-block w-100 rounded shadow"
                  alt="Oppo Reno14"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="{{asset('images/Quangcao/AsusVivobookADS.webp')}}"
                  class="d-block w-100 rounded shadow"
                  alt="Oppo Reno14"
                />
              </div>
            </div>
            <!-- Nút điều hướng -->
            <button
              class="carousel-control-prev"
              type="button"
              data-bs-target="#promoCarousel"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button
              class="carousel-control-next"
              type="button"
              data-bs-target="#promoCarousel"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
          <ul
            class="nav nav-tabs mt-2 border-0 mb-2 gap-2 d-flex flex-nowrap overflow-x-auto overflow-y-hidden"
          >
            <li class="nav-item">
              <a
                class="nav-link active fw-bold"
                style="width: 180px"
                data-bs-target="#promoCarousel"
                data-bs-slide-to="0"
                >GALAXY Z7 SERIES<br /><small class="text-muted"
                  >Mở bán quà khủng</small
                ></a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active fw-bold"
                style="width: 180px"
                data-bs-target="#promoCarousel"
                data-bs-slide-to="1"
                >IPHONE 16 PRO MAX<br /><small class="text-muted"
                  >Mua ngay</small
                ></a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active fw-bold"
                style="width: 180px"
                data-bs-target="#promoCarousel"
                data-bs-slide-to="2"
                >OPPO RENO14<br /><small class="text-muted">Mua ngay</small></a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active fw-bold"
                style="width: 180px"
                data-bs-target="#promoCarousel"
                data-bs-slide-to="3"
                >XIAOMI<br /><small class="text-muted"
                  >Nhập mã săn deal</small
                ></a
              >
            </li>
            <li class="nav-item">
              <a
                class="nav-link active fw-bold"
                style="width: 180px"
                data-bs-target="#promoCarousel"
                data-bs-slide-to="4"
                >ASUS VIVOBOOK<br /><small class="text-muted"
                  >Giá ưu đãi</small
                ></a
              >
            </li>
          </ul>
        </div>

        <!-- Quảng cáo nhỏ ở bên phải -->
        <div
          class="d-none ad2-container col-lg-2 d-lg-flex flex-column justify-content-left gap-2"
        >
          <img
            src="{{asset('images/Quangcao/smallADS1.webp')}}"
            class="d-block w-100 rounded mb-2"
            alt="Ảnh quảng cáo nhỏ 1"
          />

          <img
            src="{{asset('images/Quangcao/smallADS2.webp')}}"
            class="d-block w-100 rounded shadow mb-2"
            alt="Ảnh quảng cáo nhỏ 2"
          />
          <img
            src="{{asset('images/Quangcao/smallADS3.webp')}}"
            class="d-block w-100 rounded shadow mb-2"
            alt="Ảnh quảng cáo nhỏ 3"
          />
          <img
            src="{{asset('images/Quangcao/smallADS4.webp')}}"
            class="d-block w-100 rounded shadow mb-2"
            alt="Ảnh quảng cáo nhỏ 4"
          />
        </div>
      </div>

      <!-- Quảng cáo dài  -->
      <div class="long-ads mt-3">
        <img src="{{asset('images/Quangcao/longAds.gif')}}" />
      </div>

      <!-- Gợi ý sản phẩm -->
      <div class="recommend-section mt-3">
        <h4>Gợi ý cho bạn</h4>
        <div
          class="d-flex flex-nowrap overflow-auto justify-content-left justify-content-xl-center mt-3"
        >
          <div
            class="card p-3 rounded shadow position-relative mx-2"
            style="
              background: linear-gradient(180deg, #fff, #ffeceb);
              width: 220px;
              min-width: 220px;
            "
          >
            <span class="badge bg-danger position-absolute top-0 start-0 m-2"
              >Giảm 3%</span
            >

            <img
              src="{{asset('images/RecommendProduct/Rec1.webp')}}"
              class="card-img-top mt-4"
              alt="CPU AMD Ryzen 5 5600"
            />

            <div class="card-body p-0 mt-2">
              <h6 class="card-title mb-2">CPU AMD Ryzen 5 5600</h6>
              <div class="d-flex align-items-baseline gap-2">
                <span class="text-danger fw-bold fs-6">3.900.000đ</span>
                <small class="text-muted text-decoration-line-through"
                  >4.000.000đ</small
                >
              </div>
              <div class="bg-light text-secondary small px-2 py-1 rounded mt-1">
                Giá S-Student 3.705.000đ
              </div>
              <div class="d-flex flex-row-reverse mt-2">
                <btn class="btn btn-primary">♡ Yêu thích</btn>
              </div>
            </div>
          </div>

          <div
            class="card p-3 rounded shadow position-relative mx-2"
            style="
              background: linear-gradient(180deg, #fff, #ffeceb);
              width: 220px;
              min-width: 220px;
            "
          >
            <span class="badge bg-danger position-absolute top-0 start-0 m-2"
              >Giảm 19%</span
            >

            <img
              src="{{asset('images/RecommendProduct/Rec2.webp')}}"
              class="card-img-top mt-4"
              alt="CPU AMD Ryzen 5 5600"
            />

            <div class="card-body p-0 mt-2">
              <h6 class="card-title mb-2">
                Camera hành trình Vietmap KCO1 cảnh báo giọng nói
              </h6>
              <div class="d-flex align-items-baseline gap-2">
                <span class="text-danger fw-bold fs-6">3.390.000đ</span>
                <small class="text-muted text-decoration-line-through"
                  >4.190.000đ</small
                >
              </div>
              <div class="bg-light text-secondary small px-2 py-1 rounded mt-1">
                Giá S-Student 3.322.000đ
              </div>
              <div class="d-flex flex-row-reverse mt-2">
                <btn class="btn btn-primary">♡ Yêu thích</btn>
              </div>
            </div>
          </div>

          <div
            class="card p-3 rounded shadow position-relative mx-2"
            style="
              background: linear-gradient(180deg, #fff, #ffeceb);
              width: 220px;
              min-width: 220px;
            "
          >
            <span class="badge bg-danger position-absolute top-0 start-0 m-2"
              >Giảm 20%</span
            >

            <img
              src="{{asset('images/RecommendProduct/Rec3.webp')}}"
              class="card-img-top mt-4"
              alt="Ốp lưng Samsung galaxy A05S OU dẻo trong"
            />

            <div class="card-body p-0 mt-2">
              <h6 class="card-title mb-2">
                Ốp lưng Samsung galaxy A05S OU dẻo trong
              </h6>
              <div class="d-flex align-items-baseline gap-2">
                <span class="text-danger fw-bold fs-6">72.000đ</span>
                <small class="text-muted text-decoration-line-through"
                  >90.000đ</small
                >
              </div>
              <div class="bg-light text-secondary small px-2 py-1 rounded mt-1">
                Giá S-Student 70.000đ
              </div>
              <div class="d-flex flex-row-reverse mt-2">
                <btn class="btn btn-primary">♡ Yêu thích</btn>
              </div>
            </div>
          </div>

          <div
            class="card p-3 rounded shadow position-relative mx-2"
            style="
              background: linear-gradient(180deg, #fff, #ffeceb);
              width: 220px;
              min-width: 220px;
            "
          >
            <span class="badge bg-danger position-absolute top-0 start-0 m-2"
              >Giảm 20%</span
            >

            <img
              src="{{asset('images/RecommendProduct/Rec4.webp')}}"
              class="card-img-top mt-4"
              alt="Máy sấy tóc Dyson Supersonic Hairedyer HD"
            />

            <div class="card-body p-0 mt-2">
              <h6 class="card-title mb-2">
                Máy sấy tóc Dyson Supersonic Hairedyer HD
              </h6>
              <div class="d-flex align-items-baseline gap-2">
                <span class="text-danger fw-bold fs-6">10.490.000đ</span>
                <small class="text-muted text-decoration-line-through"
                  >12.000.000đ</small
                >
              </div>
              <div class="bg-light text-secondary small px-2 py-1 rounded mt-1">
                Giá S-Student 10.438.000đ
              </div>
              <div class="d-flex flex-row-reverse mt-2">
                <btn class="btn btn-primary">♡ Yêu thích</btn>
              </div>
            </div>
          </div>

          <div
            class="card p-3 rounded shadow position-relative mx-2"
            style="
              background: linear-gradient(180deg, #fff, #ffeceb);
              width: 220px;
              min-width: 220px;
            "
          >
            <span class="badge bg-danger position-absolute top-0 start-0 m-2"
              >Giảm 32%</span
            >

            <img
              src="{{asset('images/RecommendProduct/Rec5.webp')}}"
              class="card-img-top mt-4"
              alt=" Máy Massage cổ gáy Philips PPM3304"
            />

            <div class="card-body p-0 mt-2">
              <h6 class="card-title mb-2">
                Máy Massage cổ gáy Philips PPM3304
              </h6>
              <div class="d-flex align-items-baseline gap-2">
                <span class="text-danger fw-bold fs-6">1.890.000đ</span>
                <small class="text-muted text-decoration-line-through"
                  >2.790.000đ</small
                >
              </div>
              <div class="bg-light text-secondary small px-2 py-1 rounded mt-1">
                Giá S-Student 1.881.000đ
              </div>
              <div class="d-flex flex-row-reverse mt-2">
                <btn class="btn btn-primary">♡ Yêu thích</btn>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Phần Sản phẩm nổi bật -->
<div class="products-section mt-3">
  <!-- Tiêu đề -->
  <div class="d-flex flex-column flex-md-row">
    <h4 class="me-auto">CÁC SẢN PHẨM NỔI BẬT</h4>
    <div class="d-flex flex-nowrap overflow-auto gap-2">
      <button class="btn" style="background-color: #f3f4f6">Apple</button>
      <button class="btn" style="background-color: #f3f4f6">Samsung</button>
      <button class="btn" style="background-color: #f3f4f6">Asus</button>
      <button class="btn" style="background-color: #f3f4f6">Xiaomi</button>
      <button class="btn" style="background-color: #f3f4f6">Lenovo</button>
      <button class="btn" style="background-color: #f3f4f6">Oppo</button>
      <button class="btn" style="background-color: #f3f4f6">Nokia</button>
      <button class="btn" style="background-color: #f3f4f6">Vivo</button>
      <button class="btn" style="background-color: #f3f4f6">Microsoft</button>
      <button class="btn" style="background-color: #f3f4f6">Alien</button>
    </div>
  </div>

  <!-- Các sản phẩm từ database -->
  <div class="d-flex flex-wrap mt-3 justify-content-md-center justify-content-left">
    @forelse($featuredProducts as $product)
    <a
      class="card p-3 rounded shadow position-relative mx-2 mt-3 btn"
      href="{{ url('/product/' . $product->ProductID) }}"
      style="
        background: linear-gradient(180deg, #fff, #ffeceb);
        width: 220px;
        min-width: 220px;
      "
    >
      @if($product->Discount > 0)
      <span class="badge bg-danger position-absolute top-0 start-0 m-2">
        Giảm {{ $product->Discount }}%
      </span>
      @endif

      <img
        src="{{ asset($product->ImageURL ?? 'images/default-product.webp') }}"
        class="card-img-top mt-4"
        alt="{{ $product->ProductName }}"
        style="height: 180px; object-fit: contain;"
      />

      <div class="card-body p-0 mt-2">
        <h6 class="card-title mb-2">{{ $product->ProductName }}</h6>
        <div class="d-flex align-items-baseline gap-2">
          <span class="text-danger fw-bold fs-6">
            {{ number_format($product->Price, 0, ',', '.') }}đ
          </span>
          @if($product->OriginalPrice && $product->OriginalPrice > $product->Price)
          <small class="text-muted text-decoration-line-through">
            {{ number_format($product->OriginalPrice, 0, ',', '.') }}đ
          </small>
          @endif
        </div>
        
        @if($product->Brand)
        <div class="bg-light text-secondary small px-2 py-1 rounded mt-1">
          Thương hiệu: {{ $product->Brand }}
        </div>
        @endif
        
        <div class="d-flex flex-row-reverse mt-2">
          <btn class="btn btn-primary">♡ Yêu thích</btn>
        </div>
      </div>
    </a>
    @empty
    <!-- Hiển thị khi chưa có sản phẩm -->
    <div class="col-12 text-center py-5">
      <i class="bi bi-inbox" style="font-size: 4rem; color: #ccc;"></i>
      <p class="text-muted mt-3">Chưa có sản phẩm nổi bật nào</p>
    </div>
    @endforelse
  </div>

  <!-- Pagination -->
  @if($featuredProducts->count() > 0)
  <div class="d-flex justify-content-center mt-3">
    <nav aria-label="...">
      <ul class="pagination">
        <li class="page-item disabled">
          <a class="page-link">Previous</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">1</a></li>
        <li class="page-item active">
          <a class="page-link" href="#" aria-current="page">2</a>
        </li>
        <li class="page-item"><a class="page-link" href="#">3</a></li>
        <li class="page-item">
          <a class="page-link" href="#">Next</a>
        </li>
      </ul>
    </nav>
  </div>
  @endif
</div>

        

    <!-- Footer -->
    @extends('layouts.footer')
    @include('layouts.chat_backtotop')
  </body>
</html>
