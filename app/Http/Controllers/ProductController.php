<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class ProductController extends Controller
{
    public function homepage()
    {
        return view('products.HomePage');
    }

    public function product1()
    {
        return view('products.Product1');
    }
    public function product2()
    {
        return view('products.Product2');
    }
    public function product3()
    {
        return view('products.Product3');
    }
    public function product4()
    {
        return view('products.Product4');
    }
    public function product5()
    {
        return view('products.Product5');
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
        $orders = Order::latest()->get();
        $totalOrders = $orders->count();
        $totalPrice = $orders->sum('price');

        return view('profile.Profile', compact('orders', 'totalOrders', 'totalPrice'));
    }
}
