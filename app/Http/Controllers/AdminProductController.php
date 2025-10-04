<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    public function index()
    {
        // Lấy tất cả sản phẩm và đơn hàng
        $products = Product::latest()->get();
        $orders = Order::latest()->get();

        // Tính toán thống kê
        $totalProducts = $products->count();
        $featuredProducts = $products->where('IsFeatured', 1)->count();
        $totalOrders = $orders->count();
        $totalPrice = $orders->sum('price');

        // Truyền tất cả biến vào view
        return view('admin.admin', compact(
            'products',
            'orders',
            'totalProducts',
            'featuredProducts',
            'totalOrders',
            'totalPrice'
        ));
    }

    public function store(Request $request)
    {
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'OriginalPrice' => 'nullable|numeric|min:0',
            'Description' => 'nullable|string',
            'Brand' => 'nullable|string|max:100',
            'Category' => 'nullable|string|max:100',
            'Stock' => 'nullable|integer|min:0',
            'Discount' => 'nullable|integer|min:0|max:100',
            'ImageURL' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'IsFeatured' => 'nullable|boolean'
        ]);

        $data = $request->except('image');

        // Xử lý upload ảnh
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $data['ImageURL'] = 'images/products/' . $imageName;
        }

        // Nếu không có OriginalPrice thì tính từ Price + Discount
        if (!$request->OriginalPrice && $request->Discount > 0) {
            $data['OriginalPrice'] = $request->Price / (1 - $request->Discount / 100);
        }

        // Xử lý checkbox IsFeatured
        $data['IsFeatured'] = $request->has('IsFeatured') ? 1 : 0;

        Product::create($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Thêm sản phẩm thành công!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'ProductName' => 'required|string|max:255',
            'Price' => 'required|numeric|min:0',
            'OriginalPrice' => 'nullable|numeric|min:0',
            'Description' => 'nullable|string',
            'Brand' => 'nullable|string|max:100',
            'Category' => 'nullable|string|max:100',
            'Stock' => 'nullable|integer|min:0',
            'Discount' => 'nullable|integer|min:0|max:100',
            'ImageURL' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'IsFeatured' => 'nullable|boolean'
        ]);

        $product = Product::findOrFail($id);
        $data = $request->except('image');

        // Xử lý upload ảnh mới
        if ($request->hasFile('image')) {
            // Xóa ảnh cũ nếu có
            if ($product->ImageURL && file_exists(public_path($product->ImageURL))) {
                unlink(public_path($product->ImageURL));
            }

            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('images/products'), $imageName);
            $data['ImageURL'] = 'images/products/' . $imageName;
        }

        // Xử lý checkbox IsFeatured
        $data['IsFeatured'] = $request->has('IsFeatured') ? 1 : 0;

        $product->update($data);

        return redirect()->route('admin.products.index')
            ->with('success', 'Cập nhật sản phẩm thành công!');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        // Xóa ảnh
        if ($product->ImageURL && file_exists(public_path($product->ImageURL))) {
            unlink(public_path($product->ImageURL));
        }

        $product->delete();

        return redirect()->route('admin.products.index')
            ->with('success', 'Xóa sản phẩm thành công!');
    }
}
