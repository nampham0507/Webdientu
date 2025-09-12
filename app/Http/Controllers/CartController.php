<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItems;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập để xem giỏ hàng');
        }

        $userId = Auth::id();
        $cart = Cart::where('UserID', $userId)->first();

        if (!$cart) {
            // Nếu chưa có cart => giỏ hàng rỗng
            $cartItems = collect();
            $totalAmount = 0;
            $totalSavings = 0;
        } else {
            // Lấy cart items kèm product
            $cartItems = CartItems::with('product')
                ->where('CartID', $cart->CartID)
                ->get()
                ->filter(function ($item) {
                    return $item->product !== null; // chỉ giữ item có product tồn tại
                });

            $totalAmount = 0;
            $totalSavings = 0;

            foreach ($cartItems as $item) {
                $totalAmount += $item->product->Price * $item->Quantity;
                $savings = ($item->product->OriginalPrice ?? $item->product->Price) - $item->product->Price;
                $totalSavings += $savings * $item->Quantity;
            }
        }

        return view('cart.cart', compact('cartItems', 'totalAmount', 'totalSavings'));
    }

    public function updateQuantity(Request $request, $id)
    {
        if (!Auth::check()) {
            return response()->json(['success' => false, 'message' => 'Bạn cần đăng nhập']);
        }

        $cartItem = CartItems::where('CartItemID', $id)->firstOrFail();
        $cartItem->Quantity = $request->quantity;
        $cartItem->save();

        return response()->json(['success' => true]);
    }

    public function remove($id)
    {
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập');
        }

        CartItems::where('CartItemID', $id)->delete();
        return redirect()->back()->with('success', 'Đã xóa sản phẩm khỏi giỏ hàng!');
    }

    public function addFromProfile(Request $request)
    {
        $cart = session()->get('cart', []);

        $cart[] = [
            'name' => $request->name,
            'price' => $request->price,
            'quantity' => $request->quantity,

        ];

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
}
