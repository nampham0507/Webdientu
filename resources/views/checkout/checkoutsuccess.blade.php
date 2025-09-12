<meta name="csrf-token" content="{{ csrf_token() }}">
<!DOCTYPE html>
<html lang="vi">
<head>
  <meta charset="UTF-8">
  <title>Đặt hàng thành công</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

<div class="container my-5">
  <div class="card shadow p-4 text-center">
    <div class="mb-3">
      <img src="https://cdn-icons-png.flaticon.com/512/845/845646.png" 
           alt="success" width="100">
    </div>
    <h3 class="text-success fw-bold">Đặt hàng thành công!</h3>
    <p class="text-muted">Cảm ơn bạn đã mua hàng tại <strong>SDEVICES</strong>.<br>
      Chúng tôi sẽ liên hệ với bạn trong thời gian sớm nhất.</p>

    <hr>

    <!-- Order Info -->
    @if(isset($orderInfo))
    <div class="text-start mx-auto" style="max-width: 500px;">
      <h6 class="fw-bold">Thông tin đơn hàng</h6>
      <ul class="list-group mb-3">
        <li class="list-group-item d-flex justify-content-between">
          <span>Mã đơn hàng:</span>
          <strong>{{ $orderInfo['order_code'] }}</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Khách hàng:</span>
          <strong>{{ $orderInfo['customer_name'] }}</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Sản phẩm:</span>
          <strong>{{ implode(', ', $orderInfo['products']) }}</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Tổng tiền:</span>
          <strong class="text-danger">{{ number_format($orderInfo['total_amount'], 0, ',', '.') }}đ</strong>
        </li>
        <li class="list-group-item d-flex justify-content-between">
          <span>Phương thức thanh toán:</span>
          <strong>
            @switch($orderInfo['payment_method'])
              @case('cod') Thanh toán khi nhận hàng @break
              @case('bank') Chuyển khoản ngân hàng @break
              @case('card') Thẻ tín dụng @break
              @case('momo') Ví MoMo @break
            @endswitch
          </strong>
        </li>
      </ul>
    </div>
    @endif

    <!-- Buttons -->
    <a href="{{ route('homepage') }}" class="btn btn-primary mt-3">Về trang chủ</a>
    <a href="{{ route('cart.index') }}" class="btn btn-outline-secondary mt-3 ms-2">Tiếp tục mua hàng</a>
  </div>
</div>

</body>
</html>