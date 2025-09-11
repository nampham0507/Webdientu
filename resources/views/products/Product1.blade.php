<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>iPhone 16 Pro Max 256GB | Chính hãng VN/A</title>
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
            <a class="navbar-brand" href="{{route ('homepage')}}">
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
                    <li><a class="dropdown-item" href="#">Action</a></li>
                    <li>
                      <a class="dropdown-item" href="#">Another action</a>
                    </li>
                    <li>
                      <a class="dropdown-item" href="#">Something else here</a>
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
              <ul class="navbar-nav me-3 mb-2 mb-lg-0 gap-2 col-auto">
                <li class="nav-item btn" style="font-weight: 500">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="#"
                    style="color: white"
                    ><i class="fa-solid fa-cart-shopping me-1"></i>Giỏ hàng</a
                  >
                </li>
                <li class="nav-item btn navbar-btn">
                  <a
                    class="nav-link active"
                    aria-current="page"
                    href="#"
                    style="color: white"
                    ><i class="fa-solid fa-user me-1"></i>Đăng nhập</a
                  >
                </li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    </header>

    <!-- Main -->
    <main class="container mt-3">
      <!-- Điều hướng trang  -->
      <div class="d-flex" style="font-size: small">
        <i class="fa-solid fa-house mt-1 me-2"></i>
        <p>
          <b> Trang chủ / Điện thoại / Apple / Iphone /</b> iphone 16 Pro Max
          256GB | Chính hãng VN/A
        </p>
      </div>

      <!-- Sản phẩm chi tiết -->
      <div class="product-container row">
        <!-- PHÍA BÊN TRÁI -->
        <div class="col-12 col-md-6">
          <!-- Tên sản phẩm -->
          <h4>iPhone 16 Pro Max 256GB | Chính hãng VN/A</h4>
          <div class="d-flex">
            <i class="fa-solid fa-star mt-1 me-2" style="color: #ffd43b"></i>
            <p><b>4.9</b> (329 đánh giá)</p>
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
              <p class="mx-3">|</p>
            </div>
            <div class="d-flex">
              <i class="fa-solid fa-circle-plus mt-1 me-2"></i>
              <p>So sánh</p>
              <p class="mx-3">|</p>
            </div>
          </div>
          <!-- Ảnh sản phẩm -->
          <div
            id="productCarousel"
            class="carousel slide"
            data-bs-ride="carousel"
          >
            <!-- Main Carousel -->
            <div class="carousel-inner text-center ads-container">
              <div class="carousel-item active">
                <img
                  src="/Images/Products/Product1/Product1-Anh1.webp"
                  alt="iPhone 16 Pro Max"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/Images/Products/Product1/Product1-Anh2.webp"
                  alt="Cáp sạc USB-C"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/Images/Products/Product1/Product1-Anh3.webp"
                  alt="Ốp lưng"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/Images/Products/Product1/Product1-Anh4.webp"
                  alt="Ốp lưng"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/Images/Products/Product1/Product1-Anh5.webp"
                  alt="Ốp lưng"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/Images/Products/Product1/Product1-Anh6.webp"
                  alt="Ốp lưng"
                />
              </div>
              <div class="carousel-item">
                <img
                  src="/Images/Products/Product1/Product1-Anh7.webp"
                  alt="Ốp lưng"
                />
              </div>
            </div>

            <!-- Controls -->
            <button
              class="carousel-control-prev carousel-control"
              type="button"
              data-bs-target="#productCarousel"
              data-bs-slide="prev"
            >
              <span class="carousel-control-prev-icon"></span>
            </button>
            <button
              class="carousel-control-next carousel-control"
              type="button"
              data-bs-target="#productCarousel"
              data-bs-slide="next"
            >
              <span class="carousel-control-next-icon"></span>
            </button>
          </div>
          <!-- Thumbnails -->
          <div
            class="d-flex justify-content-left mt-3 gap-2 flex-nowrap overflow-x-auto overflow-y-hidden"
          >
            <img
              src="/Images/Products/Product1/Product1-Anh1.webp"
              width="80"
              height="80"
              class="thumb active"
              data-bs-target="#productCarousel"
              data-bs-slide-to="0"
            />
            <img
              src="/Images/Products/Product1/Product1-Anh2.webp"
              width="80"
              height="80"
              class="thumb"
              data-bs-target="#productCarousel"
              data-bs-slide-to="1"
            />
            <img
              src="/Images/Products/Product1/Product1-Anh3.webp"
              width="80"
              height="80"
              class="thumb"
              data-bs-target="#productCarousel"
              data-bs-slide-to="2"
            />
            <img
              src="/Images/Products/Product1/Product1-Anh4.webp"
              width="80"
              height="80"
              class="thumb"
              data-bs-target="#productCarousel"
              data-bs-slide-to="3"
            />
            <img
              src="/Images/Products/Product1/Product1-Anh5.webp"
              width="80"
              height="80"
              class="thumb"
              data-bs-target="#productCarousel"
              data-bs-slide-to="4"
            />
            <img
              src="/Images/Products/Product1/Product1-Anh6.webp"
              width="80"
              height="80"
              class="thumb"
              data-bs-target="#productCarousel"
              data-bs-slide-to="5"
            />
            <img
              src="/Images/Products/Product1/Product1-Anh7.webp"
              width="80"
              height="80"
              class="thumb"
              data-bs-target="#productCarousel"
              data-bs-slide-to="6"
            />
          </div>

          <!-- Thông số kĩ thuật -->
          <div class="product-specifications mt-4">
            <h5>Thông số kỹ thuật</h5>
            <table class="mt-2 table table-border shadow rounded custom-table">
              <tr>
                <td class="bg-body-secondary" width="40%">
                  Kích thước màn hình
                </td>
                <td>6.9 inches</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Camera sau</td>
                <td>
                  Camera chính: 48MP, f/1.78, 24mm, 2µm, chống rung quang học
                  dịch chuyển cảm biến thế hệ thứ hai, Focus Pixels 100% <br />
                  Telephoto 2x 12MP: 52 mm, ƒ/1.6 <br />
                  Camera góc siêu rộng: 48MP, 13 mm,ƒ/2.2 và trường ảnh 120°,
                  Hybrid Focus Pixels, ảnh có độ phân giải
                </td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Camera trước</td>
                <td>12MP, ƒ/1.9, Tự động lấy nét theo pha Focus Pixels</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Chipset</td>
                <td>Apple A18 Pro</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Công nghệ NFC</td>
                <td>Có</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Bộ nhớ trong</td>
                <td>256 GB</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Thẻ SIM</td>
                <td>Sim kép (nano-sim và e-sim) - Hỗ trợ 2 e-Sim</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Hệ điều hành</td>
                <td>iOS 18</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Độ phân giải màn hình</td>
                <td>2868 x 1320 pixels</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Tính năng màn hình</td>
                <td>
                  Dynamic Island <br />
                  Màn hình Luôn Bật <br />
                  Công nghệ ProMotion với tốc độ làm mới thích ứng lên đến
                  120Hz<br />
                  Màn hình HDR<br />
                  True Tone<br />
                  Dải màu rộng (P3)<br />
                  Haptic Touch<br />
                  Tỷ lệ tương phản 2.000.000:1
                </td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Loại CPU</td>
                <td>CPU 6 lõi mới với 2 lõi hiệu năng và 4 lõi hiệu suất</td>
              </tr>
              <tr>
                <td class="bg-body-secondary">Tương thích</td>
                <td>Tương Thích Với Thiết Bị Trợ Thính</td>
              </tr>
            </table>
          </div>
        </div>

        <!-- PHÍA BÊN PHẢI -->
        <div class="col-12 col-md-6">
          <!-- Giá -->
          <button
            class="btn border border-primary"
            style="background-color: #f2f7ff; border-radius: 15px"
          >
            <p
              class="rounded mt-1"
              style="
                background-color: #fbe6e8;
                color: #e03c4e;
                font-weight: 500;
              "
            >
              Giá dành riêng cho MEM
            </p>
            <div class="d-flex">
              <h3>29.741.000đ</h3>
              <p class="text-muted text-decoration-line-through ms-3">
                34.990.000đ
              </p>
            </div>
          </button>

          <!-- Loại -->
          <div class="version mt-4">
            <!-- storage -->
            <h5><strong>Phiên bản</strong></h5>
            <div role="group" aria-label="Chọn dung lượng">
              <input
                type="radio"
                class="btn-check"
                name="storage"
                id="storage1"
                autocomplete="off"
                checked
              />
              <label class="btn px-4 py-3 mx-1" for="storage1">1 TB</label>

              <input
                type="radio"
                class="btn-check"
                name="storage"
                id="storage2"
                autocomplete="off"
              />
              <label class="btn px-4 py-3 mx-1" for="storage2">512 GB</label>

              <input
                type="radio"
                class="btn-check"
                name="storage"
                id="storage3"
                autocomplete="off"
              />
              <label class="btn px-4 py-3 mx-1" for="storage3">256 GB</label>
            </div>

            <!-- Color -->
            <h5 class="mt-2"><strong>Màu sắc</strong></h5>
            <div role="group" aria-label="Chọn dung lượng">
              <input
                type="radio"
                class="btn-check"
                name="color"
                id="color1"
                autocomplete="off"
                checked
              />
              <label class="btn mx-1 my-2" for="color1">
                <div class="d-flex">
                  <img
                    width="50"
                    height="50"
                    src="/Images/Products/Product1/iphone-16-pro-max-titan-tu-nhien.webp"
                  />
                  <div>
                    <strong>Titan tự nhiên</strong>
                    <p>30.190.000đ</p>
                  </div>
                </div>
              </label>

              <input
                type="radio"
                class="btn-check"
                name="color"
                id="color2"
                autocomplete="off"
              />
              <label class="btn mx-1 my-2" for="color2"
                ><div class="d-flex">
                  <img
                    width="50"
                    height="50"
                    src="/Images/Products/Product1/iphone-16-pro-max-titan-sa-mac.webp"
                  />
                  <div>
                    <strong>Titan sa mạc</strong>
                    <p>30.190.000đ</p>
                  </div>
                </div></label
              >

              <input
                type="radio"
                class="btn-check"
                name="color"
                id="color3"
                autocomplete="off"
              />
              <label class="btn mx-1 my-2" for="color3"
                ><div class="d-flex">
                  <img
                    width="50"
                    height="50"
                    src="/Images/Products/Product1/iphone-16-pro-max-titan-den.webp"
                  />
                  <div>
                    <strong>Titan đen</strong>
                    <p>30.190.000đ</p>
                  </div>
                </div></label
              >

              <input
                type="radio"
                class="btn-check"
                name="color"
                id="color4"
                autocomplete="off"
              />
              <label class="btn mx-1 my-2" for="color4"
                ><div class="d-flex">
                  <img
                    width="50"
                    height="50"
                    src="/Images/Products/Product1/iphone-16-pro-max-titan-trang.webp"
                  />
                  <div>
                    <strong>Titan trắng</strong>
                    <p>30.190.000đ</p>
                  </div>
                </div></label
              >
            </div>
          </div>

          <!-- Chi nhánh các cửa hàng -->
          <div class="container mt-2">
            <div class="pt-3 ps-2 bg-light border rounded row">
              <!-- Xem chi nhánh của hàng -->
              <div class="d-flex flex-wrap mb-2">
                <div class="me-1">
                  <strong>Xem chi nhánh có hàng</strong><br />
                  Có <span class="text-primary">28</span> cửa hàng có sẵn sản
                  phẩm
                </div>

                <!-- Dropdown -->
                <div class="mx-1">
                  <select class="form-select" style="width: auto">
                    <option>Hà Nội</option>
                    <option>Hồ Chí Minh</option>
                  </select>
                </div>
                <div class="mx-1">
                  <select class="form-select" style="width: auto">
                    <option>Quận/Huyện</option>
                    <option>Hai Bà Trưng</option>
                    <option>Đống Đa</option>
                  </select>
                </div>
              </div>

              <!-- Danh sách cửa hàng -->
              <div
                class="store-list d-flex flex-nowrap overflow-x-auto overflow-y-hidden gap-2 mb-3"
              >
                <div class="store-card">
                  <div class="mb-2 fw-semibold">
                    51 Đại Cồ Việt, Phường Lê Đại Hành, Quận Hai Bà Trưng
                  </div>
                  <div class="d-flex gap-2">
                    <span class="phone-badge">
                      <i
                        class="fa-solid fa-phone me-1"
                        style="color: #d70018"
                      ></i>
                      02471000051
                    </span>
                    <span class="map-badge">
                      <i
                        class="fa-solid fa-location-dot me-1"
                        style="color: #d70018"
                      ></i>
                      Bản đồ
                    </span>
                  </div>
                </div>

                <div class="store-card">
                  <div class="mb-2 fw-semibold">
                    282 Minh Khai, Q. Hai Bà Trưng, Hà Nội
                  </div>
                  <div class="d-flex gap-2">
                    <span class="phone-badge">
                      <i
                        class="fa-solid fa-phone me-1"
                        style="color: #d70018"
                      ></i>
                      02471010282
                    </span>
                    <span class="map-badge">
                      <i
                        class="fa-solid fa-location-dot me-1"
                        style="color: #d70018"
                      ></i>
                      Bản đồ
                    </span>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Phương thức thanh toán -->
          <div class="row mt-3 d-flex justify-content-center">
            <div
              class="col-2 btn d-flex align-items-center"
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
              class="col-6 d-flex flex-column align-items-center btn mx-2"
              style="
                color: white;
                background: linear-gradient(to bottom, #ff4b4b, #d40000);
              "
            >
              <h5 class="mt-1">MUA NGAY</h5>
              <p>Giao nhanh 2 giờ hoặc nhận tại cửa hàng</p>
            </div>
            <div
              class="col-3 btn d-flex align-items-center justify-content-center"
              style="
                color: #e03c4e;
                font-weight: 600;
                border: 2px solid #e03c4e;
                border-radius: 10px;
              "
            >
              <i class="fa-solid fa-cart-plus me-2"></i>
              Thêm vào giỏ
            </div>
          </div>

          <!-- Video youtube -->
          <div class="container my-4">
            <div class="ratio ratio-16x9 border rounded shadow">
              <iframe
                src="https://www.youtube.com/embed/tYJWcs-qnAc?si=WsbKW1KuSHuT0aaj"
                title="YouTube video player"
                frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                referrerpolicy="strict-origin-when-cross-origin"
                allowfullscreen
              ></iframe>
            </div>
          </div>
        </div>
      </div>

      <!-- Đánh giá sản phẩm -->
      <div class="comment-container mt-4">
        <h4 class="m-3">Đánh giá iPhone 16 Pro Max 256GB | Chính hãng VN/A</h4>
        <div class="rating-container row m-3">
          <div
            class="overall-rating col-3 d-flex flex-column align-items-center my-3"
          >
            <div class="d-flex">
              <h1>5.0</h1>
              <h2 style="color: #a1a1aa">/5</h2>
            </div>
            <div class="d-flex gap-1">
              <i class="fa-solid fa-star" style="color: #ffd43b"></i
              ><i class="fa-solid fa-star" style="color: #ffd43b"></i
              ><i class="fa-solid fa-star" style="color: #ffd43b"></i
              ><i class="fa-solid fa-star" style="color: #ffd43b"></i>
              <i class="fa-solid fa-star" style="color: #ffd43b"></i>
            </div>
            <p>45 lượt đánh giá</p>
            <button
              class="btn rounded"
              style="background-color: #d7000e; color: white; font-weight: 600"
            >
              Viết đánh giá
            </button>
          </div>
          <!-- Lượt đánh giá -->
          <div
            class="detailed-rating col-9 d-flex flex-column align-items-center my-3"
          >
            <div class="container mt-3" style="max-width: 800px">
              <!-- 5 sao -->
              <div class="d-flex align-items-center mb-2">
                <div class="me-2">
                  5 <i class="fa-solid fa-star" style="color: gold"></i>
                </div>
                <div
                  class="progress flex-grow-1"
                  style="height: 8px; border-radius: 50px"
                >
                  <div
                    class="progress-bar"
                    style="
                      width: 95%;
                      background-color: red;
                      border-radius: 50px;
                    "
                  ></div>
                </div>
                <div class="ms-2 text-muted" style="white-space: nowrap">
                  44 đánh giá
                </div>
              </div>

              <!-- 4 sao -->
              <div class="d-flex align-items-center mb-2">
                <div class="me-2">
                  4 <i class="fa-solid fa-star" style="color: gold"></i>
                </div>
                <div
                  class="progress flex-grow-1"
                  style="height: 8px; border-radius: 50px"
                >
                  <div
                    class="progress-bar"
                    style="
                      width: 5%;
                      background-color: red;
                      border-radius: 50px;
                    "
                  ></div>
                </div>
                <div class="ms-2 text-muted" style="white-space: nowrap">
                  1 đánh giá
                </div>
              </div>

              <!-- 3 sao -->
              <div class="d-flex align-items-center mb-2">
                <div class="me-2">
                  3 <i class="fa-solid fa-star" style="color: gold"></i>
                </div>
                <div
                  class="progress flex-grow-1"
                  style="height: 8px; border-radius: 50px"
                >
                  <div
                    class="progress-bar"
                    style="
                      width: 0%;
                      background-color: red;
                      border-radius: 50px;
                    "
                  ></div>
                </div>
                <div class="ms-2 text-muted" style="white-space: nowrap">
                  0 đánh giá
                </div>
              </div>

              <!-- 2 sao -->
              <div class="d-flex align-items-center mb-2">
                <div class="me-2">
                  2 <i class="fa-solid fa-star" style="color: gold"></i>
                </div>
                <div
                  class="progress flex-grow-1"
                  style="height: 8px; border-radius: 50px"
                >
                  <div
                    class="progress-bar"
                    style="
                      width: 0%;
                      background-color: red;
                      border-radius: 50px;
                    "
                  ></div>
                </div>
                <div class="ms-2 text-muted" style="white-space: nowrap">
                  0 đánh giá
                </div>
              </div>

              <!-- 1 sao -->
              <div class="d-flex align-items-center">
                <div class="me-2">
                  1 <i class="fa-solid fa-star" style="color: gold"></i>
                </div>
                <div
                  class="progress flex-grow-1"
                  style="height: 8px; border-radius: 50px"
                >
                  <div
                    class="progress-bar"
                    style="
                      width: 0%;
                      background-color: red;
                      border-radius: 50px;
                    "
                  ></div>
                </div>
                <div class="ms-2 text-muted" style="white-space: nowrap">
                  0 đánh giá
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Các bình luận -->
        <div class="rating-container mt-5 m-3">
          <!-- Comment 1 -->
          <div class="row mt-2">
            <div class="col-3 d-flex">
              <div class="avatar ms-3 me-2">
                <img
                  src="https://cdn.kwork.com/files/portfolio/t3/24/a5bf8465becd2274bd38894122c7020e96115673-1711803733.jpg"
                />
              </div>
              <strong>Xuân Mạnh</strong>
            </div>
            <div class="col-9">
              <div class="d-flex gap-1 my-1 mb-4">
                <i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
              </div>
              <div class="my-2">
                airpods 4 vừa mua ở TGDD hơn 1 tháng shop thu lại được nhiêu nhỉ
              </div>
              <div class="d-flex my-1">
                <i
                  class="fa-regular fa-clock me-1 mt-1"
                  style="color: #a1a1bd"
                ></i
                >Đánh giá đã đăng vào 6 ngày trước
              </div>
            </div>
          </div>
          <hr />

          <!-- Comment 2 -->
          <div class="row mt-2">
            <div class="col-3 d-flex">
              <div class="avatar ms-3 me-2">
                <img
                  src="https://cdn.kwork.com/files/portfolio/t3/24/a5bf8465becd2274bd38894122c7020e96115673-1711803733.jpg"
                />
              </div>
              <strong>Như Nguyệt</strong>
            </div>
            <div class="col-9">
              <div class="d-flex gap-1 my-1 mb-4">
                <i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
              </div>
              <div class="my-2">đã mua hàng, chất lượng tốt</div>
              <div class="d-flex my-1">
                <i
                  class="fa-regular fa-clock me-1 mt-1"
                  style="color: #a1a1bd"
                ></i
                >Đánh giá đã đăng vào 6 ngày trước
              </div>
            </div>
          </div>
          <hr />

          <!-- Comment 3 -->
          <div class="row mt-2">
            <div class="col-3 d-flex">
              <div class="avatar ms-3 me-2">
                <img
                  src="https://cdn.kwork.com/files/portfolio/t3/24/a5bf8465becd2274bd38894122c7020e96115673-1711803733.jpg"
                />
              </div>
              <strong>Đình Nam</strong>
            </div>
            <div class="col-9">
              <div class="d-flex gap-1 my-1 mb-4">
                <i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
              </div>
              <div class="my-2">Có cái Iphone nhìn sang hẳn</div>
              <div class="d-flex my-1">
                <i
                  class="fa-regular fa-clock me-1 mt-1"
                  style="color: #a1a1bd"
                ></i
                >Đánh giá đã đăng vào 6 ngày trước
              </div>
            </div>
          </div>
          <hr />

          <!-- Comment 4 -->
          <div class="row mt-2">
            <div class="col-3 d-flex">
              <div class="avatar ms-3 me-2">
                <img
                  src="https://cdn.kwork.com/files/portfolio/t3/24/a5bf8465becd2274bd38894122c7020e96115673-1711803733.jpg"
                />
              </div>
              <strong>Nguyễn Thành</strong>
            </div>
            <div class="col-9">
              <div class="d-flex gap-1 my-1 mb-4">
                <i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i
                ><i class="fa-solid fa-star" style="color: #ffd43b"></i>
                <i class="fa-solid fa-star" style="color: #ffd43b"></i>
              </div>
              <div class="my-2">
                iPhone 16 Pro Max sở hữu chipset A18 Pro mạnh mẽ giúp xử lý
                nhanh mọi tác vụ, camera 48 MP zoom quang 5x cho ảnh nét, màn
                hình 6.9 inch sống động. Pin dung lượng cao của máy hỗ trợ phát
                video tới 33 tiếng, đáp ứng nhu cầu giải trí liên tục suốt ngày
                dài. Cùng với đó là thiết kế khung Titanium bền nhẹ, mang lại
                cảm giác sang trọng và chắc chắn khi cầm.
              </div>
              <div class="d-flex my-1">
                <i
                  class="fa-regular fa-clock me-1 mt-1"
                  style="color: #a1a1bd"
                ></i
                >Đánh giá đã đăng vào 6 ngày trước
              </div>
            </div>
          </div>
          <hr />
        </div>
      </div>
    </main>

    

    <!-- Nút lên đầu trang -->
    <button
      id="backToTop"
      class="d-none d-md-block btn btn-dark shadow d-flex align-items-center justify-content-center"
      style="
        display: none;
        position: fixed;
        bottom: 80px;
        right: 20px;
        z-index: 1030;
        font-size: large;
      "
    >
      <strong>Lên đầu</strong
      ><i class="fa-solid fa-up-long ms-1" style="color: #fcfcfd"></i>
    </button>

    <!-- Nút mở khung chat -->
    <button
      class="btn shadow d-none d-md-block"
      style="
        background-color: #db2f17;
        position: fixed;
        bottom: 20px;
        right: 20px;
        z-index: 1050;
        color: white;
        font-size: large;
      "
      type="button"
      data-bs-toggle="collapse"
      data-bs-target="#chatCollapse"
      aria-expanded="false"
      aria-controls="chatCollapse"
    >
      <strong>Tư vấn</strong><i class="fa-regular fa-comments ms-1"></i>
    </button>

    <!-- Khung Chat  -->
    <div
      class="collapse position-fixed end-0 p-3"
      id="chatCollapse"
      style="width: 300px; bottom: 80px; z-index: 1040"
    >
      <div class="card shadow" style="height: 400px">
        <div
          class="card-header text-white d-flex"
          style="background-color: #db2f17"
        >
          <h4 class="mt-1 me-auto">Hỗ trợ trực tuyến</h4>
          <button
            type="button"
            class="btn-close mt-2"
            aria-label="Close"
            data-bs-toggle="collapse"
            data-bs-target="#chatCollapse"
            aria-controls="chatCollapse"
          ></button>
        </div>
        <div class="card-body overflow-auto">
          <p class="text-muted small">
            Xin chào! Chúng tôi có thể giúp gì cho bạn?
          </p>
        </div>
        <div class="card-footer">
          <div class="input-group">
            <input
              type="text"
              class="form-control"
              placeholder="Nhập tin nhắn..."
            />
            <button class="btn" style="background-color: #db2f17; color: white">
              <strong>Gửi</strong>
            </button>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap JS -->
    <script
      src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
      integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"
      integrity="sha384-7qAoOXltbVP82dhxHAUje59V5r2YsVfBafyUDxEdApLPmcdhBPg1DKg1ERo0BZlK"
      crossorigin="anonymous"
    ></script>

    <!-- Product JS -->
    <script src="/JAVASCRIPT/Product.js"></script>
  </body>
</html>
