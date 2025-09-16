<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropForeign(['payment_id']);
        $table->dropColumn('payment_id');
        $table->dropColumn(['number', 'issued_date', 'meta']);

        $table->foreignId('booking_id')->constrained()->cascadeOnDelete();
        $table->enum('method',['card','cash','transfer']);
        $table->decimal('amount', 10, 2);
        $table->enum('status',['pending','paid','failed'])->default('pending');
    });
}

public function down(): void
{
    Schema::table('payments', function (Blueprint $table) {
        $table->dropForeign(['booking_id']);
        $table->dropColumn(['booking_id','method','amount','status']);

        $table->foreignId('payment_id')->constrained()->cascadeOnDelete();
        $table->string('number', 40)->unique();
        $table->date('issued_date');
        $table->json('meta')->nullable();
    });
}

};

