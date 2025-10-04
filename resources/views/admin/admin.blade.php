@extends('layouts.profile')

@section('title', 'Admin Dashboard - Smember')

@push('styles')
<style>
  body {
    background-color: #f8f9fa;
  }

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

  table th, table td {
    vertical-align: middle !important;
  }

  .btn-sm {
    padding: 4px 10px;
    font-size: 0.875rem;
  }

  .modal .form-control, .modal .form-select {
    margin-bottom: 10px;
  }

  .form-grid {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
  }

  .form-full {
    grid-column: 1 / -1;
  }

  .product-img-preview {
    max-width: 100px;
    max-height: 100px;
    object-fit: cover;
    border-radius: 8px;
  }
  
  .action-cell {
    background-color: #f0f0f0;   
    text-align: center;          
    vertical-align: middle;      
    padding: 10px;               
  }

  .action-cell form {
    display: inline-block;
    margin: 0 2px;
  }
</style>
@endpush

@section('content')
<div class="container-fluid">
  <div class="row">
    <!-- Sidebar -->
    <div class="col-md-3 col-lg-2 sidebar">
      <h2>SDevices Admin</h2>
      <div class="text-center mb-3">
        <small class="text-muted">Xin chào, {{ Auth::user()->name }}</small>
      </div>
      <nav class="nav flex-column">
        <a href="{{ route('admin.products.index') }}" class="active"><i class="bi bi-speedometer2"></i>Tổng quan</a>
        <a href="{{ route('admin.products.index') }}"><i class="bi bi-box-seam"></i> Sản phẩm</a>
        <a href="{{ route('admin.orders.index') }}"><i class="bi bi-receipt"></i> Đơn hàng</a>
        <a href="#"><i class="bi bi-people"></i> Khách hàng</a>
        <a href="#"><i class="bi bi-gear-fill"></i> Cài đặt</a>
        <hr>
        <a href="{{ route('admin.logout') }}" class="text-danger">
          <i class="bi bi-box-arrow-right"></i> Đăng xuất
        </a>
      </nav>
    </div>

    <!-- Main content -->
    <div class="col-md-9 col-lg-10 p-4">
      <!-- Hiển thị thông báo -->
      @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
          {{ session('success') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
          {{ session('error') }}
          <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
        </div>
      @endif

      <!-- Thống kê tổng quan -->
      <div class="row mb-4">
        <div class="col-md-3">
          <div class="card-custom text-center">
            <h5>Tổng sản phẩm</h5>
            <h3>{{ $totalProducts ?? 0 }}</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-custom text-center">
            <h5>Sản phẩm nổi bật</h5>
            <h3>{{ $featuredProducts ?? 0 }}</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-custom text-center">
            <h5>Tổng đơn hàng</h5>
            <h3>{{ $totalOrders ?? 0 }}</h3>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card-custom text-center">
            <h5>Tổng tiền tích lũy</h5>
            <h3 class="text-danger">{{ number_format($totalPrice ?? 0,0,',','.') }}đ</h3>
          </div>
        </div>
      </div>

      <!-- Quản lý sản phẩm -->
      <div class="card-custom mb-4">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Quản lý sản phẩm</h5>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addProductModal">
            <i class="bi bi-plus-circle"></i> Thêm sản phẩm mới
          </button>
        </div>

        <!-- Bảng sản phẩm -->
        <div class="table-responsive">
          <table class="table table-bordered table-striped mt-3">
            <thead>
              <tr>
                <th>ID</th>
                <th>Ảnh</th>
                <th>Tên sản phẩm</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Thương hiệu</th>
                <th>Nổi bật</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @forelse($products ?? [] as $product)
              <tr>
                <td>{{ $product->ProductID }}</td>
                <td>
                  @if($product->ImageURL)
                    <img src="{{ asset($product->ImageURL) }}" class="product-img-preview" alt="{{ $product->ProductName }}">
                  @else
                    <span class="text-muted">Chưa có ảnh</span>
                  @endif
                </td>
                <td>{{ $product->ProductName }}</td>
                <td>{{ number_format($product->Price,0,',','.') }}đ</td>
                <td>
                  @if($product->Discount > 0)
                    <span class="badge bg-danger">-{{ $product->Discount }}%</span>
                  @else
                    <span class="text-muted">-</span>
                  @endif
                </td>
                <td>{{ $product->Brand ?? '-' }}</td>
                <td>
                  @if($product->IsFeatured)
                    <span class="badge bg-success">Nổi bật</span>
                  @else
                    <span class="badge bg-secondary">Thường</span>
                  @endif
                </td>
                <td class="action-cell">
                  <button class="btn btn-sm btn-primary" onclick='editProduct(@json($product))'>
                    <i class="bi bi-pencil"></i> Sửa
                  </button>
                  <form action="{{ route('admin.products.destroy', $product->ProductID) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Xác nhận xóa sản phẩm này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i> Xóa
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="8" class="text-center">Chưa có sản phẩm nào</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

      <!-- Quản lý đơn hàng -->
      <div class="card-custom">
        <div class="d-flex justify-content-between align-items-center mb-3">
          <h5 class="mb-0">Danh sách đơn hàng</h5>
          <button class="btn btn-success" data-bs-toggle="modal" data-bs-target="#addOrderModal">
            <i class="bi bi-plus-circle"></i> Thêm đơn hàng
          </button>
        </div>

        <div class="table-responsive">
          <table class="table table-bordered table-striped mt-3">
            <thead>
              <tr>
                <th>ID</th>
                <th>Mã đơn</th>
                <th>Sản phẩm</th>
                <th>Giá</th>
                <th>Trạng thái</th>
                <th>Ngày đặt</th>
                <th>Thao tác</th>
              </tr>
            </thead>
            <tbody>
              @forelse($orders ?? [] as $order)
              <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->order_code }}</td>
                <td>{{ $order->product_name }}</td>
                <td>{{ number_format($order->price,0,',','.') }}đ</td>
                <td>
                  @if($order->status == 'Hoàn thành')
                    <span class="badge bg-success">{{ $order->status }}</span>
                  @elseif($order->status == 'Đã hủy')
                    <span class="badge bg-danger">{{ $order->status }}</span>
                  @elseif($order->status == 'Đang giao')
                    <span class="badge bg-info">{{ $order->status }}</span>
                  @else
                    <span class="badge bg-warning">{{ $order->status }}</span>
                  @endif
                </td>
                <td>{{ $order->order_date ? date('d/m/Y', strtotime($order->order_date)) : '-' }}</td>
                <td class="action-cell">
                  <button class="btn btn-sm btn-primary" onclick='editOrder(@json($order))'>
                    <i class="bi bi-pencil"></i> Sửa
                  </button>
                  <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" style="display: inline-block;" onsubmit="return confirm('Xác nhận xóa đơn hàng này?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">
                      <i class="bi bi-trash"></i> Xóa
                    </button>
                  </form>
                </td>
              </tr>
              @empty
              <tr>
                <td colspan="7" class="text-center">Chưa có đơn hàng nào</td>
              </tr>
              @endforelse
            </tbody>
          </table>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- ==================== MODAL THÊM SẢN PHẨM ==================== -->
<div class="modal fade" id="addProductModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Thêm sản phẩm mới</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="form-grid">
            <div class="form-full">
              <label class="form-label">Tên sản phẩm *</label>
              <input type="text" name="ProductName" class="form-control" required placeholder="VD: iPhone 16 Pro Max 256GB">
            </div>

            <div>
              <label class="form-label">Giá bán (VNĐ) *</label>
              <input type="number" name="Price" class="form-control" required placeholder="29741000">
            </div>

            <div>
              <label class="form-label">Giá gốc (VNĐ)</label>
              <input type="number" name="OriginalPrice" class="form-control" placeholder="34990000">
            </div>

            <div>
              <label class="form-label">Thương hiệu</label>
              <select name="Brand" class="form-select">
                <option value="">-- Chọn thương hiệu --</option>
                <option value="Apple">Apple</option>
                <option value="Samsung">Samsung</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="Oppo">Oppo</option>
                <option value="Vivo">Vivo</option>
                <option value="Asus">Asus</option>
                <option value="Lenovo">Lenovo</option>
                <option value="Dell">Dell</option>
                <option value="HP">HP</option>
                <option value="Sony">Sony</option>
              </select>
            </div>

            <div>
              <label class="form-label">Danh mục</label>
              <select name="Category" class="form-select">
                <option value="">-- Chọn danh mục --</option>
                <option value="Điện thoại">Điện thoại</option>
                <option value="Laptop">Laptop</option>
                <option value="Tablet">Tablet</option>
                <option value="Đồng hồ">Đồng hồ</option>
                <option value="Phụ kiện">Phụ kiện</option>
                <option value="Tivi">Tivi</option>
                <option value="Âm thanh">Âm thanh</option>
              </select>
            </div>

            <div>
              <label class="form-label">Số lượng tồn kho</label>
              <input type="number" name="Stock" class="form-control" placeholder="100" value="0">
            </div>

            <div>
              <label class="form-label">Giảm giá (%)</label>
              <input type="number" name="Discount" class="form-control" min="0" max="100" placeholder="15" value="0">
            </div>

            <div>
              <label class="form-label">Ảnh sản phẩm</label>
              <input type="file" name="image" class="form-control" accept="image/*">
              <small class="text-muted">Hoặc nhập URL ảnh bên dưới</small>
            </div>

            <div>
              <label class="form-label">URL ảnh</label>
              <input type="text" name="ImageURL" class="form-control" placeholder="images/products/iphone16.webp">
            </div>

            <div class="form-full">
              <label class="form-label">Hiển thị nổi bật</label>
              <div class="form-check">
                <input type="checkbox" name="IsFeatured" value="1" class="form-check-input" id="isFeatured">
                <label class="form-check-label" for="isFeatured">
                  Hiển thị ở trang chủ (Sản phẩm nổi bật)
                </label>
              </div>
            </div>

            <div class="form-full">
              <label class="form-label">Mô tả sản phẩm</label>
              <textarea name="Description" class="form-control" rows="4" placeholder="Nhập mô tả chi tiết về sản phẩm..."></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-success">Thêm sản phẩm</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ==================== MODAL SỬA SẢN PHẨM ==================== -->
<div class="modal fade" id="editProductModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <form id="editProductForm" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Sửa sản phẩm</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="form-grid">
            <div class="form-full">
              <label class="form-label">Tên sản phẩm *</label>
              <input type="text" name="ProductName" id="edit_ProductName" class="form-control" required>
            </div>

            <div>
              <label class="form-label">Giá bán (VNĐ) *</label>
              <input type="number" name="Price" id="edit_Price" class="form-control" required>
            </div>

            <div>
              <label class="form-label">Giá gốc (VNĐ)</label>
              <input type="number" name="OriginalPrice" id="edit_OriginalPrice" class="form-control">
            </div>

            <div>
              <label class="form-label">Thương hiệu</label>
              <select name="Brand" id="edit_Brand" class="form-select">
                <option value="">-- Chọn thương hiệu --</option>
                <option value="Apple">Apple</option>
                <option value="Samsung">Samsung</option>
                <option value="Xiaomi">Xiaomi</option>
                <option value="Oppo">Oppo</option>
                <option value="Vivo">Vivo</option>
                <option value="Asus">Asus</option>
                <option value="Lenovo">Lenovo</option>
              </select>
            </div>

            <div>
              <label class="form-label">Danh mục</label>
              <select name="Category" id="edit_Category" class="form-select">
                <option value="">-- Chọn danh mục --</option>
                <option value="Điện thoại">Điện thoại</option>
                <option value="Laptop">Laptop</option>
                <option value="Tablet">Tablet</option>
                <option value="Đồng hồ">Đồng hồ</option>
                <option value="Phụ kiện">Phụ kiện</option>
                <option value="Tivi">Tivi</option>
              </select>
            </div>

            <div>
              <label class="form-label">Số lượng tồn kho</label>
              <input type="number" name="Stock" id="edit_Stock" class="form-control">
            </div>

            <div>
              <label class="form-label">Giảm giá (%)</label>
              <input type="number" name="Discount" id="edit_Discount" class="form-control" min="0" max="100">
            </div>

            <div>
              <label class="form-label">Ảnh sản phẩm mới</label>
              <input type="file" name="image" class="form-control" accept="image/*">
            </div>

            <div>
              <label class="form-label">URL ảnh</label>
              <input type="text" name="ImageURL" id="edit_ImageURL" class="form-control">
            </div>

            <div class="form-full">
              <label class="form-label">Hiển thị nổi bật</label>
              <div class="form-check">
                <input type="checkbox" name="IsFeatured" value="1" class="form-check-input" id="edit_IsFeatured">
                <label class="form-check-label" for="edit_IsFeatured">
                  Hiển thị ở trang chủ (Sản phẩm nổi bật)
                </label>
              </div>
            </div>

            <div class="form-full">
              <label class="form-label">Mô tả sản phẩm</label>
              <textarea name="Description" id="edit_Description" class="form-control" rows="4"></textarea>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ==================== MODAL THÊM ĐƠN HÀNG ==================== -->
<div class="modal fade" id="addOrderModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('admin.orders.store') }}" method="POST">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title">Thêm đơn hàng mới</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Mã đơn hàng *</label>
            <input type="text" name="order_code" class="form-control" required placeholder="ORD20250104001">
          </div>
          <div class="mb-3">
            <label class="form-label">Tên sản phẩm *</label>
            <input type="text" name="product_name" class="form-control" required placeholder="iPhone 16 Pro Max">
          </div>
          <div class="mb-3">
            <label class="form-label">Giá (VNĐ) *</label>
            <input type="number" name="price" class="form-control" required placeholder="29741000">
          </div>
          <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" class="form-select">
              <option value="Chờ xác nhận">Chờ xác nhận</option>
              <option value="Đang xử lý">Đang xử lý</option>
              <option value="Đang giao">Đang giao</option>
              <option value="Hoàn thành">Hoàn thành</option>
              <option value="Đã hủy">Đã hủy</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-success">Thêm đơn hàng</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ==================== MODAL SỬA ĐƠN HÀNG ==================== -->
<div class="modal fade" id="editOrderModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <form id="editOrderForm" method="POST">
        @csrf
        @method('PUT')
        <div class="modal-header">
          <h5 class="modal-title">Sửa đơn hàng</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label">Mã đơn hàng *</label>
            <input type="text" name="order_code" id="edit_order_code" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Tên sản phẩm *</label>
            <input type="text" name="product_name" id="edit_product_name" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Giá (VNĐ) *</label>
            <input type="number" name="price" id="edit_order_price" class="form-control" required>
          </div>
          <div class="mb-3">
            <label class="form-label">Trạng thái</label>
            <select name="status" id="edit_order_status" class="form-select">
              <option value="Chờ xác nhận">Chờ xác nhận</option>
              <option value="Đang xử lý">Đang xử lý</option>
              <option value="Đang giao">Đang giao</option>
              <option value="Hoàn thành">Hoàn thành</option>
              <option value="Đã hủy">Đã hủy</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
          <button type="submit" class="btn btn-primary">Cập nhật</button>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection

@push('scripts')
<script>
// Hàm sửa sản phẩm
function editProduct(product) {
    const form = document.getElementById('editProductForm');
    form.action = '/admin/products/' + product.ProductID;
    
    document.getElementById('edit_ProductName').value = product.ProductName || '';
    document.getElementById('edit_Price').value = product.Price || '';
    document.getElementById('edit_OriginalPrice').value = product.OriginalPrice || '';
    document.getElementById('edit_Brand').value = product.Brand || '';
    document.getElementById('edit_Category').value = product.Category || '';
    document.getElementById('edit_Stock').value = product.Stock || 0;
    document.getElementById('edit_Discount').value = product.Discount || 0;
    document.getElementById('edit_ImageURL').value = product.ImageURL || '';
    document.getElementById('edit_Description').value = product.Description || '';
    document.getElementById('edit_IsFeatured').checked = product.IsFeatured == 1;
    
    new bootstrap.Modal(document.getElementById('editProductModal')).show();
}

// Hàm sửa đơn hàng
function editOrder(order) {
    const form = document.getElementById('editOrderForm');
    form.action = '/admin/orders/' + order.id;
    
    document.getElementById('edit_order_code').value = order.order_code || '';
    document.getElementById('edit_product_name').value = order.product_name || '';
    document.getElementById('edit_order_price').value = order.price || '';
    document.getElementById('edit_order_status').value = order.status || 'Chờ xác nhận';
    
    new bootstrap.Modal(document.getElementById('editOrderModal')).show();
}
</script>
@endpush