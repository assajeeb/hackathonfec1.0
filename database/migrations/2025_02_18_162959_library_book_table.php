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
        Schema::create('Library_book', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->bigInteger("isbn");
            $table->string("title");
            $table->boolean("available");
            $table->integer('copies_left');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('Library_book');
    }
};
