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
        Schema::create('emergency_alert', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('type');
            $table->string("location");
            $table->longText('details');
            $table->string("team");
            $table->timestamp('time')->nullable();
            
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emergency_alert');
    }
};
