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
        Schema::create('Ai_free_code_submission_api', function (Blueprint $table) {
            $table->id();
            $table->text('code');
            $table->string('status')->default('in review'); 
            $table->text('ai_response')->nullable();
            $table->string('webhook_url')->nullable(); 
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Ai_free_code_submission_api');
    }
};
