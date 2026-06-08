# BE_ThuVien - Laravel MVC API Backend

Backend này được tạo để tích hợp với FE `LMS_ThuVien` hiện tại. FE gốc đang dùng `src/services/mockApi.js`; trong thư mục `frontend-integration/` có sẵn file thay thế để FE gọi API Laravel thật.

## Công nghệ

- PHP / Laravel 12
- MVC: Model trong `app/Models`, Controller trong `app/Http/Controllers/Api`, route trong `routes/api.php`
- Database mặc định: SQLite cho dễ chạy local
- Có migrations + seeders dữ liệu mẫu giống FE mock data
- Có CORS cho Vite React ở `localhost:5173`

## Cài đặt backend

```bash
cd BE_ThuVien
composer install
cp .env.example .env
php artisan key:generate
php artisan migrate:fresh --seed
php artisan serve --host=127.0.0.1 --port=8000
```

Sau khi chạy, test API:

```bash
curl http://127.0.0.1:8000/api/health
curl http://127.0.0.1:8000/api/books
```

## Tài khoản đăng nhập mẫu

- Admin: `admin@library.vn` / `admin123`
- Librarian: `librarian@library.vn` / `123456`

## Tích hợp vào FE hiện tại

1. Trong FE, tạo file `.env` nếu chưa có:

```bash
VITE_API_BASE_URL=http://127.0.0.1:8000/api
```

2. Copy file:

```bash
BE_ThuVien/frontend-integration/mockApi.js
```

đè lên file FE:

```bash
src/services/mockApi.js
```

3. Chạy FE:

```bash
npm install
npm run dev
```

4. Đăng nhập bằng tài khoản mẫu ở trên.

## Ghi chú database

Mặc định `.env.example` dùng SQLite và file `database/database.sqlite` đã có sẵn. Nếu muốn dùng MySQL, sửa `.env`:

```bash
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=lms_thuvien
DB_USERNAME=root
DB_PASSWORD=
```

Sau đó tạo database `lms_thuvien` trong MySQL rồi chạy lại:

```bash
php artisan migrate:fresh --seed
```

## Các module đã có

- Đăng nhập / đăng xuất
- Quản lý sách
- Quản lý độc giả
- Quản lý phiếu mượn, trả sách, gia hạn
- Quản lý tiền phạt
- Đặt trước sách
- Thông báo
- Nhật ký hoạt động
- Nhà cung cấp
- Báo cáo tổng hợp và dữ liệu biểu đồ

Chi tiết endpoint xem file `API_ENDPOINTS.md`.
