@extends('layouts.profile')

@section('title', 'Admin Dashboard - Smember')

@push('styles')
<style>
  body {
    background-color: #f8f9fa;
  }

  /* Sidebar */
  .sidebar {
    min-height: 100vh;
    background-color: #fff;
    border-right: 1px solid #e0e0e0;
    padding: 20px;
    border-radius: 0 15px 15px 0;
  }
  .sidebar h2 {
    color: #e63946;
    font-weight: 700;
    margin-bottom: 20px;
    font-size: 1.5rem;
  }
  .sidebar a {
    display: flex;
    align-items: center;
    gap: 10px;
    color: #555;
    padding: 10px 15px;
    margin-bottom: 5px;
    border-radius: 8px;
    text-decoration: none;
    transition: 0.3s;
  }
  .sidebar a:hover, .sidebar a.active {
    background-color: #ffeaea;
    color: #e63946;
    font-weight: 600;
  }

  /* Card thống kê */
  .card-custom {
    background: #fff;
    border-radius: 15px;
    padding: 20px;
    box-shadow: 0 4px 12px rgba(0,0,0,0.06);
    margin-bottom: 20px;
  }
  .card-custom h5 {
    color: #e63946;
    font-weight: 600;
  }

  /* Bảng đơn hàng */
  table th, table td {
    vertical-align: middle !important;
  }

  /* Nút */
  .btn-sm {
    padding: 4px 10px;
    font-size: 0.875rem;
  }

  /* Modal form */
  .modal .form-control {
    margin-bottom: 10px;
  }
</style>
@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar">
      <h2>SDevices Admin</h2>
      <nav class="nav flex-column">
        <a href="#" class="active"><i class="bi bi-speedometer2"></i>Tổng quan</a>
        
        
        <a href="#"><i class="bi bi-people"></i> Khách hàng</a>
        <a href="#"><i class="bi bi-gear-fill"></i> Cài đặt</a>
      </nav>
    </div>

    <!-- Main content -->
    <div class="col-md-9 col-lg-10 p-4">
      <!-- Thống kê tổng quan -->
      <div class="row mb-4">
        <div class="col-md-4">
          <div class="card-custom text-center">
            <h5>Tổng số đơn hàng</h5>
            <h3>{{ $totalOrders }}</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-custom text-center">
            <h5>Tổng tiền tích lũy</h5>
            <h3 class="text-danger">{{ number_format($totalPrice,0,',','.') }}đ</h3>
          </div>
        </div>
        <div class="col-md-4">
          <div class="card-custom text-center">
            <h5>Đơn hàng mới nhất</h5>
            <h3>{{ $orders->first() ? $orders->first()->order_code : '-' }}</h3>
          </div>
        </div>
      </div>

      <!-- Thêm đơn hàng nhanh -->
      <div class="card-custom mb-4">
        <h5>Thêm đơn hàng mới</h5>
        <form action="{{ route('admin.orders.store') }}" method="POST" class="d-flex flex-wrap gap-2">
          @csrf
          <input type="text" name="order_code" class="form-control" placeholder="Mã đơn" required>
          <input type="text" name="product_name" class="form-control" placeholder="Tên sản phẩm" required>
          <input type="number" name="price" class="form-control" placeholder="Giá" required>
          <select name="status" class="form-control">
            <option value="Chưa xác nhận">Chưa xác nhận</option>
            <option value="Đã xác nhận">Đã xác nhận</option>
            <option value="Đã nhận hàng">Đã nhận hàng</option>
          </select>
          <button type="submit" class="btn btn-sm btn-success">Thêm</button>
        </form>
      </div>

      <!-- Bảng đơn hàng -->
      <div class="card-custom">
        <h5>Danh sách đơn hàng</h5>
        <table class="table table-bordered table-striped mt-3">
          <thead>
            <tr>
              <th>ID</th>
              <th>Mã đơn</th>
              <th>Sản phẩm</th>
              <th>Giá</th>
              <th>Trạng thái</th>
              <th>Thao tác</th>
            </tr>
          </thead>
          <tbody>
            @foreach($orders as $order)
            <tr>
              <td>{{ $order->id }}</td>
              <td>{{ $order->order_code }}</td>
              <td>{{ $order->product_name }}</td>
              <td>{{ number_format($order->price,0,',','.') }}đ</td>
              <td>{{ $order->status }}</td>
              <td class="d-flex gap-1">
                <!-- Xóa -->
                <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                </form>
                <!-- Sửa -->
                <button class="btn btn-sm btn-primary" onclick="editOrder({{ $order->id }}, '{{ $order->order_code }}', '{{ $order->product_name }}', {{ $order->price }}, '{{ $order->status }}')">Sửa</button>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>

      <!-- Modal sửa đơn hàng -->
      <div class="modal fade" id="editModal" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <form id="editForm" method="POST">
              @csrf
              @method('PUT')
              <div class="modal-header">
                <h5 class="modal-title">Sửa đơn hàng</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
              </div>
              <div class="modal-body">
                <input type="text" name="order_code" id="edit_order_code" class="form-control" placeholder="Mã đơn" required>
                <input type="text" name="product_name" id="edit_product_name" class="form-control" placeholder="Tên sản phẩm" required>
                <input type="number" name="price" id="edit_price" class="form-control" placeholder="Giá" required>
                <select name="status" id="edit_status" class="form-control">
                  <option value="Chưa xác nhận">Chưa xác nhận</option>
                  <option value="Đã xác nhận">Đã xác nhận</option>
                  <option value="Đã nhận hàng">Đã nhận hàng</option>
                </select>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                <button type="submit" class="btn btn-primary">Cập nhật</button>
              </div>
            </form>
          </div>
        </div>
      </div>

    </div>
  </div>
</div>
@endsection

@push('scripts')
<script>
function editOrder(id, order_code, product_name, price, status) {
    const form = document.getElementById('editForm');
    form.action = '/admin/orders/' + id;
    document.getElementById('edit_order_code').value = order_code;
    document.getElementById('edit_product_name').value = product_name;
    document.getElementById('edit_price').value = price;
    document.getElementById('edit_status').value = status;
    new bootstrap.Modal(document.getElementById('editModal')).show();
}
</script>
@endpush
