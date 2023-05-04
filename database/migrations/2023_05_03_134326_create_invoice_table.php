<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('invoice', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_number')->unique();
            $table->integer('customer_id');
            $table->string('note')->nullable();
            $table->integer('payment_method_id')->nullable();
            $table->float('total_price');
            $table->float('total_tax')->nullable();
            $table->float('total_discount')->nullable();
            $table->boolean('status')->default(0);
            $table->boolean('is_send_email')->default(0);
            $table->date('due_date')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice');
    }
};
