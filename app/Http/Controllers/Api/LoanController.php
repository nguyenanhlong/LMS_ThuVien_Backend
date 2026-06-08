<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Loan;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class LoanController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Loan::orderByDesc('date')->orderByDesc('created_at')->get());
    }

    public function show(string $id): JsonResponse
    {
        return response()->json(Loan::where('id', $id)->firstOrFail());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => ['nullable', 'string', 'max:50', 'unique:loans,id'],
            'readerId' => ['required', 'string', 'max:50'],
            'readerName' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'due' => ['required', 'date'],
            'status' => ['nullable', 'string', 'max:100'],
            'books' => ['required', 'array', 'min:1'],
            'books.*' => ['required', 'string', 'max:50'],
        ]);

        $data['id'] = $data['id'] ?? $this->makeId('LN');
        $data['status'] = $data['status'] ?? 'Đang mượn';
        $loan = Loan::create($data);

        Book::whereIn('code', $data['books'])->update(['status' => 'Đang mượn']);
        $this->audit($request, 'Tạo phiếu mượn', 'Phiếu mượn: '.$loan->id);

        return response()->json($loan, 201);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $loan = Loan::where('id', $id)->firstOrFail();
        $data = $request->validate([
            'readerId' => ['sometimes', 'string', 'max:50'],
            'readerName' => ['sometimes', 'string', 'max:255'],
            'date' => ['sometimes', 'date'],
            'due' => ['sometimes', 'date'],
            'status' => ['sometimes', 'string', 'max:100'],
            'books' => ['sometimes', 'array', 'min:1'],
            'books.*' => ['required_with:books', 'string', 'max:50'],
        ]);

        $loan->update($data);

        if (($data['status'] ?? null) === 'Đã trả') {
            Book::whereIn('code', $loan->books ?? [])->update(['status' => 'Sẵn sàng']);
            $this->audit($request, 'Trả sách', 'Phiếu mượn: '.$loan->id);
        } elseif (array_key_exists('due', $data)) {
            $this->audit($request, 'Gia hạn phiếu mượn', 'Phiếu mượn: '.$loan->id.', Hạn mới: '.$data['due']);
        } else {
            $this->audit($request, 'Cập nhật phiếu mượn', 'Phiếu mượn: '.$loan->id);
        }

        return response()->json($loan->fresh());
    }
}
