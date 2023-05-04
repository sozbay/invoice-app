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
        Schema::create('invoice_items', function (Blueprint $table) {
            $table->id();
            $table->integer('invoice_id');
            $table->string('product_code');
            $table->string('product_name');
            $table->string('unit');
            $table->float('unit_amount');
            $table->integer('qty');
            $table->integer('tax')->nullable();
            $table->integer('discount')->nullable();
            $table->float('unit_price')->nullable();
            $table->text('description');
            $table->text('description_2')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoice_items');
    }
};
