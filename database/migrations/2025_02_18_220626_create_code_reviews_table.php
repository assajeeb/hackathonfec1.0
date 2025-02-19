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
        Schema::create('code_reviews', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->string('status')->default('in review'); 
            $table->text('ai_response')->nullable();
            $table->string('webhook_url')->nullable(); 
            $table->bigInteger('student_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('code_reviews');
    }
};
