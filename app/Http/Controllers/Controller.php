<?php

namespace App\Http\Controllers;

use App\Models\AuditLog;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Str;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    protected function makeId(string $prefix): string
    {
        return $prefix.'-'.now()->format('YmdHis').'-'.Str::upper(Str::random(4));
    }

    protected function audit(Request $request, string $action, string $details = ''): void
    {
        AuditLog::create([
            'id' => $this->makeId('AL'),
            'action' => $action,
            'details' => $details,
            'user' => $request->header('X-User-Name') ?: 'System',
            'date' => now()->toDateTimeString(),
        ]);
    }
}
