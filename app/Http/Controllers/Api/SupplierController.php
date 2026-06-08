<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Supplier;
use Illuminate\Http\JsonResponse;

class SupplierController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Supplier::orderBy('id')->get());
    }

    public function show(string $id): JsonResponse
    {
        return response()->json(Supplier::where('id', $id)->firstOrFail());
    }
}
