<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AdminAuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập admin.
     */
    public function showLoginForm()
    {
        return view('admin.login');
    }

    /**
     * Xử lý đăng nhập admin.
     */
    public function login(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
        ]);

        // 2. Xử lý đăng nhập với email
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // 3. Kiểm tra đăng nhập
        if (Auth::attempt($credentials, $request->remember)) {
            // Kiểm tra xem user có phải admin không
            if (Auth::user()->isAdmin()) {
                $request->session()->regenerate(); //đổi mã số session tránh hacker
                return redirect()->route('admin.orders.index')->with('success', 'Đăng nhập admin thành công!');
            } else {
                // Không phải admin thì đăng xuất
                Auth::logout();
                return back()->withErrors([
                    'login' => 'Bạn không có quyền truy cập admin.',
                ])->withInput($request->only('email'));
            }
        }

        // 4. Nếu đăng nhập thất bại
        return back()->withErrors([
            'login' => 'Email hoặc mật khẩu không chính xác.',
        ])->withInput($request->only('email'));
    }

    //Đăng xuất admin
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate(); //hủy session
        $request->session()->regenerateToken(); // Sinh CSRF token mới

        return redirect()->route('admin.login');
    }
}
