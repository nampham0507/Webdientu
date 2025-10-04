<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;

class ProductController extends Controller
{
    public function show($id)
    {
        // Lấy sản phẩm theo ID
        $product = Product::findOrFail($id);

        return view('products.ProductDetail', compact('product'));
    }

    public function homepage()
    {
        // Lấy sản phẩm nổi bật (IsFeatured = 1)
        $featuredProducts = Product::where('IsFeatured', true)
            ->orderBy('created_at', 'desc')
            ->take(10)
            ->get();

        // Nếu không có sản phẩm nổi bật, lấy sản phẩm mới nhất
        if ($featuredProducts->isEmpty()) {
            $featuredProducts = Product::orderBy('created_at', 'desc')
                ->take(10)
                ->get();
        }

        return view('products.HomePage', compact('featuredProducts'));
    }

    public function dangnhap()
    {
        return view('auth.Dangnhap');
    }

    public function dangky()
    {
        return view('auth.Dangky');
    }

    public function doLogin(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:6',
        ]);

        return "Đăng nhập thành công với email: " . $request->email;
    }

    public function doRegister(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'nullable|email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        return "Đăng ký thành công cho user: " . $request->email;
    }

    public function profile()
    {
        return view('profile.Profile');
    }
}
