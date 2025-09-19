@extends('layouts/profile')
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang cá nhân - Sdevices</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
  @push('styles')
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">
  @endpush
</head>
<body>
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar p-4">
      <h1 class="mb-4 text-danger fw-bold">Profile</h1>
      <nav class="nav flex-column">
        <a class="nav-link active" href="#"><i class="bi bi-speedometer2"></i>Thông tin tài khoản</a>
        <a class="nav-link" href="#"><i class="bi bi-tools"></i> Tra cứu bảo hành</a>
        <a class="nav-link" href="#"><i class="bi bi-people"></i> Giới thiệu bạn bè</a>
        <a class="nav-link" href="#"><i class="bi bi-geo-alt"></i> Tìm kiếm cửa hàng</a>

        <!-- Mục mới: Thêm sản phẩm -->
        <a class="nav-link" href="#add-to-cart-form" data-bs-toggle="collapse" aria-expanded="false">
          <i class="bi bi-bag-plus"></i> Thêm sản phẩm vào giỏ hàng
        </a>
      </nav>
    </div>

    <!-- Main content -->
    <div class="col-md-9 col-lg-10 p-4">
      <!-- Header user info -->
      <div class="card-custom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-3">
          <img src="{{ asset('images/RecommendProduct/anhprofile.png') }}" alt="Avatar" class="rounded-circle" width="70" height="70"/>
          <div>
            <h5 class="fw-bold mb-1">Phạm Đình Nam</h5>
            <span class="badge bg-danger me-1">S-MEM</span>
            <span class="badge bg-success">S-Student</span>
          </div>
        </div>
        <div class="text-center text-md-end">
          <h6 class="mb-1">Tổng số đơn đã mua: <strong>{{ $totalOrders }}</strong></h6>
          <h6 class="mb-0">Tổng tiền tích lũy:
            <strong class="text-danger">{{ number_format($totalPrice, 0, ',', '.') }}đ</strong>
          </h6>
        </div>
      </div>

      <!-- Quick access -->
      <div class="card-custom quick-access">
        <div class="item"><i class="bi bi-star-fill"></i><p class="mb-0 fw-semibold">Hạng thành viên</p></div>
        <div class="item"><i class="bi bi-ticket-perforated"></i><p class="mb-0 fw-semibold">Mã giảm giá</p></div>
        <div class="item"><i class="bi bi-bag-check-fill"></i><p class="mb-0 fw-semibold">Lịch sử mua hàng</p></div>
        <div class="item"><i class="bi bi-geo-alt-fill"></i><p class="mb-0 fw-semibold">Sổ địa chỉ</p></div>
      </div>

      <!-- Đơn hàng gần đây -->
      <div class="row">
        <div class="col-md-8">
          <div class="card-custom">
            <h6 class="fw-bold mb-3"><i class="bi bi-box-seam"></i> Đơn hàng gần đây</h6>
            @foreach($orders as $order)
              <div class="order-item">
                <strong>Đơn hàng #{{ $order->order_code }}</strong> - {{ $order->order_date }}
                <p class="mb-1">{{ $order->product_name }}</p>
                @if($order->status == 'Đã nhận hàng')
                  <span class="badge bg-success">{{ $order->status }}</span>
                @elseif($order->status == 'Đã xác nhận')
                  <span class="badge bg-warning text-dark">{{ $order->status }}</span>
                @else
                  <span class="badge bg-secondary">{{ $order->status }}</span>
                @endif
                <span class="float-end fw-bold text-danger">{{ number_format($order->price, 0, ',', '.') }}đ</span>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <!-- Form thêm sản phẩm vào giỏ hàng -->
      <div class="collapse mt-4" id="add-to-cart-form">
        <div class="card-custom">
          <h6 class="fw-bold mb-3 text-danger"><i class="bi bi-bag-plus"></i> Thêm sản phẩm vào giỏ hàng</h6>
          <form action="{{ route('cart.addFromProfile') }}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Tên sản phẩm</label>
              <input type="text" class="form-control" name="name" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Giá</label>
              <input type="number" class="form-control" name="price" required>
            </div>
            <div class="mb-3">
              <label class="form-label">Số lượng</label>
              <input type="number" class="form-control" name="quantity" value="1" min="1" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm vào giỏ hàng</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
