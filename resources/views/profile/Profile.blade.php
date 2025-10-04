@extends('layouts.profile')
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
  <!-- Top Header -->
  <div class="top-header">
    <div class="container">
      <div class="d-flex justify-content-between align-items-center">
        <div class="brand-logo">SDEVICES</div>
        <div class="header-nav">
          <a href="#" class="active">Trang chủ</a>
          <a href="#">Sản phẩm</a>
          <a href="#">Tin tức</a>
          <a href="#">Liên hệ</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Main Container -->
  <div class="main-container">
    <!-- Profile Banner -->
    <div class="profile-banner">
      <div class="profile-content">
        <div class="avatar-section">
          <img src="{{ asset('images/RecommendProduct/anhprofile.png') }}" alt="Avatar" class="avatar-large">
          <div class="user-info">
            <h1>Phạm Đình Nam</h1>
            <span class="vip-badge">S-MEMBER</span>
          </div>
        </div>
        <div class="stats-row">
          <div class="stat-box">
            <div class="stat-label">Tổng đơn hàng</div>
            <div class="stat-number">{{ $totalProducts }}</div>
          </div>
          <div class="stat-box">
            <div class="stat-label">Tổng tích lũy</div>
            <div class="stat-number">{{ number_format($totalPrice, 0, ',', '.') }}đ</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Navigation Tabs -->
    <div class="nav-tabs-custom">
      <div class="tab-item active">
        <i class="bi bi-house-door-fill"></i>
        <span>Tổng quan</span>
      </div>
      <div class="tab-item">
        <i class="bi bi-tools"></i>
        <span>Bảo hành</span>
      </div>
      <div class="tab-item">
        <i class="bi bi-people-fill"></i>
        <span>Giới thiệu</span>
      </div>
      <div class="tab-item">
        <i class="bi bi-geo-alt-fill"></i>
        <span>Cửa hàng</span>
      </div>
      <div class="tab-item" data-bs-toggle="collapse" data-bs-target="#add-to-cart-form">
        <i class="bi bi-bag-plus-fill"></i>
        <span>Thêm sản phẩm</span>
      </div>
    </div>

    <!-- Content Grid -->
    <div class="content-grid">
      <!-- Order Timeline -->
      <div class="timeline-section">
        <div class="timeline-title">
          <i class="bi bi-clock-history"></i>
          Lịch sử đơn hàng
        </div>
        @forelse(($orders ?? []) as $order)
          <div class="timeline-item">
            <div class="order-meta">
              <span class="order-number">#{{ $order->order_code }}</span>
              <span class="order-time">{{ $order->order_date }}</span>
            </div>
            <div class="order-desc">{{ $order->product_name }}</div>
            <div class="order-bottom">
              @if($order->status == 'Đã nhận hàng')
                <span class="status-pill status-success">{{ $order->status }}</span>
              @elseif($order->status == 'Đã xác nhận')
                <span class="status-pill status-warning">{{ $order->status }}</span>
              @else
                <span class="status-pill status-info">{{ $order->status }}</span>
              @endif
              <span class="price-large">{{ number_format($order->price, 0, ',', '.') }}đ</span>
            </div>
          </div>
        @empty
        <p class="text-muted">Chưa có đơn hàng nào.</p>
      @endforelse
      </div>

      <!-- Sidebar -->
      <div>
        <div class="sidebar-widget">
          <div class="widget-title">
            <i class="bi bi-lightning-fill"></i>
            Thao tác nhanh
          </div>
          <div class="action-list">
            <a href="#" class="action-btn">
              <i class="bi bi-star-fill"></i>
              <span>Hạng thành viên</span>
            </a>
            <a href="#" class="action-btn">
              <i class="bi bi-ticket-perforated-fill"></i>
              <span>Mã giảm giá</span>
            </a>
            <a href="#" class="action-btn">
              <i class="bi bi-bag-check-fill"></i>
              <span>Lịch sử mua hàng</span>
            </a>
            <a href="#" class="action-btn">
              <i class="bi bi-pin-map-fill"></i>
              <span>Sổ địa chỉ</span>
            </a>
          </div>
        </div>
      </div>
    </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>