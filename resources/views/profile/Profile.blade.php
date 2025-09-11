@extends('layouts.app')

@section('title', 'Trang cá nhân - Sdevices')

@push('styles')
<style>
  .sidebar {
    min-height: 100vh;
    background-color: #fff;
    border-right: 1px solid #e0e0e0;
    box-shadow: 2px 0 6px rgba(0, 0, 0, 0.05);
    border-radius: 0 20px 20px 0; /* bo tròn góc */
  }
  .sidebar .nav-link {
    color: #555;
    padding: 12px 15px;
    border-bottom: 1px solid #eee;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    gap: 8px;
  }
  .sidebar .nav-link:last-child {
    border-bottom: none;
  }
  .sidebar .nav-link:hover {
    background-color: #f1f1f1;
    color: #e63946;
  }
  .sidebar .nav-link.active {
    background-color: #ffeaea;
    color: #e63946;
    font-weight: 600;
  }

  .card-custom {
    border: none;
    border-radius: 20px;
    padding: 20px;
    background: #fff;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.06);
    margin-bottom: 20px;
  }
  .order-item {
    border-bottom: 1px solid #eee;
    padding: 12px 0;
  }
  .order-item:last-child {
    border-bottom: none;
  }

  .quick-access {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 15px;
  }
  .quick-access .item {
    background: #fef2f2;
    border-radius: 16px;
    padding: 20px;
    text-align: center;
    transition: 0.3s;
    cursor: pointer;
  }
  .quick-access .item:hover {
    background: #ffeaea;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    transform: translateY(-2px);
  }
  .quick-access i {
    font-size: 24px;
    color: #e63946;
    margin-bottom: 8px;
  }
</style>
@endpush

@section('content')
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
      </nav>
    </div>

    <!-- Main content -->
    <div class="col-md-9 col-lg-10 p-4">
      <!-- Header user info -->
      <div class="card-custom d-flex flex-column flex-md-row justify-content-between align-items-center gap-3">
        <div class="d-flex align-items-center gap-3">
          <!-- Avatar -->
          <img
            src="{{ asset('images/RecommendProduct/anhprofile.png') }}"
            alt="Avatar"
            class="rounded-circle"
            width="70"
            height="70"
          />
          <div>
            <h5 class="fw-bold mb-1">Phạm Đình Nam</h5>
            <span class="badge bg-danger me-1">S-MEM</span>
            <span class="badge bg-success">S-Student</span>
           
          </div>
        </div>
        <div class="text-center text-md-end">
  <h6 class="mb-1">Tổng số đơn đã mua: <strong>{{ $totalOrders }}</strong></h6>
  <h6 class="mb-0">
    Tổng tiền tích lũy:
    <strong class="text-danger">{{ number_format($totalPrice, 0, ',', '.') }}đ</strong>
  </h6>
</div>

      </div>

      <!-- Quick access -->
      <div class="card-custom quick-access">
        <div class="item">
          <i class="bi bi-star-fill"></i>
          <p class="mb-0 fw-semibold">Hạng thành viên</p>
        </div>
        <div class="item">
          <i class="bi bi-ticket-perforated"></i>
          <p class="mb-0 fw-semibold">Mã giảm giá</p>
        </div>
        <div class="item">
          <i class="bi bi-bag-check-fill"></i>
          <p class="mb-0 fw-semibold">Lịch sử mua hàng</p>
        </div>
        <div class="item">
          <i class="bi bi-geo-alt-fill"></i>
          <p class="mb-0 fw-semibold">Sổ địa chỉ</p>
        </div>
      </div>

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
      </div>
    </div>
  </div>
</div>
@endsection
