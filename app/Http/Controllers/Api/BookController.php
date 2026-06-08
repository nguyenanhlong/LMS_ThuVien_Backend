<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Book::orderBy('code')->get());
    }

    public function show(string $code): JsonResponse
    {
        return response()->json(Book::where('code', $code)->firstOrFail());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:books,code'],
            'cover' => ['nullable', 'string'],
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'max:100'],
        ]);

        $data['cover'] = $data['cover'] ?? 'https://via.placeholder.com/70x100?text=Cover';
        $book = Book::create($data);
        $this->audit($request, 'Thêm sách mới', 'Mã sách: '.$book->code);

        return response()->json($book, 201);
    }

    public function update(Request $request, string $code): JsonResponse
    {
        $book = Book::where('code', $code)->firstOrFail();
        $data = $request->validate([
            'cover' => ['nullable', 'string'],
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'author' => ['sometimes', 'required', 'string', 'max:255'],
            'category' => ['sometimes', 'required', 'string', 'max:100'],
            'status' => ['sometimes', 'required', 'string', 'max:100'],
        ]);

        $book->update($data);
        $this->audit($request, 'Cập nhật sách', 'Mã sách: '.$book->code);

        return response()->json($book);
    }

    public function destroy(Request $request, string $code): JsonResponse
    {
        $book = Book::where('code', $code)->firstOrFail();
        $book->delete();
        $this->audit($request, 'Xóa sách', 'Mã sách: '.$code);

        return response()->json(['message' => 'Đã xóa sách']);
    }
}
