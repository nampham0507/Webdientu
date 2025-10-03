<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký SDEVICES</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #fff; padding-bottom: 500px; }
        .register-container { max-width: 800px; margin: 40px auto; padding: 30px; }
        .register-container h1 { color: #b22222; font-weight: 700; text-align: center; margin-bottom: 20px; }
        .section-title { font-weight: 700; font-size: 1.25rem; margin: 20px 0 15px; color: #333; }
        .social-btn { border: 1px solid #ccc; background: #fff; padding: 10px; border-radius: 6px; width: 48%; text-align: center; font-weight: 500; cursor: pointer; }
        .social-btn img { height: 20px; margin-right: 8px; }
        .btn-primary-custom { background-color: #b22222; border: none; }
        .btn-primary-custom:hover { background-color: #a11e1e; }
        .form-control:focus { border-color: #b22222; box-shadow: none; }
        .register-container img.logo { display: block; margin: 0 auto 15px; width: 250px; }
        .divider { border-top: 2px solid #ddd; margin: 30px 0; }
        .footer-fixed { position: fixed; bottom: 0; left: 0; right: 0; background: #fff; border-top: 1px solid #ddd; padding: 15px; display: flex; flex-wrap: wrap; justify-content: center; gap: 10px; z-index: 1000; }
        .footer-fixed .btn { flex: 1 1 45%; min-width: auto; font-size: 16px; font-weight: 650; padding: 10px 20px; }
        @media (max-width: 576px) { .footer-fixed { flex-direction: column; align-items: stretch; } .footer-fixed .btn { width: 100%; } }
    </style>
</head>
<body>
<div class="register-container">
    <h1>Đăng ký tài khoản SDEVICES</h1>
    <img src="{{ asset('images/Quangcao/Logo.png')}}"  alt="Logo" class="logo">

    <p class="text-center text-muted">Điền những thông tin sau</p>

   <form action="{{ route('register.post') }}" method="POST">
    @csrf
    <h2 class="section-title">Thông tin cá nhân</h2>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Họ và tên:</label>
            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" 
            placeholder="Nhập họ và tên" value="{{ old('name') }}" required>
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Ngày sinh:</label>
            <input type="date" name="dob" class="form-control" value="{{ old('dob') }}">
        </div>
    </div>
    
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Số điện thoại:</label>
            <input type="text" name="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Nhập số điện thoại" value="{{ old('phone') }}" required>
            @error('phone')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Email (không bắt buộc):</label>
            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Nhập email" value="{{ old('email') }}">
            @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
    </div>

    <div class="divider"></div>

    <h2 class="section-title">Tạo mật khẩu</h2>
    <div class="row">
        <div class="col-md-6 mb-3">
            <label class="form-label">Mật khẩu:</label>
            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Nhập mật khẩu" required>
            <small class="text-muted">Mật khẩu tối thiểu 6 ký tự, có ít nhất 1 chữ cái và 1 số</small>
            @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="col-md-6 mb-3">
            <label class="form-label">Nhập lại mật khẩu:</label>
            <input type="password" name="password_confirmation" class="form-control" placeholder="Nhập lại mật khẩu" required>
        </div>
    </div>

    <div align="center" >
        <a href="{{ route('dangnhap') }}" class="btn btn-outline-secondary">&lt; Quay lại đăng nhập</a>
        <button type="submit" class="btn btn-primary-custom text-white">Hoàn tất đăng ký</button>
    </div>
</form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
