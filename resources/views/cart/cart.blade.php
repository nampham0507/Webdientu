@extends('layouts.app')

@section('title', 'Giỏ hàng')

@push('styles')
<style>
    .quantity-input::-webkit-outer-spin-button,
    .quantity-input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }
    .quantity-input[type=number] {
        -moz-appearance: textfield;
    }
</style>
@endpush

@section('content')
<main class="bg-light min-vh-100 pb-5">
    <div class="container mt-4">
        <!-- Thanh tiêu đề giỏ hàng -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 class="fw-bold mb-0 text-danger ">🛒 Giỏ hàng ({{ $cartItems->count() }})</h4>
            @if($cartItems->count() > 0)
            <div class="form-check d-flex align-items-center">
                <input class="form-check-input mt-0" type="checkbox" id="select-all"/>
                <label class="form-check-label ms-2" for="select-all">Chọn tất cả</label>
            </div>
            @endif
        </div>

        <!-- Nội dung giỏ hàng -->
        @if($cartItems->count() > 0)
            <div class="bg-white rounded-4 shadow-sm p-3">
                @foreach($cartItems as $item)
                <div class="d-flex align-items-start border-bottom py-3">
                    <!-- Checkbox chọn sản phẩm -->
                    <div class="form-check me-3 mt-1">
                        <input class="form-check-input item-checkbox" type="checkbox" 
                               data-price="{{ $item->product ? $item->product->Price : 0 }}" 
                               data-original="{{ $item->product ? ($item->product->OriginalPrice ?? $item->product->Price) : 0 }}"/>
                    </div>

                    <!-- Thông tin sản phẩm -->
                    <div class="flex-grow-1 ms-0">
                        <div class="d-flex justify-content-between align-items-start">
                            <div>
                                <h6 class="fw-semibold text-dark mb-1">
                                    {{ $item->product->ProductName ?? 'Tên sản phẩm' }} <br>
                                    {{ $item->product->Description ?? '' }}
                                </h6>
                                <span class="text-danger fw-bold me-2">
                                    {{ number_format($item->product->Price ?? 0, 0, ',', '.') }}đ
                                </span>
                                @if($item->product && $item->product->OriginalPrice && $item->product->OriginalPrice > $item->product->Price)
                                <span class="text-muted text-decoration-line-through">
                                    {{ number_format($item->product->OriginalPrice, 0, ',', '.') }}đ
                                </span>
                                @endif
                            </div>

                            <!-- Nút xóa sản phẩm -->
                            <form action="{{ route('cart.remove', $item->CartItemID) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger ms-2"
                                        onclick="return confirm('Bạn có chắc muốn xóa sản phẩm này?')">
                                    <i class="fa-solid fa-trash-can"></i> Xóa
                                </button>
                            </form>
                        </div>

                        <!-- Số lượng -->
                        <div class="d-flex justify-content-between align-items-center mt-2">
                            <div class="d-flex align-items-center">
                                <button class="btn btn-outline-secondary quantity-btn" data-action="decrease" data-id="{{ $item->CartItemID }}">-</button>
                                <input type="number" class="form-control text-center quantity-input" 
                                       value="{{ $item->Quantity }}" data-id="{{ $item->CartItemID }}" min="1"/>
                                <button class="btn btn-outline-secondary quantity-btn" data-action="increase" data-id="{{ $item->CartItemID }}">+</button>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        @else
            <!-- Nếu không có sản phẩm -->
            <div class="text-center py-5">
                <i class="fa-solid fa-shopping-cart fa-3x text-muted mb-3"></i>
                <h5 class="text-muted">Giỏ hàng của bạn đang trống</h5>
                <p class="text-muted">Hãy thêm sản phẩm để bắt đầu mua sắm!</p>
                <a href="{{ route('homepage') }}" class="btn btn-primary">Tiếp tục mua sắm</a>
            </div>
        @endif
    </div>
</main>

@if($cartItems->count() > 0)
<!-- Thanh cố định thanh toán -->
<div class="fixed-bottom bg-white shadow p-3">
    <div class="container d-flex justify-content-between align-items-center flex-wrap gap-3">
        <div>
            <div><span class="text-secondary">Tạm tính: </span>
                <span class="text-danger fw-bold fs-5" id="total-amount">{{ number_format($totalAmount, 0, ',', '.') }}đ</span>
            </div>
            <div><span class="text-secondary small">Tiết kiệm: </span>
                <span class="text-primary fw-bold small" id="total-savings">{{ number_format($totalSavings, 0, ',', '.') }}đ</span>
            </div>
        </div>
        <button class="btn btn-danger btn-lg rounded-pill px-4" id="checkout-btn">
            Mua ngay (<span id="selected-count">0</span>)
        </button>
    </div>
</div>
@endif
@endsection
