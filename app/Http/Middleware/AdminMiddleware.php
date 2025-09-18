<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        // Nếu chưa đăng nhập
        if (!Auth::check()) {
            return redirect()->route('admin.login')
                ->with('error', 'Bạn cần đăng nhập để truy cập.');
        }

        // Nếu không phải admin
        if (!Auth::user()->isAdmin()) {
            return redirect()->route('admin.login')
                ->with('error', 'Bạn không có quyền truy cập admin.');
        }

        return $next($request);
    }
}
