<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reservation;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

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
            'date' => ['nullable', 'date'],
        ]);

        $data['id'] = $data['id'] ?? $this->makeId('RS');
        $data['status'] = $data['status'] ?? 'Chờ nhận';
        $data['date'] = $data['date'] ?? now()->toDateTimeString();
        $reservation = Reservation::create($data);
        $this->audit($request, 'Đặt trước sách', 'Sách: '.$reservation->bookCode.', Người đặt: '.$reservation->readerName);

        return response()->json($reservation, 201);
    }
}
