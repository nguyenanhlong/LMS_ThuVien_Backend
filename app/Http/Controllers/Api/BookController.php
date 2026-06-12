<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
        $request->validate([
            'code' => ['required', 'string', 'max:50', 'unique:books,code'],
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'], // Validate file ảnh tối đa 2MB
            'title' => ['required', 'string', 'max:255'],
            'author' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'max:100'],
        ]);

        $data = $request->except('cover');

        // Xử lý upload ảnh
        if ($request->hasFile('cover')) {
            $path = $request->file('cover')->store('covers', 'public');
            $data['cover'] = url('storage/' . $path);
        } else {
            $data['cover'] = null;
        }

        $book = Book::create($data);
        $this->audit($request, 'Thêm sách mới', 'Mã sách: '.$book->code);

        return response()->json($book, 201);
    }

    public function update(Request $request, string $code): JsonResponse
    {
        $book = Book::where('code', $code)->firstOrFail();
        
        $request->validate([
            'cover' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:2048'],
            'title' => ['sometimes', 'required', 'string', 'max:255'],
            'author' => ['sometimes', 'required', 'string', 'max:255'],
            'category' => ['sometimes', 'required', 'string', 'max:100'],
            'status' => ['sometimes', 'required', 'string', 'max:100'],
        ]);

        $data = $request->except('cover');

        // Nếu có upload ảnh mới thì thay thế ảnh cũ
        if ($request->hasFile('cover')) {
            // (Tuỳ chọn) Xóa ảnh cũ đi cho đỡ nặng server
            // if ($book->cover && str_contains($book->cover, 'storage/covers/')) {
            //     $oldPath = str_replace(url('storage') . '/', '', $book->cover);
            //     Storage::disk('public')->delete($oldPath);
            // }

            $path = $request->file('cover')->store('covers', 'public');
            $data['cover'] = url('storage/' . $path);
        }

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