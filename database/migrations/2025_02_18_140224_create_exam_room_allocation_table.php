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
        Schema::create('exam_room_allocation', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('student_id');
            $table->string('exam_room');
            $table->integer('seat_number');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('exam_room_allocation');
    }
};
