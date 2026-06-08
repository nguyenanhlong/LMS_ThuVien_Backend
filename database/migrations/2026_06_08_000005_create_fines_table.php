<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('fines', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('loanId')->nullable();
            $table->string('readerId');
            $table->string('readerName');
            $table->unsignedInteger('amount')->default(0);
            $table->text('reason');
            $table->string('status')->default('Chưa thu');
            $table->date('date');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('fines');
    }
};
