# 🛒 Web Điện Tử - Laravel Project

Dự án website thương mại điện tử được xây dựng bằng **Laravel**, cung cấp các chức năng cơ bản:
- Quản lý sản phẩm
- Giỏ hàng (Cart)
- Đặt hàng (Order)
- Đăng nhập/Đăng ký người dùng

---

## 🚀 Yêu cầu hệ thống

- PHP >= 8.1
- Composer
- MySQL/MariaDB
- Node.js & NPM
- Git

---

## ⚙️ Cài đặt

### 1. Clone dự án từ GitHub
```bash
git clone https://github.com/nampham0507/Webdientu.git
cd Webdientu
2. Cài đặt Composer packages
bash
Copy code
composer install
3. Cài đặt Node.js packages (frontend)
bash
Copy code
npm install && npm run dev
4. Tạo file môi trường .env
bash
Copy code
cp .env.example .env
Cập nhật cấu hình DB trong file .env:

env
Copy code
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=webdientu
DB_USERNAME=root
DB_PASSWORD=
5. Tạo key cho Laravel
bash
Copy code
php artisan key:generate
6. Tạo database & chạy migration
bash
Copy code
php artisan migrate
(Nếu cần dữ liệu mẫu thì chạy thêm)

bash
Copy code
php artisan db:seed
▶️ Chạy dự án
Chạy server cục bộ:

bash
Copy code
php artisan serve
Mặc định sẽ chạy tại:
👉 http://127.0.0.1:8000

👤 Tài khoản mẫu (demo)
Email: admin@example.com

Password: admin@example.com1

📌 Ghi chú
Không commit file .env lên GitHub (chứa thông tin nhạy cảm).

Không commit thư mục /vendor và /node_modules (sẽ được cài lại bằng Composer/NPM).

📜 License
Dự án được phát triển phục vụ mục đích học tập và nghiên cứu.
Bạn có thể tự do sử dụng và chỉnh sửa.
