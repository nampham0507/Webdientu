<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    /**
     * Hiển thị form đăng nhập.
     */
    public function showLoginForm()
    {
        return view('auth.Dangnhap');
    }

    /**
     * Xử lý đăng nhập.
     */
    public function login(Request $request)
    {
        // 1. Validate dữ liệu đầu vào kiểm tra xem có được điền đầy đủ không
        $credentials = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string',
        ], [
            'email.required' => 'Email hoặc số điện thoại là bắt buộc.',
            'password.required' => 'Mật khẩu là bắt buộc.',
        ]);

        // 2. Tùy chỉnh: Kiểm tra đăng nhập bằng email hoặc số điện thoại
        $login_type = filter_var($request->input('email'), FILTER_VALIDATE_EMAIL) ? 'email' : 'phone';

        $credentials = [
            $login_type => $request->input('email'),
            'password' => $request->input('password'),
        ];

        // 3. Xử lý đăng nhập
        if (Auth::attempt($credentials, $request->remember)) {
            $request->session()->regenerate();

            // Chuyển hướng đến trang chủ sau khi đăng nhập thành công
            return redirect()->route('homepage')->with('success', 'Đăng nhập thành công!');
        }

        // 4. Nếu đăng nhập thất bại
        return back()->withErrors([
            'login' => 'Tài khoản hoặc mật khẩu không chính xác.',
        ])->withInput($request->only('email'));
    }

    /**
     * Hiển thị form đăng ký.
     */
    public function showRegisterForm()
    {
        return view('auth.Dangky');
    }

    /**
     * Xử lý dữ liệu từ form đăng ký và tạo tài khoản.
     */
    public function register(Request $request)
    {
        // 1. Validate dữ liệu đầu vào
        try {
            $request->validate([
                'name' => 'required|string|max:255',
                'dob' => 'nullable|date',
                'phone' => 'required|string|unique:users|regex:/^[0-9]{10}$/',
                'email' => 'nullable|string|email|max:255|unique:users',
                'password' => 'required|string|min:6|confirmed|regex:/^(?=.*[A-Za-z])(?=.*\d).+$/',
            ], [
                'name.required' => 'Họ và tên là bắt buộc.',
                'phone.required' => 'Số điện thoại là bắt buộc.',
                'phone.unique' => 'Số điện thoại này đã được sử dụng.',
                'phone.regex' => 'Số điện thoại phải có 10 chữ số.',
                'email.email' => 'Email không hợp lệ.',
                'email.unique' => 'Email này đã được sử dụng.',
                'password.required' => 'Mật khẩu là bắt buộc.',
                'password.min' => 'Mật khẩu phải có ít nhất 6 ký tự.',
                'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
                'password.regex' => 'Mật khẩu phải chứa ít nhất một chữ cái và một số.'
            ]);
        } catch (ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }

        // 2. Tạo người dùng mới và lưu vào database
        $user = User::create([
            'name' => $request->name,
            'dob' => $request->dob,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        // 3. Tùy chọn: Đăng nhập người dùng sau khi đăng ký
        Auth::login($user);

        // 4. Chuyển hướng đến trang thành công
        return redirect()->route('homepage')->with('success', 'Đăng ký tài khoản thành công!');
    }

    //đăng xuất
    public function logout(Request $request)
    {
        Auth::logout(); // 1. Đăng xuất user hiện tại (xóa thông tin user khỏi Auth)

        $request->session()->invalidate(); // 2. Hủy toàn bộ session hiện tại (tránh người khác dùng lại session cũ để truy cập)
        $request->session()->regenerateToken(); // 3. Tạo lại CSRF token mới (phòng chống tấn công CSRF sau khi logout)

        return redirect('/dangnhap');
    }
}
