@extends('layouts.profile')

@section('title', 'Đặt hàng thành công')

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body text-center p-5">
                    <div class="mb-4">
                        <i class="bi bi-check-circle-fill text-success" style="font-size: 4rem;"></i>
                    </div>
                    <h2 class="text-success mb-3">Đặt hàng thành công!</h2>
                    <p class="text-muted">Cảm ơn bạn đã mua hàng tại SDevices</p>

                    <hr class="my-4">

                    <div class="text-start">
                        <h5 class="mb-3">Thông tin đơn hàng</h5>
                        
                        <div class="row mb-2">
                            <div class="col-5"><strong>Mã đơn hàng chính:</strong></div>
                            <div class="col-7">{{ $orderInfo['main_order_code'] }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5"><strong>Khách hàng:</strong></div>
                            <div class="col-7">{{ $orderInfo['customer_name'] }}</div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5"><strong>Số điện thoại:</strong></div>
                            <div class="col-7">{{ $orderInfo['customer_phone'] }}</div>
                        </div>

                        @if($orderInfo['customer_email'])
                        <div class="row mb-2">
                            <div class="col-5"><strong>Email:</strong></div>
                            <div class="col-7">{{ $orderInfo['customer_email'] }}</div>
                        </div>
                        @endif

                        <div class="row mb-2">
                            <div class="col-5"><strong>Phương thức giao hàng:</strong></div>
                            <div class="col-7">
                                @if($orderInfo['delivery_method'] == 'pickup')
                                    Nhận tại cửa hàng
                                @else
                                    Giao hàng tận nơi
                                @endif
                            </div>
                        </div>

                        <div class="row mb-2">
                            <div class="col-5"><strong>Phương thức thanh toán:</strong></div>
                            <div class="col-7">
                                @if($orderInfo['payment_method'] == 'cod')
                                    Thanh toán khi nhận hàng
                                @elseif($orderInfo['payment_method'] == 'bank')
                                    Chuyển khoản ngân hàng
                                @elseif($orderInfo['payment_method'] == 'card')
                                    Thẻ tín dụng
                                @else
                                    MoMo
                                @endif
                            </div>
                        </div>

                        <hr class="my-3">

                        <h5 class="mb-3">Danh sách sản phẩm đã đặt</h5>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="table-light">
                                    <tr>
                                        <th>Mã đơn</th>
                                        <th>Sản phẩm</th>
                                        <th class="text-center">Số lượng</th>
                                        <th class="text-end">Giá</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orderInfo['orders'] as $order)
                                    <tr>
                                        <td><small>{{ $order['order_code'] }}</small></td>
                                        <td>{{ $order['product_name'] }}</td>
                                        <td class="text-center">{{ $order['quantity'] }}</td>
                                        <td class="text-end">{{ number_format($order['price'], 0, ',', '.') }}đ</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="3" class="text-end"><strong>Tổng cộng:</strong></td>
                                        <td class="text-end"><strong class="text-danger">{{ number_format($orderInfo['total_amount'], 0, ',', '.') }}đ</strong></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>

                        <div class="alert alert-info mt-3">
                            <i class="bi bi-info-circle"></i> 
                            Chúng tôi đã tạo <strong>{{ count($orderInfo['orders']) }} đơn hàng riêng</strong> cho từng sản phẩm để dễ dàng quản lý và giao hàng.
                        </div>
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('profile') }}" class="btn btn-primary me-2">
                            <i class="bi bi-person-circle"></i> Xem đơn hàng của tôi
                        </a>
                        <a href="{{ route('homepage') }}" class="btn btn-outline-secondary">
                            <i class="bi bi-house-door"></i> Về trang chủ
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection