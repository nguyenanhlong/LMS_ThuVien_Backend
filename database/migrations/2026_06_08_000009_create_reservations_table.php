<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->string('bookCode');
            $table->string('readerName');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('notifyMethod')->nullable();
            $table->text('notes')->nullable();
            $table->string('status')->default('Chờ nhận');
            $table->timestamp('date')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
