<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xác nhận đặt trước sách</title>
    <style>
        body { font-family: Arial, sans-serif; background: #f4f4f4; margin: 0; padding: 0; }
        .container { max-width: 600px; margin: 20px auto; background: #fff; border-radius: 8px; overflow: hidden; box-shadow: 0 2px 8px rgba(0,0,0,0.1); }
        .header { background: #2563eb; color: #fff; padding: 24px 32px; }
        .header h1 { margin: 0; font-size: 22px; }
        .body { padding: 32px; }
        .body p { color: #374151; line-height: 1.6; margin: 8px 0; }
        .info-table { width: 100%; border-collapse: collapse; margin: 16px 0; }
        .info-table td { padding: 10px 12px; border-bottom: 1px solid #e5e7eb; font-size: 14px; }
        .info-table td:first-child { font-weight: 600; color: #6b7280; white-space: nowrap; width: 140px; }
        .info-table td:last-child { color: #111827; }
        .badge { display: inline-block; padding: 4px 12px; border-radius: 12px; font-size: 13px; background: #fef3c7; color: #92400e; font-weight: 600; }
        .footer { padding: 24px 32px; text-align: center; font-size: 12px; color: #9ca3af; border-top: 1px solid #e5e7eb; }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <h1>Xác nhận đặt trước sách</h1>
        </div>
        <div class="body">
            <p>Xin chào <strong>{{ $reservation->readerName }}</strong>,</p>
            <p>Cảm ơn bạn đã đặt trước sách tại thư viện. Dưới đây là thông tin chi tiết:</p>

            <table class="info-table">
                <tr>
                    <td>Họ tên</td>
                    <td>{{ $reservation->readerName }}</td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td>{{ $reservation->email }}</td>
                </tr>
                @if ($reservation->phone)
                <tr>
                    <td>Số điện thoại</td>
                    <td>{{ $reservation->phone }}</td>
                </tr>
                @endif
                <tr>
                    <td>Mã sách</td>
                    <td>{{ $reservation->bookCode }}</td>
                </tr>
                <tr>
                    <td>Tên sách</td>
                    <td>{{ $book->title ?? 'Không xác định' }}</td>
                </tr>
                <tr>
                    <td>Tác giả</td>
                    <td>{{ $book->author ?? 'Không xác định' }}</td>
                </tr>
                <tr>
                    <td>Ngày đặt trước</td>
                    <td>{{ \Carbon\Carbon::parse($reservation->date)->format('d/m/Y H:i') }}</td>
                </tr>
                <tr>
                    <td>Trạng thái</td>
                    <td><span class="badge">{{ $reservation->status }}</span></td>
                </tr>
                @if ($reservation->notes)
                <tr>
                    <td>Ghi chú</td>
                    <td>{{ $reservation->notes }}</td>
                </tr>
                @endif
            </table>

            <p>Vui lòng đến thư viện để nhận sách đúng hạn. Nếu có thắc mắc, hãy liên hệ với chúng tôi.</p>
            <p>Trân trọng,<br><strong>LMS ThuVien</strong></p>
        </div>
        <div class="footer">
            &copy; {{ date('Y') }} LMS ThuVien. Tất cả quyền được bảo lưu.
        </div>
    </div>
</body>
</html>
