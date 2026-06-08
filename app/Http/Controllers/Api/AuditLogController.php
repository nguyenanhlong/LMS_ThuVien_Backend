<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\AuditLog;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuditLogController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(AuditLog::orderByDesc('date')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'action' => ['required', 'string', 'max:255'],
            'details' => ['nullable', 'string'],
        ]);

        $log = AuditLog::create([
            'id' => $this->makeId('AL'),
            'action' => $data['action'],
            'details' => $data['details'] ?? '',
            'user' => $request->header('X-User-Name') ?: 'System',
            'date' => now()->toISOString(),
        ]);

        return response()->json($log, 201);
    }
}
