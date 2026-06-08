<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Notification::orderByDesc('date')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string'],
            'type' => ['nullable', 'string', 'max:50'],
        ]);

        $notification = Notification::create([
            'id' => $this->makeId('NT'),
            'title' => $data['title'],
            'message' => $data['message'],
            'type' => $data['type'] ?? 'info',
            'isRead' => false,
            'date' => now()->toDateTimeString(),
        ]);

        return response()->json($notification, 201);
    }

    public function markRead(string $id): JsonResponse
    {
        $notification = Notification::where('id', $id)->firstOrFail();
        $notification->update(['isRead' => true]);

        return response()->json($notification->fresh());
    }

    public function markAllRead(): JsonResponse
    {
        Notification::query()->update(['isRead' => true]);
        return response()->json(['message' => 'Đã đánh dấu tất cả thông báo là đã đọc']);
    }
}
