<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;
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
            $cartItems = collect();
            $totalAmount = 0;
            $totalSavings = 0;
        } else {
            $cartItems = CartItems::with('product')
                ->where('CartID', $cart->CartID)
                ->get()
                ->filter(function ($item) {
                    return $item->product !== null;
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

    // Thêm sản phẩm vào giỏ hàng từ trang chi tiết
    public function addProduct(Request $request)
    {
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập để thêm vào giỏ hàng');
        }

        $request->validate([
            'product_id' => 'required|exists:products,ProductID',
            'quantity' => 'required|integer|min:1'
        ]);

        $userId = Auth::id();

        // Tìm hoặc tạo giỏ hàng
        $cart = Cart::firstOrCreate(
            ['UserID' => $userId],
            ['CreatedAt' => now(), 'Completed' => 0, 'UpdatedAt' => now()]
        );

        // Kiểm tra xem sản phẩm đã có trong giỏ chưa
        $cartItem = CartItems::where('CartID', $cart->CartID)
            ->where('ProductID', $request->product_id)
            ->first();

        if ($cartItem) {
            // Nếu đã có thì tăng số lượng
            $cartItem->Quantity += $request->quantity;
            $cartItem->save();
        } else {
            // Nếu chưa có thì tạo mới
            CartItems::create([
                'CartID' => $cart->CartID,
                'ProductID' => $request->product_id,
                'Quantity' => $request->quantity
            ]);
        }

        return redirect()->route('cart.index')->with('success', 'Đã thêm sản phẩm vào giỏ hàng!');
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
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập');
        }

        $userId = Auth::id();

        $cart = Cart::firstOrCreate(['UserID' => $userId]);

        $product = Product::firstOrCreate(
            ['ProductName' => $request->name],
            ['Price' => $request->price, 'ImageURL' => 'images/default-product.webp']
        );

        CartItems::create([
            'CartID'   => $cart->CartID,
            'ProductID' => $product->ProductID,
            'Quantity' => $request->quantity,
        ]);

        return redirect()->route('cart.index')->with('success', 'Sản phẩm đã được thêm vào giỏ hàng');
    }
}
