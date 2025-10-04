@extends('layouts.profile')

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
                                </h6>
                                <span class="text-danger fw-bold me-2">
                                    {{ number_format($item->product->Price ?? 0, 0, ',', '.') }}đ
                                </span>
                                @if($item->product && $item->product->OriginalPrice && $item->product->OriginalPrice > $item->product->Price)
                                
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
            <div><span class="text-secondary">Tổng tiền: </span>
                <span class="text-danger fw-bold fs-5" id="total-amount">{{ number_format($totalAmount, 0, ',', '.') }}đ</span>
            </div>
            
        </div>
        <a href="{{ route('checkout.index') }}" 
   class="btn btn-danger btn-lg rounded-pill px-4">
    Mua ngay (<span id="selected-count">0</span>)
</a>
    </div>
</div>
@endif
<!-- Thêm vào cuối file cart.blade.php  -->

@push('scripts')
<script>
document.addEventListener('DOMContentLoaded', function() {
    const selectAllCheckbox = document.getElementById('select-all');
    const itemCheckboxes = document.querySelectorAll('.item-checkbox');
    const totalAmountElement = document.getElementById('total-amount');
    const selectedCountElement = document.getElementById('selected-count');
    const checkoutBtn = document.getElementById('checkout-btn');

    // Function để cập nhật tổng tiền và số lượng đã chọn
    function updateTotal() {
        let total = 0;
        let count = 0;
        
        itemCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const price = parseFloat(checkbox.dataset.price);
                const quantityInput = checkbox.closest('.d-flex').querySelector('.quantity-input');
                const quantity = parseInt(quantityInput.value);
                
                total += price * quantity;
                count++;
            }
        });
        
        totalAmountElement.textContent = new Intl.NumberFormat('vi-VN').format(total) + 'đ';
        selectedCountElement.textContent = count;
        
        // Enable/disable checkout button
        checkoutBtn.disabled = count === 0;
    }

    // Xử lý select all
    selectAllCheckbox.addEventListener('change', function() {
        itemCheckboxes.forEach(checkbox => {
            checkbox.checked = this.checked;
        });
        updateTotal();
    });

    // Xử lý từng checkbox
    itemCheckboxes.forEach(checkbox => {
        checkbox.addEventListener('change', function() {
            updateTotal();
            
            // Cập nhật select all checkbox
            const checkedCount = document.querySelectorAll('.item-checkbox:checked').length;
            selectAllCheckbox.checked = checkedCount === itemCheckboxes.length;
            selectAllCheckbox.indeterminate = checkedCount > 0 && checkedCount < itemCheckboxes.length;
        });
    });

    // Xử lý quantity change
    document.querySelectorAll('.quantity-input').forEach(input => {
        input.addEventListener('change', function() {
            updateTotal();
            
            // Update quantity via AJAX
            const itemId = this.dataset.id;
            const quantity = this.value;
            
            fetch(`/cart/update-quantity/${itemId}`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify({ quantity: quantity })
            });
        });
    });

    // Xử lý quantity buttons
    document.querySelectorAll('.quantity-btn').forEach(button => {
        button.addEventListener('click', function() {
            const action = this.dataset.action;
            const itemId = this.dataset.id;
            const input = document.querySelector(`input[data-id="${itemId}"]`);
            let currentValue = parseInt(input.value);
            
            if (action === 'increase') {
                currentValue++;
            } else if (action === 'decrease' && currentValue > 1) {
                currentValue--;
            }
            
            input.value = currentValue;
            input.dispatchEvent(new Event('change'));
        });
    });

    // Xử lý checkout button
    checkoutBtn.addEventListener('click', function() {
        const selectedItems = [];
        
        itemCheckboxes.forEach(checkbox => {
            if (checkbox.checked) {
                const row = checkbox.closest('.d-flex');
                const itemId = row.querySelector('.quantity-input').dataset.id;
                selectedItems.push(itemId);
            }
        });
        
        if (selectedItems.length === 0) {
            alert('Vui lòng chọn ít nhất một sản phẩm để thanh toán');
            return;
        }
        
        // Lưu selected items vào form và submit
        const form = document.createElement('form');
        form.method = 'POST';
        form.action = '/checkout/prepare';
        
        const csrfToken = document.createElement('input');
        csrfToken.type = 'hidden';
        csrfToken.name = '_token';
        csrfToken.value = document.querySelector('meta[name="csrf-token"]').content;
        form.appendChild(csrfToken);
        
        const selectedItemsInput = document.createElement('input');
        selectedItemsInput.type = 'hidden';
        selectedItemsInput.name = 'selected_items';
        selectedItemsInput.value = JSON.stringify(selectedItems);
        form.appendChild(selectedItemsInput);
        
        document.body.appendChild(form);
        form.submit();
    });

    // Initialize
    updateTotal();
});
</script>
@endpush
@endsection
