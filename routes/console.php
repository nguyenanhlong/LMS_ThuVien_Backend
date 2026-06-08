<?php

use Illuminate\Support\Facades\Artisan;

Artisan::command('lms:about', function () {
    $this->info('LMS ThuVien API backend is ready.');
});
