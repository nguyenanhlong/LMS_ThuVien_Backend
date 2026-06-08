<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Reader;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReaderController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Reader::orderBy('id')->get());
    }

    public function show(string $id): JsonResponse
    {
        return response()->json(Reader::where('id', $id)->firstOrFail());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'id' => ['nullable', 'string', 'max:50', 'unique:readers,id'],
            'name' => ['required', 'string', 'max:255'],
            'card' => ['nullable', 'string', 'max:100'],
            'phone' => ['required', 'string', 'max:50'],
            'email' => ['required', 'email', 'max:255'],
            'type' => ['required', 'string', 'max:100'],
            'status' => ['required', 'string', 'max:100'],
        ]);

        $data['id'] = $data['id'] ?? $this->makeId('RD');
        $data['card'] = $data['card'] ?? ('LIB-'.now()->format('Y').'-'.random_int(100, 999));
        $reader = Reader::create($data);
        $this->audit($request, 'Thêm độc giả', 'Mã độc giả: '.$reader->id);

        return response()->json($reader, 201);
    }
}
