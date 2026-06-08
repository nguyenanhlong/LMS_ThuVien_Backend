<?php

use App\Http\Controllers\Api\AuditLogController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\BookController;
use App\Http\Controllers\Api\FineController;
use App\Http\Controllers\Api\LoanController;
use App\Http\Controllers\Api\NotificationController;
use App\Http\Controllers\Api\ReaderController;
use App\Http\Controllers\Api\ReportController;
use App\Http\Controllers\Api\ReservationController;
use App\Http\Controllers\Api\SupplierController;
use Illuminate\Support\Facades\Route;

Route::get('/health', fn () => response()->json(['ok' => true, 'app' => 'LMS ThuVien API']));

Route::post('/auth/login', [AuthController::class, 'login']);
Route::post('/auth/logout', [AuthController::class, 'logout']);
Route::post('/auth/change-password', [AuthController::class, 'changePassword']);
Route::put('/auth/profile', [AuthController::class, 'updateProfile']);

Route::apiResource('books', BookController::class)->parameters(['books' => 'code']);
Route::get('/readers', [ReaderController::class, 'index']);
Route::post('/readers', [ReaderController::class, 'store']);
Route::get('/readers/{id}', [ReaderController::class, 'show']);

Route::get('/loans', [LoanController::class, 'index']);
Route::post('/loans', [LoanController::class, 'store']);
Route::get('/loans/{id}', [LoanController::class, 'show']);
Route::put('/loans/{id}', [LoanController::class, 'update']);

Route::get('/fines', [FineController::class, 'index']);
Route::post('/fines', [FineController::class, 'store']);
Route::patch('/fines/{id}/paid', [FineController::class, 'markPaid']);

Route::get('/reservations', [ReservationController::class, 'index']);
Route::post('/reservations', [ReservationController::class, 'store']);

Route::get('/audit-logs', [AuditLogController::class, 'index']);
Route::post('/audit-logs', [AuditLogController::class, 'store']);

Route::get('/notifications', [NotificationController::class, 'index']);
Route::post('/notifications', [NotificationController::class, 'store']);
Route::patch('/notifications/{id}/read', [NotificationController::class, 'markRead']);
Route::patch('/notifications/read-all', [NotificationController::class, 'markAllRead']);

Route::get('/suppliers', [SupplierController::class, 'index']);
Route::get('/suppliers/{id}', [SupplierController::class, 'show']);

Route::get('/reports/summary', [ReportController::class, 'summary']);
Route::get('/reports/monthly-loans', [ReportController::class, 'monthlyLoans']);
