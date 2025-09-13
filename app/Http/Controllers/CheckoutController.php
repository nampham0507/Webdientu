<?php
// app/Http/Controllers/CheckoutController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function index(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập để thanh toán');
        }

        $userId = Auth::id();

        // Lấy selected items từ session hoặc tất cả items
        $selectedItems = session('selected_cart_items', []);

        if (empty($selectedItems)) {
            // Nếu không có items được chọn, lấy tất cả items trong cart
            $cart = Cart::where('UserID', $userId)->first();
            if (!$cart) {
                return redirect()->route('cart.index')->with('error', 'Giỏ hàng trống');
            }

            $cartItems = CartItems::with('product')
                ->where('CartID', $cart->CartID)
                ->get()
                ->filter(function ($item) {
                    return $item->product !== null;
                });
        } else {
            // Lấy các items được chọn
            $cartItems = CartItems::with('product')
                ->whereIn('CartItemID', $selectedItems)
                ->get()
                ->filter(function ($item) {
                    return $item->product !== null;
                });
        }

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart.index')->with('error', 'Không có sản phẩm nào để thanh toán');
        }

        // Chuyển đổi dữ liệu cho view
        $checkoutItems = [];
        $totalPrice = 0;

        foreach ($cartItems as $item) {
            $checkoutItems[] = [
                'id' => $item->CartItemID,
                'name' => $item->product->ProductName,
                'price' => $item->product->Price,
                'quantity' => $item->Quantity,
                'image' => $item->product->ImageURL ?? 'images/default-product.webp'
            ];
            $totalPrice += $item->product->Price * $item->Quantity;
        }

        return view('checkout.checkout', [
            'cartItems' => $checkoutItems,
            'totalPrice' => $totalPrice
        ]);
    }

    public function process(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập');
        }

        // Validate dữ liệu
        $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
            'email' => 'nullable|email',
            'delivery_method' => 'required|in:pickup,delivery',
            'payment_method' => 'required|in:cod,bank,card,momo'
        ]);

        try {
            DB::beginTransaction();

            $userId = Auth::id();

            // Lấy lại cart items để tính tổng tiền
            $selectedItems = session('selected_cart_items', []);

            if (empty($selectedItems)) {
                $cart = Cart::where('UserID', $userId)->first();
                $cartItems = CartItems::with('product')
                    ->where('CartID', $cart->CartID)
                    ->get()
                    ->filter(function ($item) {
                        return $item->product !== null;
                    });
            } else {
                $cartItems = CartItems::with('product')
                    ->whereIn('CartItemID', $selectedItems)
                    ->get()
                    ->filter(function ($item) {
                        return $item->product !== null;
                    });
            }

            $totalAmount = 0;
            $productNames = [];

            foreach ($cartItems as $item) {
                $totalAmount += $item->product->Price * $item->Quantity;
                $productNames[] = $item->product->ProductName . ' (x' . $item->Quantity . ')';
            }

            // Tạo mã đơn hàng
            $orderCode = 'ORD' . date('YmdHis') . rand(100, 999);

            // Tạo đơn hàng
            $order = Order::create([
                'order_code' => $orderCode,
                'product_name' => implode(', ', $productNames),
                'status' => $request->payment_method == 'cod' ? 'Chờ xác nhận' : 'Chờ thanh toán',
                'price' => $totalAmount,
                'order_date' => now()->format('Y-m-d')
            ]);

            // Lưu thông tin khách hàng vào session để hiển thị ở trang success
            session([
                'order_info' => [
                    'order_code' => $orderCode,
                    'customer_name' => $request->name,
                    'customer_phone' => $request->phone,
                    'customer_email' => $request->email,
                    'delivery_method' => $request->delivery_method,
                    'payment_method' => $request->payment_method,
                    'total_amount' => $totalAmount,
                    'products' => $productNames
                ]
            ]);

            // Xóa các sản phẩm đã đặt khỏi giỏ hàng
            if (!empty($selectedItems)) {
                CartItems::whereIn('CartItemID', $selectedItems)->delete();
            } else {
                // Xóa tất cả items trong cart
                $cart = Cart::where('UserID', $userId)->first();
                if ($cart) {
                    CartItems::where('CartID', $cart->CartID)->delete();
                }
            }

            // Xóa selected items khỏi session
            session()->forget('selected_cart_items');

            DB::commit();

            return redirect()->route('checkout.success');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Có lỗi xảy ra khi xử lý đơn hàng: ' . $e->getMessage());
        }
    }

    public function success()
    {
        $orderInfo = session('order_info');

        if (!$orderInfo) {
            return redirect()->route('homepage');
        }

        return view('checkout.checkoutsuccess', compact('orderInfo'));
    }


    public function prepare(Request $request)
    {
        $selectedItems = json_decode($request->selected_items, true);
        session(['selected_cart_items' => $selectedItems]);

        return redirect()->route('checkout.index');
    }
}
