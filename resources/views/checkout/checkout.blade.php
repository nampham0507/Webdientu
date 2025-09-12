@
<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="vi">
  <head>
    <meta charset="UTF-8" />
    <title>Thanh toán</title>
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
    />
  </head>
  <body class="bg-light">
    <div class="container my-4">
      <div class="card shadow p-3 rounded">
        <h5 class="fw-bold border-bottom pb-2">Thông tin đơn hàng</h5>

        @if(empty($cartItems))
            <p>Giỏ hàng của bạn đang trống.</p>
        @else
            @foreach($cartItems as $item)
                <div class="d-flex align-items-center border-bottom pb-2 mb-3">
                    
                    <div class="flex-grow-1">
                        <h6 class="mb-1">{{ $item['name'] }}</h6>
                        <div>
                            <span class="text-danger fw-bold fs-6">{{ number_format($item['price'], 0, ',', '.') }}đ</span>
                            <span class="ms-3">Số lượng: {{ $item['quantity'] }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif

        
            <form action="{{ route('checkout.process') }}" method="POST">
            @csrf

            <h6 class="fw-bold">Thông tin khách hàng</h6>
            <div class="row mb-3">
                <div class="col-md-4 mb-2">
                    <label class="form-label">Họ và tên</label>
                    <input type="text" class="form-control" name="name" placeholder="Nhập họ tên" required/>
                </div>
                <div class="col-md-4 mb-2">
                    <label class="form-label">Số điện thoại</label>
                    <input type="text" class="form-control" name="phone" placeholder="Nhập số điện thoại" required/>
                </div>
                <div class="col-md-4 mb-2">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Nhập email" />
                </div>
            </div>

            <h6 class="fw-bold">Thông tin nhận hàng</h6>
            <div class="d-flex gap-3 mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_method" id="pickup" value="pickup" checked />
                    <label class="form-check-label" for="pickup">Nhận tại cửa hàng</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="delivery_method" id="delivery" value="delivery" />
                    <label class="form-check-label" for="delivery">Giao hàng tận nơi</label>
                </div>
            </div>

            <h6 class="fw-bold">Phương thức thanh toán</h6>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_method" id="cod" value="cod" checked />
                <label class="form-check-label" for="cod">Thanh toán khi nhận hàng (COD)</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_method" id="bank" value="bank" />
                <label class="form-check-label" for="bank">Chuyển khoản ngân hàng</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_method" id="card" value="card" />
                <label class="form-check-label" for="card">Thẻ tín dụng/Ghi nợ</label>
            </div>
            <div class="form-check mb-2">
                <input class="form-check-input" type="radio" name="payment_method" id="momo" value="momo" />
                <label class="form-check-label" for="momo">Ví điện tử MoMo</label>
            </div>

            <div class="d-flex justify-content-between align-items-center border-top pt-3">
                <h6 class="fw-bold mb-0">Tổng tiền tạm tính:</h6>
                <span class="text-danger fw-bold fs-5">{{ number_format($totalPrice, 0, ',', '.') }}đ</span>
            </div>

            <div class="mt-3">
                <button type="submit" class="btn btn-danger w-100 fw-bold">Đặt hàng</button>
            </div>
        </form>
      </div>
    </div>
  </body>
</html>