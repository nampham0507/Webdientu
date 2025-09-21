<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Đường redirect khi chưa đăng nhập
     */
    protected function redirectTo($request): ?string
    {
        if (! $request->expectsJson()) {
            return route('dangnhap');
        }
        return null;
    }
}
