<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('loans', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('readerId');
            $table->string('readerName');
            $table->date('date');
            $table->date('due');
            $table->string('status')->default('Đang mượn');
            $table->json('books');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
