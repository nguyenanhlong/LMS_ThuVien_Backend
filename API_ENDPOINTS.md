# API endpoints LMS ThuVien

Base URL mặc định: `http://127.0.0.1:8000/api`

## Auth

| Method | Endpoint | Mô tả |
|---|---|---|
| POST | `/auth/login` | Đăng nhập, body: `{ email, password }` |
| POST | `/auth/logout` | Đăng xuất |
| POST | `/auth/change-password` | Đổi mật khẩu |
| PUT | `/auth/profile` | Cập nhật hồ sơ |

Tài khoản seed sẵn:

- `admin@library.vn` / `admin123`
- `librarian@library.vn` / `123456`

## Books

| Method | Endpoint | Mô tả |
|---|---|---|
| GET | `/books` | Danh sách sách |
| GET | `/books/{code}` | Chi tiết sách theo mã |
| POST | `/books` | Thêm sách |
| PUT | `/books/{code}` | Cập nhật sách |
| DELETE | `/books/{code}` | Xóa sách |

## Readers

| Method | Endpoint | Mô tả |
|---|---|---|
| GET | `/readers` | Danh sách độc giả |
| GET | `/readers/{id}` | Chi tiết độc giả |
| POST | `/readers` | Thêm độc giả |

## Loans

| Method | Endpoint | Mô tả |
|---|---|---|
| GET | `/loans` | Danh sách phiếu mượn |
| GET | `/loans/{id}` | Chi tiết phiếu mượn |
| POST | `/loans` | Tạo phiếu mượn |
| PUT | `/loans/{id}` | Cập nhật, gia hạn hoặc trả sách |

## Fines

| Method | Endpoint | Mô tả |
|---|---|---|
| GET | `/fines` | Danh sách phạt |
| POST | `/fines` | Tạo khoản phạt |
| PATCH | `/fines/{id}/paid` | Đánh dấu đã thu |

## Khác

| Method | Endpoint | Mô tả |
|---|---|---|
| GET/POST | `/reservations` | Đặt trước sách |
| GET/POST | `/audit-logs` | Nhật ký hoạt động |
| GET/POST | `/notifications` | Thông báo |
| PATCH | `/notifications/{id}/read` | Đánh dấu 1 thông báo đã đọc |
| PATCH | `/notifications/read-all` | Đánh dấu tất cả đã đọc |
| GET | `/suppliers` | Danh sách nhà cung cấp |
| GET | `/suppliers/{id}` | Chi tiết nhà cung cấp |
| GET | `/reports/summary` | Tổng hợp báo cáo |
| GET | `/reports/monthly-loans` | Số liệu biểu đồ |
