<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{
    public function login(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required', 'string'],
        ]);

        $user = User::where('email', $data['email'])->first();
        
        if (!$user || !Hash::check($data['password'], $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['Email hoặc mật khẩu không đúng'],
            ]);
        }

        if (method_exists($this, 'audit')) {
            $this->audit($request, 'Đăng nhập', 'Tài khoản: '.$user->email);
        }

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'role' => $user->role,
        ]);
    }

    public function logout(Request $request): JsonResponse
    {
        if (method_exists($this, 'audit')) {
            $this->audit($request, 'Đăng xuất', 'Người dùng đăng xuất hệ thống');
        }
        return response()->json(['message' => 'Đăng xuất thành công']);
    }

    public function changePassword(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['nullable', 'email'],
            'current' => ['required', 'string'],
            'newPass' => ['required', 'string', 'min:6'],
        ]);

        $email = $data['email'] ?? $request->header('X-User-Email');
        $user = $email ? User::where('email', $email)->first() : null;

        if (!$user || !Hash::check($data['current'], $user->password)) {
            throw ValidationException::withMessages([
                'current' => ['Mật khẩu hiện tại không đúng'],
            ]);
        }

        $user->password = Hash::make($data['newPass']);
        $user->save();

        if (method_exists($this, 'audit')) {
            $this->audit($request, 'Đổi mật khẩu', 'Người dùng đổi mật khẩu');
        }

        return response()->json(['message' => 'Đổi mật khẩu thành công']);
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $data = $request->validate([
            'email' => ['required', 'email'],
            'name' => ['required', 'string', 'max:255'],
            'role' => ['nullable', 'string', 'max:50'],
        ]);

        $user = User::where('email', $data['email'])->firstOrFail();
        $user->update(['name' => $data['name'], 'role' => $data['role'] ?? $user->role]);
        
        if (method_exists($this, 'audit')) {
            $this->audit($request, 'Cập nhật hồ sơ', 'Thay đổi thông tin cá nhân');
        }

        return response()->json([
            'id' => $user->id,
            'email' => $user->email,
            'name' => $user->name,
            'role' => $user->role,
        ]);
    }
}