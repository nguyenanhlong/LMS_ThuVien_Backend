<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Fine;
use App\Models\Loan;
use App\Models\Reader;
use Illuminate\Http\JsonResponse;

class ReportController extends Controller
{
    public function summary(): JsonResponse
    {
        return response()->json([
            'books' => Book::count(),
            'readers' => Reader::count(),
            'loans' => Loan::count(),
            'fines' => Fine::sum('amount'),
            'bookStatus' => [
                'available' => Book::where('status', 'Sẵn sàng')->count(),
                'borrowed' => Book::where('status', 'Đang mượn')->count(),
                'maintenance' => Book::where('status', 'Bảo trì')->count(),
            ],
        ]);
    }

    public function monthlyLoans(): JsonResponse
    {
        // Dữ liệu demo cho biểu đồ FE hiện tại, có thể đổi sang query theo tháng sau.
        return response()->json([
            'months' => ['T1', 'T2', 'T3', 'T4', 'T5', 'T6'],
            'values' => [120, 150, 180, 140, 210, 250],
        ]);
    }
}
