<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Reservation;
use App\Mail\ReservationConfirmedMail;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;

class ReservationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Reservation::orderByDesc('date')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => ['nullable', 'string', 'max:50', 'unique:reservations,id'],
            'bookCode' => ['required', 'string', 'max:50'],
            'readerName' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:50'],
            'notifyMethod' => ['nullable', 'string', 'max:50'],
            'notes' => ['nullable', 'string'],
            'status' => ['nullable', 'string', 'max:100'],
        ]);

        $data['id'] = $data['id'] ?? $this->makeId('RS');
        $data['status'] = $data['status'] ?? 'Chờ nhận';
        $data['date'] = now()->toDateTimeString();
        $reservation = Reservation::create($data);
        $this->audit($request, 'Đặt trước sách', 'Sách: '.$reservation->bookCode.', Người đặt: '.$reservation->readerName);

        $response = [
            'message' => 'Đặt trước thành công',
            'reservation' => $reservation,
        ];

        if (empty($data['notifyMethod']) || $data['notifyMethod'] === 'email') {
            $book = Book::where('code', $reservation->bookCode)->first();
            try {
                Mail::to($reservation->email)->send(new ReservationConfirmedMail($reservation, $book));
                $response['email_sent'] = true;
            } catch (\Throwable $e) {
                Log::error('Gửi email xác nhận đặt trước thất bại', [
                    'reservation_id' => $reservation->id,
                    'email' => $reservation->email,
                    'error' => $e->getMessage(),
                ]);
                $response['email_sent'] = false;
                if (app()->environment('local', 'testing', 'development')) {
                    $response['email_error'] = $e->getMessage();
                } else {
                    $response['email_error'] = 'Không thể gửi email xác nhận. Vui lòng thử lại sau.';
                }
            }
        } else {
            $response['email_sent'] = false;
        }

        return response()->json($response, 201);
    }
}
