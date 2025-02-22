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
        Schema::create('canteen_food_orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger("student_id");
            $table->bigInteger("order_id");
            $table->integer('total_price');
            $table->json('items');
            $table->timestamp('order_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('canteen_food_orders');
    }
};
