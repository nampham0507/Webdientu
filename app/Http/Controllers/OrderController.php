<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Cart;
use App\Models\CartItems;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::latest()->get();
        $totalOrders = $orders->count();
        $totalPrice = $orders->sum('price');

        return view('admin.admin', compact('orders', 'totalOrders', 'totalPrice'));
    }

    public function store(Request $request)
    {
        // Nếu chưa login thì chặn
        if (!Auth::check()) {
            return redirect()->route('dangnhap')->with('error', 'Bạn cần đăng nhập để đặt hàng');
        }

        $request->validate([
            'order_code'   => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'status'       => 'nullable|string|max:50',
        ]);

        $userId = Auth::id();

        // Tạo đơn hàng
        Order::create($request->all());

        // Tìm hoặc tạo sản phẩm
        $product = Product::firstOrCreate(
            ['ProductName' => $request->product_name],
            [
                'ProductName'   => $request->product_name,
                'Price'         => $request->price,
                'OriginalPrice' => $request->price * 1.15,
                'Description'   => '512GB | Chính hãng VN',
                'Image'         => 'images/Quangcao/iphoneair.png'
            ]
        );

        // Tìm hoặc tạo giỏ hàng cho user hiện tại
        $cart = Cart::firstOrCreate(
            ['UserID' => $userId],
            ['CreatedAt' => now(), 'Completed' => 0, 'UpdatedAt' => now()]
        );

        // Thêm sản phẩm vào giỏ hàng
        $existingCartItem = CartItems::where('CartID', $cart->CartID)
            ->where('ProductID', $product->ProductID)
            ->first();
        //Nếu có thì +1
        if ($existingCartItem) {
            $existingCartItem->Quantity += 1;
            $existingCartItem->save();
        } else {
            CartItems::create([ //chưa có thì tạo mới
                'CartID'    => $cart->CartID,
                'ProductID' => $product->ProductID,
                'Quantity'  => 1
            ]);
        }

        return redirect()->route('admin.orders.index')
            ->with('success', 'Thêm đơn hàng và sản phẩm vào giỏ hàng thành công');
    }
    //SỬa đơn hàng
    public function update(Request $request, $id)
    {
        $request->validate([
            'order_code'   => 'required|string|max:255',
            'product_name' => 'required|string|max:255',
            'price'        => 'required|numeric|min:0',
            'status'       => 'nullable|string|max:50',
        ]);

        $order = Order::findOrFail($id);
        $order->update($request->all());

        return redirect()->route('admin.orders.index')
            ->with('success', 'Cập nhật đơn hàng thành công');
    }
    //Xóa đơn hàng
    public function destroy($id)
    {
        Order::destroy($id);

        return redirect()->route('admin.orders.index')
            ->with('success', 'Xóa đơn hàng thành công');
    }
}
