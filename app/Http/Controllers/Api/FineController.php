<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Fine;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class FineController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Fine::orderByDesc('date')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => ['nullable', 'string', 'max:50', 'unique:fines,id'],
            'loanId' => ['nullable', 'string', 'max:50'],
            'readerId' => ['required', 'string', 'max:50'],
            'readerName' => ['required', 'string', 'max:255'],
            'amount' => ['required', 'integer', 'min:0'],
            'reason' => ['required', 'string'],
            'status' => ['nullable', 'string', 'max:100'],
            'date' => ['nullable', 'date'],
        ]);

        $data['id'] = $data['id'] ?? $this->makeId('FN');
        $data['status'] = $data['status'] ?? 'Chưa thu';
        $data['date'] = $data['date'] ?? now()->toDateString();
        $fine = Fine::create($data);
        $this->audit($request, 'Tạo khoản phạt', 'Khoản phạt: '.$fine->id);

        return response()->json($fine, 201);
    }

    public function markPaid(Request $request, string $id): JsonResponse
    {
        $fine = Fine::where('id', $id)->firstOrFail();
        $fine->update(['status' => 'Đã thu']);
        $this->audit($request, 'Thu tiền phạt', 'Khoản phạt: '.$id);

        return response()->json($fine->fresh());
    }
}
